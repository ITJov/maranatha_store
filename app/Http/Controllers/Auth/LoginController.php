<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Set redirection path dynamically based on user role.
     */
    protected function redirectTo()
    {
        // Check user role
        if (Auth::check() && Auth::user()->role_id == '1') {
            return '/'; // Redirect to admin dashboard
        } elseif (Auth::check() && Auth::user()->role_id == '3') {
            return '/user-dashboard/index'; // Redirect to user dashboard
        }

        // return '/'; // Default redirection if no role matches
    }

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
