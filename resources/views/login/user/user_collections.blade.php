@extends('templates.master')

@section('content')

@include('login.user.partials.user_navigation')   

<div class="col-md-12 mylinks"> 
<h3>{{$user->name}}'s Collections</h3>

@foreach($user->collection as $collection)
<div class="col-md-3">
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-body"> 
      <h6>{{$collection->name}}({{$collection->link->count()}})</h6>
       <a href="{{route('login.collections_det',$collection->id)}}" class="btn btn-primary" >View</a>  
        <div><i>Last added to {{$collection->linkLastAdded()}}</i></div>
        <div><i>Shared {{$collection->collectionShared()}}</i></div>
      <div><i>Privacy: {{$collection->privacy->name}}</i></div>
    </div>
  
</div>     
</div>   
    
@endforeach      
    
</div>













@stop