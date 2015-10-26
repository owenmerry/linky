<?php

namespace App\Models\Collection;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    //
    
    //Relationships
    function links(){return $this->belongsToMany('App\Models\Collection\Link');} 
}
