<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
            'zipcode' => ['string', 'max:20']
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
    public function edit(Request $request)
    {
        $user = DB::table('users')->where('id', Auth::user()->id)->limit(1);
        if ($this->validator($request->all())->validate()) {

            $data = $request->all();
            $user->update([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'birthday' => $data['birthday'],
                        'phone' => $data['phone'],
                        'country' => $data['country'],
                        'city' => $data['city'],
                        'address' => $data['address'],
                        'zipcode' => $data['zipcode']
                         ]);
        }
        return redirect('/home');
    }

    public function myInformation()
    {
        return view('myinformation');
    }

}
