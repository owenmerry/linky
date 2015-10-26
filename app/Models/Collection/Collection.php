<?php

namespace App\Models\Collection;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{  
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'collections';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','privacy_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];  
    
    //relationships                                      
    function privacy(){return $this->belongsTo('App\Models\Collection\Privacy','privacy_id');}  
    function link(){return $this->belongsToMany('App\Models\Collection\Link');}   
    function user(){return $this->belongsToMany('App\Models\Profile\User');}  

    //scopes

    //functions
     public function linkLastAdded(){
        $gettime = $this->link()->orderBy('id','DESC')->first();
         if($gettime){
             return \Carbon\Carbon::createFromTimeStamp(strtotime($gettime->created_at))->diffForHumans();
         }else{
             return "None added yet"; 
         };
    }
    
    public function collectionShared(){
        return $this->user()->count()-1;
    }


}
