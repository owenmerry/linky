@extends('templates.master')

@section('content')

@include('login.user.partials.user_navigation')     

<div class="col-md-12 mylinks"> 
<h3>{{$user->name}}'s Recent Links</h3>


    
  @include('login.partials.links_grid')   
    

    
</div>













@stop