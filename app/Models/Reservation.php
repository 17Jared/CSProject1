<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    function User()
    {
        $this->belongsTo(User::class, 'user_id');
    }
    function Arena()
    {
        $this->belongsTo(Arena::class, 'arena_id');
    }
}