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
    });

    Route::get('/seconnecter', function(){
        return view('system.partners.login');
    });
   

});

/*
|--------------------------------------------------------------------------
| defining all (partenaire) domain GET routes here
|
*/
Auth::Routes();

Route::domain('partenaire.khbarmdinty.com')->group(function () {

    Route::get('/', 'PartnerController@home');
    Route::get('inscription/', 'auth\PartnerRegisterController@showRegisterForm');
    Route::get('seconnecter/', 'auth\PartnerAccountLoginController@showCompanyForm')->name('partner.login');

    

});


Route::domain('{partenaire}.khbarmdinty.com')->group(function () {
    
    Route::post('/seconnecter/nom-compagnie', 'auth\PartnerAccountLoginController@loginForm');
    // Singup page route   
    Route::post('inscription', 'auth\PartnerRegisterController@store');
    
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
        Route::get('{topic}/modifier','TopicController@edit');
        Route::prefix('{topic}/détail')->group(function() {
            Route::get('','SubjectController@index');
            Route::get('ajouter','SubjectController@create');
            Route::get('{subject}/modifier','SubjectController@edit');
            Route::prefix('détail')->group(function() {
                Route::get('ajouter','SubjectController@create');
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
            Route::post('modifier','TopicController@update');
            Route::post('supprimer','TopicController@destroy');
            Route::prefix('détail')->group(function() {
                Route::post('ajouter','SubjectController@store');
                Route::post('{subject}/supprimer','SubjectController@destroy');
                Route::post('{subject}/modifier','SubjectController@update');

            });
        });
    });
    //Regions Routes
    Route::prefix('region')->group(function() {
        // Route::post('','RegionController@index');
    });
});

    Route::domain('{partenaire}.khbarmdinty.com')->group(function (){

        // partner authentication route start
        // Singin page route
        Route::get('/seconnecter', 'Auth\PartnerAccountLoginController@showLoginForm');
        // Singout page route
        Route::get('/deconnecter', 'Auth\PartnerAccountLoginController@logout');
        // Home page
        Route::get('/', 'PartnerAccountController@home');
        Route::post('/test', 'RegionController@test');

        // Regions route start
        Route::prefix('/regions')->group(function(){
            Route::get('/', 'RegionController@index');
            Route::get('/ajouter', 'RegionController@create');
                Route::prefix('/{region}')->group(function(){
                    Route::get('/', 'RegionController@show');
                    Route::get('/modifier', 'RegionController@edit');
                });
            });
        // Regions route end

        //Khbarat routes start
        Route::get('khbarat', 'KhbarController@partnerFeed');
        //Khbarat end
        Route::get('check', 'KhbarController@test');


    // partner authentication route start
    // Singin page route
    Route::get('seconnecter', 'Auth\PartnerAccountLoginController@showLoginForm');
    Route::get('/deconnecter', 'Auth\PartnerAccountLoginController@logout');
    Route::get('/', 'PartnerAccountController@home');

     //Regions Routes
     Route::prefix('regions')->group(function() {
        Route::get('','RegionController@index');
        Route::prefix('{region}')->group(function() {
            Route::get('afichier','RegionController@show');
            Route::get('subject/ajouter','RegionController@subjectShow');
        });
    });
});
    Route::domain('{partenaire}.khbarmdinty.com')->group(function (){

        // partner authentication route start
        // Singin page route
        Route::post('/seconnecter', 'auth\PartnerAccountLoginController@login');

    // partner authentication route start
    // Singin page route   
    //Route::post('/seconnecter', 'auth\PartnerAccountLoginController@login');
    Route::post('/seconnecter', 'auth\PartnerAccountLoginController@login');

     //Regions Routes
     Route::prefix('regions')->group(function() {
        Route::post('/','RegionController@index');
        Route::post('/ajouter', 'RegionController@store');
        Route::post('/{region}/modifier', 'RegionController@update');
        Route::delete('/{region}', 'RegionController@delete');
        Route::prefix('{region}/subject')->group(function() {
            Route::post('ajouter','RegionController@subjectStore');
            Route::post('{subject}/supprimer','RegionController@subjectDestroy');
        });
    });
});
