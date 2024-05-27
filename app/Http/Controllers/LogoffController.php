<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoffController extends Controller
{
    function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'logged out successfully');
    }
}
