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

        //variables
        $url=$request['url'];
        $user_id=Auth::user()->id;
        $title="";
        $description="";
        $image="";
        
        //validate
        $this->validate($request, [
            'url' => 'required',
        ]);
        
        //preview
        if($request['link_mode']=='preview'){
            return $this->postLinkPreview($request['url']);
        }
        
        //get data
        if($request['link_mode']==''){
            $getwebdata = Website::getWebsiteData($request['url']); 

            $title=$getwebdata['title'];
            $description=$getwebdata['description'];
            $image=$getwebdata['image'];
        }
        
        //form data
        if($request['link_mode']=='insert'){
            $title=$request['title'];
            $description=$request['description'];
            $image=$request['image'];
        }
        
        
        //add values
        $input = 
        [
            'url' => $url,
            'user_id' => $user_id,
            'title' => $title,
            'description' => $description,
            'image' => $image,
        ];
        
        //create
        $link_create = Link::create($input); 
        $link_info='Link added';
        
        //add to collection
        if($request['collection_id']){
        $collection = Collection::find($request['collection_id']);
        $collection->link()->attach($link_create->id);
        $link_info='Link added to '. $collection->name .' collection';
        }
        
        //return back()
        return redirect()->route('login.recents')
            ->with('info',$link_info)
            ->with('info_type','success');
    }
    
    
    
    function postEditLink(Request $request){
        $this->validate($request,[
        'title'=>'required',    
        ]);
        
        $input = [
            'title' => $request['title'],
            'description' => $request['description'],
            'privacy_id' => $request['privacy'],
        ];

        $link_edit = Link::find($request['linkid'])->update($input);

        return back()
            ->with('info','Link updated')
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







