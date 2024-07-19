<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;
    function Reservation()
    {
        $this->belongsTo(Reservation::class, 'reservation_id');
    }
    function Payment()
    {
        $this->belongsTo(Reservation::class, 'payment_id');
    }
}
