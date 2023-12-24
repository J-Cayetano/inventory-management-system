<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function unauthenticate(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->to(route('login'));
    }
}
