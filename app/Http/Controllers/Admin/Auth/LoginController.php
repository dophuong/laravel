<?php

namespace App\Http\Controllers\Admin\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    use AuthenticatesUsers;
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

//    /**
//     * Handle a login request to the application.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
//     */
//    public function login(Request $request)
//    {
//        $this->validateLogin($request);
//
//        // If the class is using the ThrottlesLogins trait, we can automatically throttle
//        // the login attempts for this application. We'll key this by the username and
//        // the IP address of the client making these requests into this application.
//        if ($this->hasTooManyLoginAttempts($request)) {
//            $this->fireLockoutEvent($request);
//
//            return $this->sendLockoutResponse($request);
//        }
//
//        if ($this->attemptLogin($request)) {
//            return $this->sendLoginResponse($request);
//        }
//
//        // If the login attempt was unsuccessful we will increment the number of attempts
//        // to login and redirect the user back to the login form. Of course, when this
//        // user surpasses their maximum number of attempts they will get locked out.
//        $this->incrementLoginAttempts($request);
//
//        return $this->sendFailedLoginResponse($request);
//    }
//    /**
//     * Validate the user login request.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return void
//     */
//    protected function validateLogin(Request $request)
//    {
//        $this->validate($request, [
//            $this->username() => 'required|string',
//            'password' => 'required|string',
//        ]);
//    }
//    /**
//     * Get the login username to be used by the controller.
//     *
//     * @return string
//     */
//    public function username()
//    {
//        return 'email';
//    }
//
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }
//    /**
//     * Log the user out of the application.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function logout(Request $request)
//    {
//        $this->guard()->logout();
//
//        $request->session()->flush();
//
//        $request->session()->regenerate();
//
//        return redirect('/admin');
//    }


}
