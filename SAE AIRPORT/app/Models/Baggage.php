<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Baggage extends Model
{
    use HasFactory;

    protected $table = 'baggages';

    protected $primaryKey = 'baggage_id';

    protected $fillable = [
        'baggage_size',
        'baggage_weight',
        'baggage_type',
        'id_passenger'
    ];

    public $timestamps = false;

    public function passenger()
    {
        return $this->belongsTo(Passenger::class, 'id_passenger');
    }
}
