<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class StaffLoginController extends Controller
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
     * Create a new staff login controller instance.
     * Call te auth middleware and specify the staff guard.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:staff')->except('logout');
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
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            return 'email';
        }
        else {
            return 'username';
        }
    }
    /**
     * Show the application's login form for the staff.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.Staff.login');
    }

    /**
     * Validate the inscription request.
     * attempt to log in the staff.
     * If true redirect to the staff's home page.
     * If false Redirect to the previous page.
     * 
     * @param  \Illuminate\Http\Request.
     * @return \Illuminate\Http\Response.
     */
    public function login(Request $request)
    {
        $login = $request->login;
        $loginType = self::loginType($login);
        $this->validateReqeust($request);
        // dd(Auth::guard('staff')->attempt(['email'=>$request->input('login'), 'password'=>$request->input('password')], $request->remember));
        if($loginType == 'email')
        {
            if(Auth::guard('staff')->attempt(['email'=>$request->input('login'), 'password'=>$request->input('password')], $request->remember))
            {
                //$this->sessionRegenerate();
                //dd(Auth::id());
                return redirect()->intended(url('/'));
            }
            //return redirect()->back();
        }
        else
        {
            if(Auth::guard('staff')->attempt(['name'=>$request->input('login'), 'password'=>$request->input('password')], $request->remember))
            {
                return Auth::id();
                return redirect()->intended('/');
            }
            return redirect()->back();
        }
     
    }



    /**
     * Validate the staff's login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function validateReqeust(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required|min:6',
        ]);
    }

    /**
     * Regenerate a new session before authenication
     * 
     * @param Illuminate\Http\Request
     * @return void
     */
    public function sessionRegenerate(Request $request)
    {
        $request->session()->regenerate();
    }

     /**
     * Log the staff out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('staff')->logout();
        $request->session()->invalidate();
        return redirect()->route('staff.login');
    }
}
