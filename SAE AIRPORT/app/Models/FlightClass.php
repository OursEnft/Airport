<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FlightClass extends Model
{
    use HasFactory;

    protected $table = 'flight_class';

    protected $primaryKey = 'id_flight';

    protected $fillable = [
        'id_flight',
        'id_class',
        'price',
        'available_seats'
    ];

    public $timestamps = false;

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'id_flight');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'id_class');
    }
}
