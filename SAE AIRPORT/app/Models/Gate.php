<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gate extends Model
{
    use HasFactory;

    protected $table = 'gates';

    protected $primaryKey = 'gate_id';

    protected $fillable = [
        'gate_name',
        'gate_status',
        'id_terminal'
    ];

    public $timestamps = false;

    public function terminal()
    {
        return $this->belongsTo(Terminal::class, 'id_terminal');
    }

    public function departureDetails()
    {
        return $this->hasMany(Detail::class, 'departure_gate_id');
    }

    public function arrivalDetails()
    {
        return $this->hasMany(Detail::class, 'arrival_gate_id');
    }
}
