@extends('templates.master')

@section('content')

@include('login.user.partials.user_navigation')    

<div class="col-md-12 mylinks"> 
<h3>{{$user->name}}'s Friends</h3>

@foreach($user->link as $link)
<div class="col-md-4">
<div class="panel panel-default">
<!-- List group -->   
      <div class="panel-body">
          <?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($link->created_at))->diffForHumans() ?>
          <a href="{{$link->url}}" target="_blank">
              <img style="width:100%;" src="{{$link->image}}" />
              <div><b>{{$link->title}}</b></div>
          {{$link->description}}  
              <div><small>{{$link->url}}</small></div>
          </a>


      </div>
</div>     
</div>  
    
@endforeach    
    
</div>













@stop