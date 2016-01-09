<?php

namespace App\Models\Collection;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Link extends Model 
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'links';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['url','user_id','title','description','image','privacy_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];  
    
    //Relationships
    function privacy(){return $this->belongsTo('App\Models\Collection\Privacy','privacy_id');} 
    function user(){return $this->belongsTo('App\Models\Profile\User','user_id');} 
    function labels(){return $this->belongsToMany('App\Models\Collection\Label');} 
    
    //Scopes
    public function scopeUserRecentLinks($query)
    {
    return $query->where('user_id',Auth::user()->id)->orderBy('id','DESC')->get(); 
    }



                                        
}
