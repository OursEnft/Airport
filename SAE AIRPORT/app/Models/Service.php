<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $primaryKey = 'service_id';

    public $timestamps = false;

    protected $fillable = [
        'type'
    ];

    public function stores()
    {
        return $this->hasMany(Store::class, 'id_service');
    }
}
