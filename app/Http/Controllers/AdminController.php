<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Arena;
use App\Models\Reservation;
use function Laravel\Prompts\select;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function receiveRequest()
    {
        $Ownerid = Auth::user()->id;
        $OwnerArena = Arena::where('user_id', $Ownerid)->get();

        foreach ($OwnerArena as $o_a) {
            $arena_id = $o_a->arenaId;
            $resCount = Reservation::where('arena_id', $arena_id)->count();
        }
    }
}
