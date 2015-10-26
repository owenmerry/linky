<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\HTTP\Request;
use App\Models\Profile\User;
use App\Models\Collection\Link;
use App\Models\Collection\Label;
use App\Models\Collection\Collection;

class CollectionController extends Controller {
  
    
    
    
/* add functions */  
    function postAddCollection(Request $request){
        $this->validate($request,[
        'name'=>'required',    
        ]);
        
        $collection_create = Collection::create([
            'name' => $request['name'],
        ]);
        $collection = Collection::find($collection_create->id);
        $collection->user()->attach(Auth::user()->id);

        return redirect()->route('login.collections')
            ->with('info','Collection added')
            ->with('info_type','success');
    
    
}

    function postEditCollection(Request $request){
        $this->validate($request,[
        'name'=>'required',    
        ]);
        
        $input = [
            'name' => $request['name'],
            'privacy_id' => $request['privacy'],
        ];

        $collection_edit = Collection::find($request['collectionid'])->update($input);

        return back()
            ->with('info','Collection updated')
            ->with('info_type','success');
    
     
}
    
    
        function getDeleteCollection($collectionid){
        
        $collection_delete = Collection::find($collectionid);
        $collection_delete->user()->attach(Auth::user()->id);
        $collection_delete->delete();    

        return back()
            ->with('info','Collection deleted')
            ->with('info_type','success');
    
    
}






}
