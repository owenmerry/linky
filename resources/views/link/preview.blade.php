@extends('templates.master')

@section('content')
  

<div class="col-md-12 mylinks"> 
<h3>Link Preview</h3>

<form method="post" action="{{route('link.addlink')}}">  
<h5>Image</h5>  
 <img width="100px" src="{{$getwebdata['image']}}" />
    
<h5>Images</h5>
<select name="image">
    <option value="{{$getwebdata['image']}}">{{$getwebdata['image']}}</option>    
@foreach ($getwebdata['images'] as $image)    
    <option value="{{$image}}">{{$image}}</option>
@endforeach      
    </select>
@foreach ($getwebdata['images'] as $image)    
    <div><div>{{$image}}</div><img width="100px" src='{{$image}}' /></div>
@endforeach    

<h5>Title</h5>
<input type="text" name="title" value="{{$getwebdata['title']}}" />
    
<h5>Description</h5> 
<textarea name="description" cols="50" rows="5">
{{$getwebdata['description']}}
</textarea>
    
    <input type="hidden" name="link_mode" value="insert" />
    <input type="hidden" name="url" value="{{$getwebdata['url']}}" />
    <input type="hidden" name="_token" value="{{Session::token()}}" />
    
    <div><button class="btn btn-default">Add Link</button></div>
</form>    
</div>













@stop