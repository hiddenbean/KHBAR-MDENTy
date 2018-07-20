<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('home', 'HomeController@index')->name('home');

Route::domain('partenaire.khbarmdinty.com')->group(function () {

    Route::get('/', 'PartnerController@index');
    Route::get('inscription/', 'auth\PartnerRegisterController@showRegisterForm');
    Route::get('seconnecter/', 'auth\PartnerLoginController@showLoginForm');
    Route::get('deconnecter/', 'auth\PartnerLoginController@logout');

    Auth::routes();
});


Route::domain('partenaire.khbarmdinty.com')->group(function () {
    
     Route::post('seconnecter', 'auth\PartnerLoginController@login')->name('partner.login');
     Route::post('inscription', 'auth\PartnerRegisterController@create')->name('partner.register.submit');

});





Auth::routes();
