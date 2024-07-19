<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Arena;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ArenaController extends Controller
{
    function addArena()
    {
        return view('addArena');
    }
    function store($id)
    {
        $validated = request()->validate([
            'arenaName' => 'required|max:100',
            'location' => 'required|max:300',
            'capacity' => 'required|max:100',
            'charges' => 'required|max:100',
            'email' => 'required|email|max:200',
            'phone' => 'required'
        ]);
        $arena = new Arena();
        $arena->user_id = $id;
        $arena->name = $validated['arenaName'];
        $arena->location = $validated['location'];
        $arena->capacity = $validated['capacity'];
        $arena->email = $validated['email'];
        $arena->phone = $validated['phone'];
        $arena->charges = $validated['charges'];
        $arena->save();

        $result = Arena::where('user_id', $id)->get();
        $admin = new Admin();
        $admin->user_id = $id;
        foreach ($result as $res) {

            $admin->arena_id = $res->id;
        }

        $admin->save();


        return redirect()->route('dashboard')->with('success', 'Arena added successfully');
    }


    function bookArena($arena_id)
    {
        $confirm = Reservation::get();
        $confirm2 = Reservation::get();
        $arenaRes = Arena::where('id', $arena_id)->get();
        return view('arenaBook', [
            'arenaRes' => $arenaRes,
            'confirm' => $confirm,
            'confirm2' => $confirm2
        ]);
    }
}