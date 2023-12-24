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

    public function authenticate(LoginRequest $request)
    {
        if (Auth::attempt($request->validated()) && request()->isMethod('POST')) {
            $request->session()->regenerate();
            return redirect()->to(route('dashboard'));
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }
}
