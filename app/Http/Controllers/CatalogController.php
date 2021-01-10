<?php
/**
 * Created by PhpStorm.
 * User: berez
 * Date: 09.01.2021
 * Time: 2:47
 */

namespace App\Http\Controllers;


class CatalogController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('guest');
//    }


    public function index()
    {
        return view('catalog');
    }

}
