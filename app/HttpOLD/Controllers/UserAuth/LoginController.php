<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hesto\MultiAuth\Traits\LogsoutGuard;
use Illuminate\Http\Request;
use \App\Models\User;
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

    use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('user.guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    // public function showLoginForm()
    // {
    //     if (Auth::guard('user')->check()){
    //         session()->flash('error', 'You be logout for regirstration.');
    //        return redirect('/user/dashboard');
    //     }
    //     return view('user.auth.login');
    // }

    protected function credentials(Request $request)
    {
            // $this->validate($request,[
            //     $this->username() => 'required|regex:/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/'
            //  ],['regex' => 'The Contact Number must be 10 digit without country code.']);
            //      $this->validate($request,[ 'otp'=>'required|regex:/^\d{4}$/'],[
            //         'otp.required' => "Please Enter OTP.",
            //         'otp.regex' => "OTP must be 4 digit.",
            //     ]);
             return ['contact'=>$request->contact,'otp'=>$request->otp];
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('user');
    }
}
