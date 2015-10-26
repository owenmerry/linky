<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\HTTP\Request;
use App\Models\Profile\User;
use App\Models\Collection\Link;
use App\Models\Collection\Label;
use App\Models\Collection\Collection;
use App\Models\Collection\Website;

class LinkController extends Controller {
    
    function postAddlink(Request $request){
        
        $this->validate($request, [
            'url' => 'required',
        ]);
        
        if($request['link_mode']){
            return $this->postLinkPreview($request['url']);
        }
        
        
       $getwebdata = Website::getWebsiteData($request['url']);  
        
        
        $input = 
        [
            'url' => $request['url'],
            'user_id' => Auth::user()->id,
            'title' => $getwebdata['title'],
            'description' => $getwebdata['description'],
            'image' => $getwebdata['image'],
        ];
        
       $link_create = Link::create($input); 
        $link_info='Link added';
        
        if($request['collection_id']){
        $collection = Collection::find($request['collection_id']);
        $collection->link()->attach($link_create->id);
        $link_info='Link added to '. $collection->name .' collection';
        }
        
        return back()
            ->with('info','Link added')
            ->with('info_type','success');
    }
    
       function postLinkPreview($url){ 
           
           $getwebdata = Website::getWebsiteData($url);  
        
           return view('link.preview')
               ->with('getwebdata',$getwebdata);
      
      }    

    
      function getAddLinkToCollection($linkid,$collectionid){ 
        
        $collection = Collection::find($collectionid);
        $collection->link()->attach($linkid);
        $info='Link added to '. $collection->name .' collection';
        
        return back()
            ->with('info',$info)
            ->with('info_type','success');
      
      } 
    
      function getDeleteLink($linkid){ 
        
        $link_delete = Link::find($linkid);
        $link_delete->delete();
        $info='Link deleted';
        
        return back()
            ->with('info',$info)
            ->with('info_type','success');
      
      }     
    
    
}







