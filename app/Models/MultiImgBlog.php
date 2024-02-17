<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiImgBlog extends Model
{
    use HasFactory;
    protected $guarded = [];
     public function post(){
        return $this->belongsTo(BlogPost::class,'post_id','id');
    }
}
