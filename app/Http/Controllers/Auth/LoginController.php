<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Redirect users after login based on role.
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->role_id == '1') {
            return redirect('/'); 
        } elseif ($user->role_id == '3') {
            return redirect('/user-dashboard/index'); 
        }

        return redirect('/'); 
    }

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}