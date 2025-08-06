<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'stores';
    protected $primaryKey = 'store_id';

    public $timestamps = false;

    // Champs modifiables
    protected $fillable = [
        'store_name',
        'store_url_logo',
        'opening_time',
        'closing_time',
        'store_status',
        'id_service',
        'id_terminal'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }
    public function terminal()
    {
        return $this->belongsTo(Terminal::class, 'id_terminal');
    }
}
