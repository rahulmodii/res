<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('frontend.home');
    }

    public function adminLogin()
    {
      if (Auth::check()) {
        abort(404);
      } else{
         return view('admin.login');
      }

    }
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function vendorLogin()
    {
      if (Auth::check()) {
        abort(404);
      } else{
         return view('vendor.login');
      }

    }
    public function vendorDashboard()
    {
        return view('vendor.dashboard');
    }

    public function userRegistration(Request $request)
    {
        return view('frontend.user_registration');
    }

}
