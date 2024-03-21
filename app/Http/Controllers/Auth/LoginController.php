<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Login Function
     *  > LoginRequest validates the incoming request body to ensure secured payload.
     */
    public function authenticate(LoginRequest $request)
    {
        if (Auth::attempt($request->validated()) && request()->isMethod('POST')) {
            $request->session()->regenerate();
            return redirect()->to(route('dashboard'));
        }

        return back()->with([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }
}
