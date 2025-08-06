<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingReservation extends Model
{
    use HasFactory;

    protected $table = 'parking_reservation';
    protected $primaryKey = 'parking_reservation_id';

    public $timestamps = false;

    protected $fillable = [
        'start_date',
        'end_date',
        'reservation_date',
        'status',
        'vehicle_registration_number',
        'vehicle_type',
        'id_parking',
        'id_user'
    ];

    public function parking()
    {
        return $this->belongsTo(Parking::class, 'id_parking');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
