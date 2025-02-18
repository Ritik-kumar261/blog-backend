<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "blog_comment";
    protected $fillable = ['post_id', 'user_id', 'content'];
    
}
