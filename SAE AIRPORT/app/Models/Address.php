<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $primaryKey = 'address_id';

    protected $fillable = [
        'street',
        'postal_code',
        'city',
        'country'
    ];

    public $timestamps = false;

    public function airports()
    {
        return $this->hasMany(Airport::class, 'id_address');
    }

    public function parkings()
    {
        return $this->hasMany(Parking::class, 'id_address');
    }

    public function terminals()
    {
        return $this->hasMany(Terminal::class, 'id_address');
    }
}
