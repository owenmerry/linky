<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\HTTP\Request;
use App\Models\Profile\User;
use App\Models\Collection\Link;
use App\Models\Collection\Label;
use App\Models\Collection\Collection;
use App\Models\Collection\Privacy;

class HomeController extends Controller {
    
    public function __construct(){
        
        $link_edit=true;
        
    }

    
    
    function home(){
        return view('home')->with('info','Alerts are working');
    }
    
    
    
/* login functions */   
    
    function getRecents(){
        $user = User::find(Auth::user()->id); 
        $links = Link::UserRecentLinks();
        $collections = User::find(Auth::user()->id)->collection()->orderBy('id','DESC')->get();
        $link_edit=true;
         return view('login.recents')
            ->with('collections',$collections)
            ->with('links',$links)
            ->with('user',$user)
            ->with('link_edit',$link_edit);
    }  
    
    function getCollections(){
        $user = User::find(Auth::user()->id);
        $user_all = User::all();
        $privacy = Privacy::all();
        return view('login.collections')
            ->with('privacy',$privacy)
            ->with('user_all',$user_all)
            ->with('user',$user);
    }

    function getCollections_det($collectionid){
        $collection = Collection::find($collectionid);
        $collections = User::find(Auth::user()->id)->collection()->orderBy('id','DESC')->get();
        $links = Collection::find($collectionid)->link()->orderBy('id','DESC')->get();
        return view('login.collections_det')
            ->with('links',$links)
            ->with('collections',$collections)
            ->with('collection',$collection);
    }
    
    function getBrowse(){
        $labels = Label::all();
        return view('login.browse')
            ->with('labels',$labels);
    }
    
    
    function getFriends(){
        $friends = User::all();
        return view('login.friends')
            ->with('friends',$friends);
    }    

    function getData(){
        
    return view('login.getdata');    
    }

    

/* user functions */
    
    function getUser_recents($user_id){
        $user = User::find($user_id);
        $links = Link::where('user_id',$user_id)->orderBy('id','DESC')->get();
        $collections = User::find(Auth::user()->id)->collection()->orderBy('id','DESC')->get();
        $link_edit=false;
        return view('login.user.user_recents')
            ->with('collections',$collections)
            ->with('links',$links)
            ->with('user',$user)
            ->with('link_edit',$link_edit);
    }
    
    function getUser_collections($user_id){
        $user = User::find($user_id);
        $collection_edit=false;
        return view('login.user.user_collections')
            ->with('user',$user)
            ->with('collection_edit',$collection_edit);
    }
    
    function getUser_friends($user_id){
        $user = User::find($user_id);
        return view('login.user.user_friends')
            ->with('user',$user);
    }  
    
    
    
    
}







