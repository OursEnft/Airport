<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class HistoryReservation extends Model
{
    use HasFactory;

    protected $table = 'history_reservation';

    protected $primaryKey = 'history_reservation_id';

    protected $fillable = [
        'reservation_type',
        'history_reservation_status',
        'datetime_reservation_event',
        'id_reservation_passenger',
        'id_reservation_parking'
    ];

    public $timestamps = false;

    public function passenger()
    {
        return $this->belongsTo(ReservationPassenger::class, 'id_reservation_passenger');
    }

    public function parking()
    {
        return $this->belongsTo(ParkingReservation::class, 'id_reservation_parking');
    }
}
