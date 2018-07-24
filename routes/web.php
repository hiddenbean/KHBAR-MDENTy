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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::domain('staff.khbarmdinty.com')->group(function () {

    Route::get('/', 'StaffController@index');
    Route::get('seconnecter/', 'auth\StaffLoginController@showLoginForm')->name('staff.login');
    Route::get('deconnecter/', 'auth\StaffLoginController@logout');

    Auth::routes();
});


Route::domain('staff.khbarmdinty.com')->group(function () {
    
     Route::post('seconnecter', 'auth\StaffLoginController@login')->name('staff.login.submit');

});

