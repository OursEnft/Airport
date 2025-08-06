<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationPassenger extends Model
{
    use HasFactory;

    protected $table = 'reservation_passengers';

    protected $fillable = [
        'id_reservation',
        'id_passenger'
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'id_reservation');
    }

    public function passenger()
    {
        return $this->belongsTo(Passenger::class, 'id_passenger');
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'id_flight');
    }
}
