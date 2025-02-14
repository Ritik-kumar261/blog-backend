<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $table =  "daily_blog";
    protected $fillable = ["title","content","author","publication_date"];


}
