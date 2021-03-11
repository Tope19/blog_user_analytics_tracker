<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    protected $guarded = [];

    public function blog (){
        return $this->belongsTo(Blog::class);
    }
    public function getAvatar(){
        return route('homepage').env('ASSET_URL').'/user.png';
    }
}
