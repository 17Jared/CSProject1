<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Arena;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    function index($arenaId)
    {

        $guestId = Auth::user()->id;
        $validated = request()->validate([
            'date' => 'required|date',
            'timeIn' => 'required',
            'timeOut' => 'required'
        ]);


        $reservation = new Reservation();
        $reservation->date = $validated['date'];
        $reservation->timeIn = $validated['timeIn'];
        $reservation->timeOut = $validated['timeOut'];
        $reservation->arena_id = $arenaId;
        $reservation->user_id = $guestId;
        $reservation->save();





        return redirect()->route('dashboard')->with('success', 'booking made, kindly wait for feedback via your email');
    }
    static function showReservations()
    {
        $ownerId = Auth::user()->id;




        $requests = Reservation::join('arenas', 'reservations.arena_id', '=', 'arenas.id')->where('arenas.user_id', $ownerId)->where('status', null)->count();


        return $requests;
    }
    function show()
    {
        $ownerId = Auth::user()->id;
        $requests = Reservation::join('arenas', 'reservations.arena_id', '=', 'arenas.id')->join('users', 'reservations.user_id', '=', 'users.id')->where('arenas.user_id', $ownerId)->get();
        return view('showReservations');
    }
    function page()
    {
        $Ownerid = Auth::user()->id;
        $OwnerAdmin = Admin::where('user_id', $Ownerid)->get();

        foreach ($OwnerAdmin as $o_a) {
            $arena_id = $o_a->arenaId;
            $resCount = Reservation::where('arena_id', $arena_id)->count();
        }
        $ownerId = Auth::user()->id;
        $requests = Reservation::join('arenas', 'reservations.arena_id', '=', 'arenas.id')->join('users', 'reservations.user_id', '=', 'users.id')->select('reservations.id as id', 'users.name as clientName', 'users.email as clientEmail', 'date', 'timeIn', 'timeOut', 'arenas.name as arenaName', 'status')->where('arenas.user_id', $ownerId)->orderBy('reservations.created_at', 'DESC')->get();

        return view('showReservations', [
            'requests' => $requests

        ]);
    }
}
