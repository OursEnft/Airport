<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;

    protected $table = 'parkings';
    protected $primaryKey = 'parking_id';

    public $timestamps = false;

    protected $fillable = [
        'parking_name',
        'capacity',
        'type',
        'parking_status',
        'price_per_hour',
        'price_per_day',
        'price_per_month',
        'id_address'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'id_address');
    }

    public function reservations()
    {
        return $this->hasMany(ParkingReservation::class, 'id_parking');
    }
}
