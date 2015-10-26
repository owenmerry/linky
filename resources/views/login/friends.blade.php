@extends('templates.master')

@section('content')



<div class="col-md-8"> 
<h3>Your Friends</h3>

@foreach($friends as $friend)
<div class="media">
  <div class="media-body">
      <a href="{{route('login.user_recents',$friend->id)}}" >{{$friend->name}}</a>
  </div>
</div>
@endforeach    
    
</div>


@stop