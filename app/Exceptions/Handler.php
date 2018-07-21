<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into a response.
     * Deppending on the guard it redirect to the convenient authentication page. 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if($request->expectsJson())
        {
            return response()->json(['error' => 'Unauthenticated.'], 401);  
        }

        $guard = array_get($exception->guards(), 0);

        switch($guard)
        {
            case 'staff' :
                $this->authenticationCheck($guard) ? $login = "404" : $login = '/';
                break;
        }
        return redirect()->guest(url($login));
    }

    public function authenticationCheck($guard)
    {
        $guards = array("client", "partner", "staff");
        $authenticated = false;
        $index = array_search($guard,$guards);
        $i=0;
        while($i<3 && !$authenticated)
        {
            if($i != $index)
            {
                Auth::guard($guards[$i])->check() ?  $authenticated = true :  $authenticated = false;
            }
            $i++;
        }
        return $authenticated;
    }
}
