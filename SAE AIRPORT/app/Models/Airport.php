<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    protected $table = 'airports'; // Nom de la table
    protected $primaryKey = 'airport_id'; // Clé primaire

    // Attributs modifiables
    protected $fillable = [
        'airport_name',
        'iata_airport_code',
        'city',
        'country',
        'id_address'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'id_address');
    }

    public function runways()
    {
        return $this->hasMany(Runway::class, 'id_airport');
    }

    public function gates()
    {
        return $this->hasMany(Gate::class, 'id_airport');
    }

    public function departureDetail()
    {
        return $this->hasMany(Detail::class, 'departure_airport_id');
    }

    public function arrivalDetail()
    {
        return $this->hasMany(Detail::class, 'arrival_airport_id');
    }
}
