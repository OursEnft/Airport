<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserPub extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'users_pub';
    protected $primaryKey = 'user_id';

    //public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password_hash',
        'password_salt',
        'iterations',
        'id_role'
    ];

    protected $hidden = [
        'password_hash',
        'password_salt',
        'iterations'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }
}
