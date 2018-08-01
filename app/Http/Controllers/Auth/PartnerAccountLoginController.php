<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Auth;
use App\PartnerAccount;
use Illuminate\Http\Request;
class PartnerAccountLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new partner login controller instance.
     * Call te auth middleware and specify the partner guard.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:partner-account')->except('logout');
    }


    /**
     * Get the login used to authenticate by the user.
     * Returns either user_name, phone_number or email.
     *
     * @param /Illuminate\Http\Request $request->email.
     * l'email in the request in only the input name.
     * @return string
     */
    public function loginType($login)
    {
        // return $login;
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            return 'email';
        }
        else {
            return 'username';
        }
    }

    /**
     * Show the application's login form for the finale client.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCompanyform()
    {
        return view('system.partners.login');
    }

    /**
     * Show the application's login form for the finale client.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('system.partner_accounts.login');
    }

    /**
     * Show the application's login form for the finale client.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginForm(Request $request)
    {
        $request->validate([
            'company_name' => 'required|exists:partners,company_name',
        ]);
        return redirect(url('http://'.$request->company_name.'.khbarmdinty.com/seconnecter'));
    }

    /**
     * Validate a registration request.
     * Check which login the partner used to log in.
     * attempt to log in the partner.
     * If true redirect to the partner's home page.
     * If false Redirect to the previous page.
     * 
     * @param  \Illuminate\Http\Request.
     * @return \Illuminate\Http\Response.
     */
    public function login(Request $request)
    {
        $login = $request->login;
        $loginType = self::loginType($login);
        $this->validateReqeust($request, $loginType);

        switch ($loginType) 
        {
            case 'email':
                if(Auth::guard('partner-account')->attempt(['email' => $request->login, 'password' => $request->password], $request->remember))
                {
                    // return redirect()->intended('/');
                    return redirect('/');
                }
                break;
                case 'username':
                if(Auth::guard('partner-account')->attempt(['name' => $request->login, 'password' => $request->password], $request->remember))
                {
                    // return redirect()->intended('/');
                    return redirect('/');

                }
                break;
        }
        return redirect()->back();
      
    }

    /**
     * Validate the partner's login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function validateReqeust(Request $request, $loginType)
    {
        if($loginType == 'email')
        {
            $request->validate([
                'login' => 'required|email|exists:partner_accounts,email',
                'password' => 'required|min:6',
            ]);
        }
        else
        {
            $request->validate([
                'login' => 'required|exists:partner_accounts,name',
                'password' => 'required|min:6',
            ]);
        }
       
    }
   /**
     * Log the partner out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function logout(Request $request)
    {
        Auth::guard('partner-account')->logout();
        $request->session()->invalidate();
        return redirect('seconnecter');
    }

    public function redirecTo()
    {
        return '/';
    }
}
