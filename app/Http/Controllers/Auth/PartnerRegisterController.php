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
    protected function validateRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:partners,name',
            'company_name' => 'required',
            'trade_registry' => 'required',
            'ice' => 'required',
            'taxe_id' => 'required',
            'about' => 'required',
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
    protected function store(Request $request)
    {
        $this->validateRequest($request); 
        

        $partner = Partner::create([
            $request->only(
                'company_name', 
                'name', 'about', 
                'tax_id', 
                'ice', 
                'trade_registry'
            ), 
            'status' => '0',
            ]);
        
        
        $password = bcrypt($request->password);
        $name = str_before($request->email, '@');
        while(PartnerAccount::where('name', $name)->first()){
            $name = $name.'_'.rand(0,9);
        }
        $partnerAccount = new PartnerAccount();
        $partnerAccount->first_name = $request->first_name;
        $partnerAccount->last_name = $request->last_name;
        $partnerAccount->email = $request->email;
        $partnerAccount->name = $name;
        $partnerAccount->password = $password;
        $partnerAccount->partner_id = $partner->id;
        $partnerAccount->save();       
        
        // return $partnerAccount;
        $this->guardsLogout();
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
        return view('system.partner_accounts.register');
    }
}

