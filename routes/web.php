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
    Route::get('seconnecter/', 'auth\PartnerAccountLoginController@showCompanyForm');

     //Regions Routes
     Route::prefix('region')->group(function() {
        Route::get('','RegionController@index');
    });

});


Route::domain('partenaire.khbarmdinty.com')->group(function () {
    
    Route::post('/seconnecter/nom-compagnie', 'auth\PartnerAccountLoginController@loginForm');
    // Singup page route   
    Route::post('inscription', 'auth\PartnerController@store');
    
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
    //Regions Routes
    Route::prefix('region')->group(function() {
        // Route::post('','RegionController@index');
    });
});

    Route::domain('{partenaire}.khbarmdinty.com')->group(function (){

        

        //interventions Routes
        Route::prefix('khbarat/{khbar}')->group(function(){
            Route::get('/',function(){return view('test');});
            Route::prefix('interventions')->group(function(){
                Route::get('comments/ajouter', 'InterventionController@createComment');
                Route::get('pictures/ajouter', 'InterventionController@createPicture');
            });
            Route::prefix('réactions')->group(function(){
                Route::get('{reaction}/comments/ajouter', 'ReactionController@createComment');
                Route::get('{reaction}/pictures/ajouter', 'ReactionController@createPicture');
            });
        });
        // partner authentication route start
        // Singin page route
        Route::get('/seconnecter', 'Auth\PartnerAccountLoginController@showLoginForm');
        // Singout page route
        Route::get('/deconnecter', 'Auth\PartnerAccountLoginController@logout');
        // Home page
        Route::get('/', 'PartnerAccountController@home');

        // Regions route start
        Route::prefix('regions')->group(function(){
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
            Route::get('afficher','RegionController@show');
            Route::get('subject/ajouter','RegionController@subjectShow');
        });
    });
});

    Route::domain('{partenaire}.khbarmdinty.com')->group(function (){

        // partner authentication route start
        // Singin page route
        Route::post('/seconnecter', 'auth\PartnerAccountLoginController@login');

         //interventions Routes
         Route::prefix('khbarat/{khbar}')->group(function(){
            Route::prefix('interventions')->group(function(){
                Route::post('comments/ajouter', 'InterventionController@storeComment');
                Route::post('pictures/ajouter', 'InterventionController@storePicture');

            });
            Route::prefix('réactions')->group(function(){
                Route::post('comments/ajouter', 'ReactionController@storeComment');
                Route::post('pictures/ajouter', 'ReactionController@storePicture');

            });
        });

        // Regions routes start
        Route::prefix('regions')->group(function() {
            Route::post('ajouter', 'RegionController@store');
            Route::prefix('{region}')->group(function() {
                Route::post('/modifier', 'RegionController@update');
                Route::delete('', 'RegionController@delete');
            });
        });
    });



// Return View (UI)  
use App\Services\Ajax\Ajax;
use Illuminate\Http\Request; 

Route::domain('www.khbarmdinty.com')->group(function (){ 
    
    Route::get('/home-view', function(){ 
        return view('system.partners.login');
    })->name('partner.login'); 

    Route::get('/confidentialite-view', function(){ 
        return view('system.privacy');
    });

    Route::get('/conditions-generales-view', function(){ 
        return view('system.terms');
    }); 
}); 

Route::domain('partenaire.khbarmdinty.com')->group(function (){ 
    // partner authentication route start
    // Singin page route   
    Route::get('seconnecter-view', function(){ 
        return view('system.partner_accounts.login');
    })->name('partner.login');

    // Singup page route   
    Route::get('inscription-view', function(){
        return view('system.partner_accounts.register');
    })->name('partner.register');
}); 

Route::domain('staff.khbarmdinty.com')->group(function (){ 
    // partner authentication route start
    // Singin page route   
    Route::get('seconnecter-view', function(){
        return view('system.staff.login');
    })->name('partner.login');
  
});
Route::domain('{partenaire}.khbarmdinty.com')->group(function (){ 
    // partner authentication route start
    // Singin page route   
    Route::get('region/create', function(Ajax $ajax){
       $ajax->redrawView('container_create_region');
       return $ajax->view('regions.shows.create');
    });

    Route::get('region', function(Ajax $ajax){
        $ajax->redrawView('container_create_region');
        return $ajax->view('regions.shows.region');
     });

    Route::post('region/store', function(Ajax $ajax, Request $request){
        $name = $request->input('name');
        $ajax->redrawView('container_create_region');
        return $ajax->view('regions.shows.region', ['name'=>$name]);
     });

    Route::post('region/store-points', function(Ajax $ajax, Request $request){
        $region =  $request->input('name');
        $ajax->redrawView('container_create_region');
        return $ajax->view('regions.shows.regions', ['region'=> $region]);
     });
 
});
