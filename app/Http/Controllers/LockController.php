<?php

namespace App\Http\Controllers;

use Illuminate\Auth\RequestGuard\logout;

use Illuminate\Http\Request;

class LockController extends Controller
{
    public function lock()
    {
        auth()->logout();
        return view('lockscreen');
    }
}
