<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Arena;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function index()
    {
        $arenas = Arena::get();
        if (request()->has('search')) {
            $arenas = Arena::where('name', 'like', '%' . request()->get('search') . '%')->orWhere('location', 'like', '%' . request()->get('search') . '%')->get();
        }
        $id = Auth::user()->id;
        $result = Admin::where('user_id', $id)->count();

        return view('dashboard', [
            'result' => $result,
            'arenas' => $arenas
        ]);
    }
}
