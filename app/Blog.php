<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected  $guarded=[];

    public function getStatus(){
       if($this->status == 0){
           return 'Unpublished';
       }
       else{
           return 'Published';
       }
    }

    public function blog_category(){
        return $this->belongsTo(BlogCategory::class);
    }

    public function user(){
      return  $this->belongsTo(User::class);
    }

    public function comments (){
        return $this->hasMany(BlogComments::class);
    }
}
