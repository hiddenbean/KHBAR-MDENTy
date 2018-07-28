<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\PartnerAccountController;
use App\PartnerAccount;
use App\Partner;
use App\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class PartnerAccountRegisterController extends Controller
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
    protected $redirectTo = '/';

    /**
     * Create a new partner register controller instance.
     * Call te auth middleware and specify the partner guard.
     *
     * @return void
     */
    public function __construct()
    {
    
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  \Illuminate\Http\Request.
     * @return void.
     */
    public function validateRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:partner_accounts,email',
            'password' => 'required|min:6',
            'name' => 'required|unique:partner_accounts,name',
            'first_name' => 'required',
            'last_name' => 'required',
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
    public function store(Request $request)
    {
        $this->validateRequest($request);
        
        
        $password = bcrypt($request->password);
        $name = str_before($request->email, '@');
        while(PartnerAccount::where('name', $name)->first()){
            $name = $name.'_'.rand(0,9);
        }
        $partnerAccount = PartnerAccount::create([
            'email' => $request->email,
            'password' => $password,
            'name' => $name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'partner_id' => $request->partner_id,
            'taxe_id' => $request->tax_id,
        ]);       
        
        // return $partnerAccount;
        $this->guardsLogout();
        return $partnerAccount;
        Auth::guard('partner-account')->login($partnerAccount);
        return redirect('/');
    }

     /**
     * log out the authenticated users with different guard from the applciation.
     * 
     * @return void
     */
    public function guardsLogout()
    {
        Auth::guard('partner-account')->logout();
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

