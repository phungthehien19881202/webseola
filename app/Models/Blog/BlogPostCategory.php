<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPostCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
     protected $fillable = [
        'blog_category_name',
        'blog_category_slug',

    ];
}
