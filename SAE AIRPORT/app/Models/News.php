<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $primaryKey = 'news_id';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'url_image',
        'published_date',
        'news_status'
    ];
}
