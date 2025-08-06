<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class UserPass extends Model
{
    use HasFactory;

    protected $table = 'users_passes';

    protected $primaryKey = 'id_user';
    protected $primarykey = 'id_pass';

    protected $fillable = [
        'id_user',
        'id_pass',
        'expiry_date',
        'passenger_pass_status'
    ];
}
