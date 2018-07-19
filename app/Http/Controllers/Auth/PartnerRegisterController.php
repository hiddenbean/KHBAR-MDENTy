<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class PartnerRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new partner register controller instance.
     * Call te auth middleware and specify the partner guard.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest:partner');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  \Illuminate\Http\Request.
     * @return void.
     */
    protected function validateRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:partners,email',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * log out the authenticated users with different guard from the application.
     * Valid a registration request.
     * Create a new partner.
     * Attempt to log in the the created partner.
     * If true redirect to the partner's add details form.
     * If false Redirect to the previous page.
     * 
     * @param  \Illuminate\Http\Request.
     * @return \Illuminate\Http\Response.
     */
    protected function create(Request $request)
    {
        $this->validateRequest($request);
        $password = bcrypt($request->input('password'));
        $name = str_before($request->input('email'), '@');
        while(Partner::where('name', $name)->first()){
            $name = $name.'_'.rand(0,9);
        }
        $partner = Partner::create([
            'email'     =>  $request->input('email'),
            'password'  =>  $password,
            'name' =>  $name,
            'status'    =>  'not verified',
        ]);

        $this->guardsLogout();
   
        Auth::guard('partner')->login($partner);
        return redirect('/');
    }

     /**
     * log out the authenticated users with different guard from the applciation.
     * 
     * @return void
     */
    public function guardsLogout()
    {
        Auth::guard('partner')->logout();
    }

    /**
     * Return the partner's registration form
     * 
     * @return \Illuminate\Http\Response.
     */
    public function showRegisterForm()
    {
       
                return view('system.partners.register');
          
    
    }
}

