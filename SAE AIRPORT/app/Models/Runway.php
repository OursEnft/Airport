<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Runway extends Model
{
    use HasFactory;

    protected $table = 'runways';

    protected $primaryKey = 'runway_id';

    protected $fillable = [
        'runway_number',
        'lenght_meters',
        'surface_type',
        'runway_status',
        'id_airport'
    ];

    public $timestamps = false;

    public function airport()
    {
        return $this->belongsTo(Airport::class, 'id_airport');
    }

    public function departureDetail()
    {
        return $this->hasMany(Detail::class, 'departure_runway_id');
    }

    public function arrivalDetail()
    {
        return $this->hasMany(Detail::class, 'arrival_runway_id');
    }
}
