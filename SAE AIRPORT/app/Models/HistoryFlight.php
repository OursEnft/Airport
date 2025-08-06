<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class HistoryFlight extends Model
{
    use HasFactory;

    protected $table = 'history_flight';

    protected $primaryKey = 'history_flight_id';

    protected $fillable = [
        'history_flight_status',
        'datetime_flight_event',
        'id_flight'
    ];

    public $timestamps = false;

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'id_flight');
    }
}
