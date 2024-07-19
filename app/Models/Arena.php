<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arena extends Model
{
    use HasFactory;
    function User()
    {
        $this->belongsTo(User::class, 'user_id');
    }
    function Reservation()
    {
        return $this->hasMany(Reservation::class, 'arena_id');
    }
}
