<?php

namespace App\Http\Controllers;

use App\Models\Arena;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagearenaController extends Controller
{
    function index()
    {
        $id = Auth::user()->id;
        $myArenas = Arena::where('user_id', $id)->get();
        return view('manageArena', [
            'myArenas' => $myArenas
        ]);
    }
    function changeDetailsPage($id)
    {
        $arenaDetails = Arena::where('id', $id)->get();

        return view('changeDetails', ['arenaDetails' => $arenaDetails]);
    }
}
