<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        );

        if (Auth::attempt($user_data)) {
            if(Auth::user()->user_type=='admin' || Auth::user()->user_type=='staff'){
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->user_type=='vendor') {
                 return redirect()->route('vendor.dashboard');
            } elseif (Auth::user()->user_type=='user') {
                return redirect()->route('user.dashboard')->with('success','You are successfully login');
            }
        }
        else{

            return redirect()->route('frontend.login')->with('error', 'Unauthorized Login');
        }

    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
