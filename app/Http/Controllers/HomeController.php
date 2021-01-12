<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = DB::table('categories')->where('parent_id', 0)->get();
        $user = DB::table('users')->where('id', Auth::user()->id)->first();
        return view('home', ['user' => $user, 'categories' => $categories]);
    }

    public function myInformation()
    {
        return view('myinformation');
    }
}
