<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $primaryKey = 'reservation_id';

    protected $fillable = [
        'reservation_date',
        'reservation_status',
        'id_user'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(UserPub::class, 'id_user');
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'id_flight');
    }

    public function reservationPassengers()
    {
        return $this->hasMany(ReservationPassenger::class, 'id_reservation');
    }
}
