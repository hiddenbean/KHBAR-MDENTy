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

Route::domain('www.khbarmdenty.com')->group(function (){

    Route::get('/', function(){
        return view('system.partners.home');
    })->name('partner.login');

    Route::get('/seconnecter', function(){
        return view('system.partners.login');
    })->name('partner.login');
   

});

/*
|--------------------------------------------------------------------------
| defining all (partenaire) domain GET routes here
|
*/

Route::get('home', 'HomeController@index')->name('home');

Route::domain('partenaire.khbarmdinty.com')->group(function () {

    Route::get('/', 'PartnerController@home');
    Route::get('inscription/', 'auth\PartnerRegisterController@showRegisterForm');
    Route::get('seconnecter/', 'auth\PartnerAccountLoginController@showLoginForm');
    Route::get('deconnecter/', 'auth\PartnerAccountLoginController@logout');

});


Route::domain('partenaire.khbarmdinty.com')->group(function () {
    
     Route::post('/seconnecter', 'auth\PartnerAccountLoginController@login')->name('partner.login');
     Route::post('inscription', 'PartnerController@store')->name('partner.register.submit');
     Route::post('map/', 'PartnerController@test');
});

Route::get('/home', 'HomeController@index')->name('home');




// domain staff.khbarmdinty.com For GET Routes
Route::domain('staff.khbarmdinty.com')->group(function () {

        Route::get('/', 'StaffController@home');
    Route::get('seconnecter/', 'auth\StaffLoginController@showLoginForm')->name('staff.login');
    Route::get('deconnecter/', 'auth\StaffLoginController@logout');


    //Partners Statuses routes
    Route::prefix('partners')->group(function() {
        Route::get('','PartnerController@index');
        Route::prefix('{partner}/status')->group(function() {
            Route::get('','StatusController@check');
            Route::get('non-approuvé','StatusController@notApprove');
        });
    });
    //Topics Routes
    Route::prefix('sujets')->group(function() {
        Route::get('','TopicController@index');
        Route::get('ajouter','TopicController@create');
        Route::prefix('{topic}/détail')->group(function() {
            Route::get('','SubjectController@index');
            Route::get('ajouter','SubjectController@create');
            Route::prefix('détail')->group(function() {
                Route::get('ajouter','SubjectController@create');
                Route::post('{subject}/modifier','SubjectController@edit');
            });

        });
    });
});


// domain staff.khbarmdinty.com For Post Routes
Route::domain('staff.khbarmdinty.com')->group(function () {
    
    Route::post('seconnecter', 'auth\StaffLoginController@login')->name('staff.login.submit');
    
    Route::prefix('partners/{partner}/status')->group(function() {
        Route::post('créer','StatusController@store');
        Route::post('approuver','StatusController@approve');
    });

    //Topics Routes
    Route::prefix('sujets')->group(function() {
        Route::post('ajouter','TopicController@store');
        Route::prefix('{topic}')->group(function() {
            Route::post('supprimer','TopicController@destroy');
            Route::prefix('détail')->group(function() {
                Route::post('ajouter','SubjectController@store');
                Route::post('{subject}/supprimer','SubjectController@destroy');
            });
        });
    });
});
// Route::domain('{partenaire}.khbarmdenty.com')->group(function (){

//     // partner authentication route start
//     // Singin page route   
//     Route::get('seconnecter', function(){
//         return view('system.partner_accounts.login');
//     })->name('partner.login');

//     // Singup page route   
//     Route::get('inscription', function(){
//         return view('system.partner_accounts.register');
//     })->name('partner.register');
// });
