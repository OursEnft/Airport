<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightConnection extends Model
{
    use HasFactory;

    protected $table = 'flight_connections';

    protected $fillable = [
        'layover_time_minutes',
        'from_flight_id',
        'to_flight_id'
    ];

    public function fromFlight()
    {
        return $this->belongsTo(Flight::class, 'from_flight_id');
    }

    public function toFlight()
    {
        return $this->belongsTo(Flight::class, 'to_flight_id');
    }
}
