<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->to(route('dashboard'));
        }

        return view('auth.login');
    }

    /**
     * Login Function
     *  > LoginRequest validates the incoming request body to ensure secured payload.
     */
    public function authenticate(LoginRequest $request)
    {
        // Checks if Email and Password are valied and if the method of the request is POST
        if (Auth::attempt($request->validated()) && request()->isMethod('POST')) {
            // Will regenerate session (Browser session nung naglogin, masstore sa Database Sessions table)
            $request->session()->regenerate();
            return redirect()->to(route('dashboard'));
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }
}
