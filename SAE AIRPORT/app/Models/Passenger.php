<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Passenger extends Model
{
    use HasFactory;

    protected $table = 'passengers';

    protected $primaryKey = 'passenger_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'nationality',
        'email',
        'phone_number',
        'passeport_number'
    ];

    public $timestamps = false;

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'id_passenger');
    }

    public function historyReservations()
    {
        return $this->hasMany(HistoryReservation::class, 'id_reservation_passenger');
    }

    public function reservationPassengers()
    {
        return $this->hasMany(ReservationPassenger::class, 'id_passenger');
    }

    public function baggages()
    {
        return $this->hasMany(Baggage::class, 'id_passenger');
    }
}
