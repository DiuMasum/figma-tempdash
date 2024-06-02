<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_name',
        'designation',
        'author_description',
        'facebokk_link',
        'twitter_link',
        'instagram_link',
        'youtube_link',
        'author_img',
    ];
}
