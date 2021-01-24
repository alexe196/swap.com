<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            //'password' => ['required', 'string', 'min:8', 'confirmed'],
            'birthday' => ['required', 'date'], //['date_format: Y-m-d']
            'phone' => ['string', 'max:50'],
            'country' => ['string', 'max:255'],
            'city' => ['string', 'max:255'],
            'address' => ['string', 'max:255'],
            'zipcode' => ['string', 'max:20'],
//            'sex' => ['string', 'max:10'],
//            'activiti' => ['boolean'],
//            'moderation_activiti' => ['boolean'],
            'avatar' => 'mimes:jpeg,jpg,bmp,png'
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = DB::table('categories_langue')->where('parent_id', 0)->get();
        $user = DB::table('users')->where('id', Auth::user()->id)->first();
        return view('home', ['user' => $user, 'categories' => $categories]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editUser(Request $request)
    {
        $user = DB::table('users')->where('id', Auth::user()->id)->limit(1);

        if ($this->validator($request->all())->validate()) {

            $data = $request->all();
            $avatar = Auth::user()->avatar;

            //заливаем аватарку
            $image2 = $this->uploadAvatar($request);
            if (!empty($image2)) {
                $avatar =$image2;
            }


            $user->update([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'birthday' => $data['birthday'],
                        'phone' => $data['phone'],
                        'country' => $data['country'],
                        'city' => $data['city'],
                        'address' => $data['address'],
                        'zipcode' => $data['zipcode'],
                         'avatar' => $avatar
                         ]);
        }
        return redirect('/home');
    }

    private function uploadAvatar(Request $request)
    {
        $image2 = '';
        if($request->file('avatar')) {

            $path = '/user/'.Auth::user()->id.'/avatar/';
            $path1 = '/user/'.Auth::user()->id;

            if (!file_exists($_SERVER['DOCUMENT_ROOT'].$path)) {
                mkdir($_SERVER['DOCUMENT_ROOT'].$path1);
                mkdir($_SERVER['DOCUMENT_ROOT'].$path, 0777);
            }

            if (!empty(Auth::user()->avatar)){
                unlink($_SERVER['DOCUMENT_ROOT'].Auth::user()->avatar);
            }

            $logo = $request->file('avatar');
            $avatar = '';
            $filename = random_int(10000000, 99999999).time().".".$logo->getClientOriginalExtension();
            Image::make($logo)->save(public_path('user/'.Auth::user()->id.'/avatar/'.$filename));
            $image2 = $path.$filename;
            chmod($_SERVER['DOCUMENT_ROOT'].$path, 0755);
        }

        return $image2;
    }

    public function myInformation()
    {
        return view('myinformation');
    }

}
