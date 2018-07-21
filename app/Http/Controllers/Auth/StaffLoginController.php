<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
        $this->validateReqeust($request);
        if(Auth::guard('staff')->attempt(['email'=>$request->input('email'), 'password'=>$request->input('password')], $request->input('remember')))
        {
            //$this->sessionRegenerate();
            return redirect()->intended(url('/'));
        }
        return redirect()->back();
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
            'email' => 'required|email|unique:staff,email',
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
