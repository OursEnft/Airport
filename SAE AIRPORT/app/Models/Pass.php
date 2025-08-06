<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pass extends Model
{
    use HasFactory;

    protected $table = 'passes';
    protected $primaryKey = 'pass_id';

    public $timestamps = false;

    protected $fillable = [
        'pass_name',
        'pass_price',
        'pass_status',
    ];

    public function userPasses()
    {
        return $this->hasMany(UserPass::class, 'id_pass');
    }
}
