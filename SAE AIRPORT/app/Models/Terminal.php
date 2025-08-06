<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    use HasFactory;

    protected $table = 'terminals';

    protected $fillable = [
        'terminal_name',
        'id_airport',
        'id_address'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'id_address');
    }

    public function airport()
    {
        return $this->belongsTo(Airport::class, 'id_airport');
    }

    public function gates()
    {
        return $this->hasMany(Gate::class, 'id_gate');
    }

    public function stores()
    {
        return $this->hasMany(Store::class, 'id_terminal');
    }
}
