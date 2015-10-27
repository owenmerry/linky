@extends('templates.master')

@section('content')




<div class="col-md-12 mycollections"> 
<h4>My Collections</h4>

@foreach($user->collection as $collection)
<div class="col-md-3">
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-body"> 
      <h6>{{$collection->name}}({{$collection->link->count()}})</h6>
       <a href="{{route('login.collections_det',$collection->id)}}" class="btn btn-primary" >View</a>
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".editcollection_{{$collection->id}}">Edit</button>   
        <div><i>Last added to {{$collection->linkLastAdded()}}</i></div>
        <div><i>Shared {{$collection->collectionShared()}}</i></div>
    </div>
  
</div>     
</div>   
    
@endforeach    
   
<div class="col-md-3">
<div class="panel panel-default">
    <div class="panel-body text-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".addcollection">Add Collection</button>       
        
    
    </div>
</div>     
</div>
    
</div>












<div class="modal fade addcollection" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Collection</h4>
      </div>
      <div class="modal-body">
          
<form method="post" action="{{route('collection.addcollection')}}">          
<div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Collection Name" />
  </div>
    <button class="btn btn-default">Add Collection</button>
    <input type="hidden" name="_token" value="{{Session::token()}}" />
</form>        
      </div>
    </div>
  </div>
</div>



@foreach($user->collection as $collection)
<div class="modal fade editcollection_{{$collection->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit {{$collection->name}} Collection</h4>
      </div>
      <div class="modal-body">
          
<form method="post" action="{{route('collection.editcollection')}}">          
<div class="form-group">
    <input type="text" class="form-control" value="{{$collection->name}}" name="name" placeholder="Collection Name" />
  </div>
<div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Privacy</label>
    <select name="privacy" class="form-control">
    @foreach($privacy as $privacy_s)
    <option value="{{$privacy_s->id}}" @if($privacy_s->id==$collection->privacy_id) selected @endif >{{$privacy_s->name}}</option>
    @endforeach 
    </select>
</div>
    
    <button class="btn btn-default">Save Changes</button>
    <a href="{{route('collection.deletecollection',$collection->id)}}" class="btn btn-default pull-right">Delete</a>
    <input type="hidden" name="collectionid" value="{{$collection->id}}" />
    <input type="hidden" name="_token" value="{{Session::token()}}" />
</form>        
      </div>
    </div>
  </div>
</div>
@endforeach 


@stop