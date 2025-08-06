<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $table = 'details'; // Nom de la table
    protected $primaryKey = 'detail_id'; // Clé primaire

    public $timestamps = false;

    // Attributs modifiables
    protected $fillable = [
        'id_flight',
        'departure_airport_id',
        'arrival_airport_id',
        'departure_runway_id',
        'arrival_runway_id',
        'id_aircraft',
        'departure_gate_id',
        'arrival_gate_id'
    ];

    protected $casts = [
        'id_flight' => 'integer',
        'departure_airport_id' => 'integer',
        'arrival_airport_id' => 'integer',
        'departure_runway_id' => 'integer',
        'arrival_runway_id' => 'integer',
        'id_aircraft' => 'integer',
        'departure_gate_id' => 'integer',
        'arrival_gate_id' => 'integer',
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'id_flight');
    }

    public function fromAirport()
    {
        return $this->belongsTo(Airport::class, 'departure_airport_id');
    }

    public function toAirport()
    {
        return $this->belongsTo(Airport::class, 'arrival_airport_id');
    }

    public function fromRunway()
    {
        return $this->belongsTo(Runway::class, 'departure_runway_id');
    }

    public function toRunway()
    {
        return $this->belongsTo(Runway::class, 'arrival_runway_id');
    }

    public function fromGate()
    {
        return $this->belongsTo(Gate::class, 'departure_gate_id');
    }

    public function toGate()
    {
        return $this->belongsTo(Gate::class, 'arrival_gate_id');
    }
    public function aircraft()
    {
        return $this->belongsTo(Aircraft::class, 'id_aircraft');
    }
}
