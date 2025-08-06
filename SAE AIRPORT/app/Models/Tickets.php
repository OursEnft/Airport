<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tickets extends Model
{
    use HasFactory;

    protected $table = 'flights'; // Nom de votre table
    protected $fillable = [
        'flight_number',
        'origin',
        'destination',
        'departure_time',
        'arrival_time',
        'total_avaible_seats',
        'flight_status',
    ];
}
