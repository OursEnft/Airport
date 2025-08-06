<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flight extends Model
{
    use HasFactory;

    // Spécifiez le nom de la table si ce n'est pas le pluriel du nom du modèle
    protected $table = 'flights';

    protected $primaryKey = 'flight_id';

    // Attributs modifiables en masse
    protected $fillable = [
        'flight_number',
        'origin',
        'destination',
        'departure_time',
        'arrival_time',
        'total_avaible_seats',
        'flight_status'
    ];

    // Si vos colonnes timestamps (created_at et updated_at) ne sont pas utilisées
    public $timestamps = false;

    // Cast des colonnes pour les types de données spécifiques
    protected $casts = [
        'departure_time' => 'datetime',
        'arrival_time' => 'datetime',
        'total_avaible_seats' => 'integer',
    ];

    public function details()
    {
        return $this->belongsTo(Detail::class, 'id_flight');
    }

    public function flightClasses()
    {
        return $this->hasMany(FlightClass::class, 'id_flight');
    }

    public function fromFlightConnections()
    {
        return $this->hasMany(FlightConnection::class, 'from_flight_id');
    }

    public function toFlightConnections()
    {
        return $this->hasMany(FlightConnection::class, 'to_flight_id');
    }

    public function reservationPassengers()
    {
        return $this->hasMany(ReservationPassenger::class, 'id_flight');
    }
}
