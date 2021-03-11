<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
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
}
