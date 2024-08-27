<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LockController extends Controller
{
    public function lock($userId)
    {
        $userEmail = User::where('id', $userId)->get();
        foreach ($userEmail as $email) {
            auth()->logout();
            return view('lockscreen', ['email' => $email->email]);
        }
    }
}
