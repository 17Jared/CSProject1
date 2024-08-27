<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class MyBookController extends Controller
{
    function index()
    {
        $mine = Reservation::join('arenas', 'reservations.arena_id', '=', 'arenas.id')->join('users', 'reservations.user_id', '=', 'users.id')->select('reservations.id as id', 'users.name as clientName', 'users.email as clientEmail', 'date', 'timeIn', 'timeOut', 'arenas.name as arenaName', 'status')->where('reservations.user_id', auth()->user()->id)->orderBy('reservations.created_at', 'DESC')->get();

        return view('myBookings', [
            'mine' => $mine
        ]);
    }
}
