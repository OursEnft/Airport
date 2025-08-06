<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
    use HasFactory;

    protected $table = 'aircrafts'; // Nom de la table
    protected $primaryKey = 'aircraft_id'; // Clé primaire

    public $timestamps = false;

    // Attributs modifiables
    protected $fillable = [
        'model',
        'manufacturer',
        'capacity',
        'max_altitude',
        'registration_number',
        'id_airline',
    ];

    protected $casts = [
        'capacity' => 'integer',
        'max_altitude' => 'double',
        'id_airline' => 'integer',
    ];

    public function airline()
    {
        return $this->belongsTo(Airline::class, 'id_airline');
    }

    public function details()
    {
        return $this->hasMany(Detail::class, 'id_aircraft');
    }
}
