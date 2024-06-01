<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'blog_title',
        'author_img',
        'author_name',
        'date',
        'blog_img',
        'blog_description',
    ];
}
