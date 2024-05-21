<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LockController extends Controller
{
    public function lock()
    {
        return view('lockscreen');
    }
}
