<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Arena;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $VDate = $validated['date'];
        $vTimeIn = $validated['timeIn'];
        $vTimeOut = $validated['timeOut'];
        $reservation = new Reservation();
        $reservation->date = $validated['date'];
        $reservation->timeIn = $validated['timeIn'];
        $reservation->timeOut = $validated['timeOut'];
        $reservation->arena_id = $arenaId;
        $reservation->user_id = $guestId;
        $isBooked = Reservation::where('date', $VDate)->where('timeIn', '<=', $vTimeOut)->where('timeOut', '>=', $vTimeIn)->exists();

        if ($isBooked) {
            return redirect()->back()->with('fail', 'Your arrival time clashes with an already booked playing time, kindly try a different time');
        } else {
            $reservation->save();
            return redirect()->route('dashboard')->with('success', 'Booking made, kindly wait for feedback via your email');
        }
    }
    static function showUnrespondedReservations()
    {
        $ownerId = Auth::user()->id;




        $requests = Reservation::join('arenas', 'reservations.arena_id', '=', 'arenas.id')->where('arenas.user_id', $ownerId)->where('status', 'Pending approval')->count();


        return $requests;
    }
    function show()
    {
        $ownerId = Auth::user()->id;
        $requests = Reservation::join('arenas', 'reservations.arena_id', '=', 'arenas.id')->join('users', 'reservations.user_id', '=', 'users.id')->where('arenas.user_id', $ownerId)->where('status', null)->get();
        return view('showUnrespondedReservations');
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
        $requests = Reservation::join('arenas', 'reservations.arena_id', '=', 'arenas.id')->join('users', 'reservations.user_id', '=', 'users.id')->select('reservations.id as id', 'users.name as clientName', 'users.email as clientEmail', 'date', 'timeIn', 'timeOut', 'arenas.name as arenaName', 'status')->where('arenas.user_id', $ownerId)->where('status', 'Pending approval')->orderBy('reservations.created_at', 'DESC')->get();
        return view('showUnrespondedReservations', [
            'requests' => $requests,

        ]);
    }
    function page2()
    {
        $Ownerid = Auth::user()->id;
        $OwnerAdmin = Admin::where('user_id', $Ownerid)->get();

        foreach ($OwnerAdmin as $o_a) {
            $arena_id = $o_a->arenaId;
            $resCount = Reservation::where('arena_id', $arena_id)->count();
        }
        $ownerId = Auth::user()->id;
        $requests = Reservation::join('arenas', 'reservations.arena_id', '=', 'arenas.id')->join('users', 'reservations.user_id', '=', 'users.id')->select('reservations.id as id', 'users.name as clientName', 'users.email as clientEmail', 'date', 'timeIn', 'timeOut', 'arenas.name as arenaName', 'status')->where('arenas.user_id', $ownerId)->whereNot('status', 'Pending approval')->orderBy('reservations.created_at', 'DESC')->get();

        return view('showRespondedReservations', [
            'requests' => $requests

        ]);
    }
}
