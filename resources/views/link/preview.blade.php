@extends('templates.master')

@section('content')
  

<div class="col-md-12 mylinks"> 
<h3>Link Preview</h3>


<h5>Image</h5>  
 <img width="100px" src="{{$getwebdata['image']}}" />
    
<h5>Images</h5>
@foreach ($getwebdata['images'] as $image)    
<img width="100px" src='{{$image}}' />
@endforeach

<h5>Title</h5>
 {{$getwebdata['title']}}
    
<h5>Description</h5>    
{{$getwebdata['description']}}
    
</div>













@stop