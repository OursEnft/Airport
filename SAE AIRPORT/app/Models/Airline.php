<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Airline extends Model
{
    use HasFactory;

    protected $table = 'airlines';

    protected $primaryKey = 'airline_id';

    protected $fillable = [
        'airline_name',
        'airline_url_website',
        'airline_url_logo',
        'iata_airline_code',
        'country',
        'airline_phone'
    ];

    public $timestamps = false;

    public function aircrafts()
    {
        return $this->hasMany(Aircraft::class, 'id_airline');
    }
}

