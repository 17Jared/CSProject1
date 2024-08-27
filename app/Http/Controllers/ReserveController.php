<?php

namespace App\Http\Controllers;

use App\Mail\acceptedMail;
use App\Mail\cancelMail;
use App\Mail\cancelMain;
use App\Mail\rejectedMail;
use App\Mail\rejectedMail2;
use App\Models\Reservation;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReserveController extends Controller
{
    function accept($requestId)
    {

        $emails = Reservation::join('arenas', 'reservations.arena_id', '=', 'arenas.id')->join('users', 'reservations.user_id', '=', 'users.id')->select('reservations.id as id', 'users.name as clientName', 'users.email as clientEmail', 'date', 'timeIn', 'timeOut', 'arenas.name as arenaName', 'arenas.email as ownerEmail')->where('reservations.id', $requestId)->get();
        foreach ($emails as $email) {
            $data = [
                'arenaName' => $email->arenaName,
                'time' => $email->timeIn
            ];


            Mail::to($email->clientEmail)->send(new acceptedMail($data));
            Mail::to($email->ownerEmail)->send(new acceptedMail($data));
            $update = Reservation::where('id', $email->id)
                ->update(['status' => 'confirmed']);
            $arenaName = $email->arenaName;
            $timeIn = $email->timeIn;
            $timeOut = $email->timeOut;
        }

        return redirect()->route('dashboard')->with('success', 'Reservation successfully approved');
    }
    function reject($requestId)
    {
        $emails = Reservation::join('arenas', 'reservations.arena_id', '=', 'arenas.id')->join('users', 'reservations.user_id', '=', 'users.id')->select('reservations.id as id', 'users.name as clientName', 'users.email as clientEmail', 'date', 'timeIn', 'timeOut', 'arenas.name as arenaName', 'arenas.email as ownerEmail')->where('reservations.id', $requestId)->get();
        foreach ($emails as $email) {
            Mail::to($email->clientEmail)->send(new rejectedMail2);
            Mail::to($email->ownerEmail)->send(new rejectedMail2);
            $arenaName = $email->arenaName;
            $timeIn = $email->timeIn;
            $timeOut = $email->timeOut;
            $update = Reservation::where('id', $email->id)
                ->update(['status' => 'rejected']);
        }
        return redirect()->route('dashboard')->with('success', 'Reservation successfully rejected');
    }
    function reject2($requestId)
    {
        $emails = Reservation::join('arenas', 'reservations.arena_id', '=', 'arenas.id')->join('users', 'reservations.user_id', '=', 'users.id')->select('reservations.id as id', 'users.name as clientName', 'users.email as clientEmail', 'date', 'timeIn', 'timeOut', 'arenas.name as arenaName', 'arenas.email as ownerEmail')->where('reservations.id', $requestId)->get();
        foreach ($emails as $email) {
            Mail::to($email->clientEmail)->send(new rejectedMail2);
            Mail::to($email->ownerEmail)->send(new rejectedMail);
            $arenaName = $email->arenaName;
            $timeIn = $email->timeIn;
            $timeOut = $email->timeOut;
            $update = Reservation::where('id', $email->id)
                ->update(['status' => 'pending approval']);
            $update;
        }
        return redirect()->route('dashboard')->with('success', 'Reservation successfully cancelled');
    }
    function cancel($id)
    {
        $emails = Reservation::join('arenas', 'reservations.arena_id', '=', 'arenas.id')->join('users', 'reservations.user_id', '=', 'users.id')->select('reservations.id as id', 'users.name as clientName', 'users.email as clientEmail', 'date', 'timeIn', 'timeOut', 'arenas.name as arenaName', 'arenas.email as ownerEmail')->where('reservations.id', $id)->get();
        foreach ($emails as $email) {
            Mail::to($email->clientEmail)->send(new cancelMail);
            Mail::to($email->ownerEmail)->send(new cancelMail);
            $arenaName = $email->arenaName;
            $timeIn = $email->timeIn;
            $timeOut = $email->timeOut;
            $update = Reservation::where('id', $email->id)
                ->update(['status' => 'rejected']);
            $update;
        }
        return redirect()->route('dashboard')->with('success', 'Reservation successfully cancelled');
    }
}