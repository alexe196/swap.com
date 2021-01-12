<?php

use App\Http\Middleware;
use App\Servicec\Localization\Localization;
use App\Servicec\Localization\LocalizationSevice;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(
    [
        "prefix" => Localization::locale(),
        'middleware' => 'setLocale'
    ],
    function (){
        Route::get('/', function () {
            return view('welcome');
        });

        Auth::routes();

        Route::get('/catalog', 'CatalogController@index')->name('catalog');

        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/may-information', 'HomeController@myInformation')->name('myinformation');

    }
);


Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/test', function(){
        return view('test');
    });
});
