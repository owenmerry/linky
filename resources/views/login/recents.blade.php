@extends('templates.master')

@section('content')


<div class="addlink">
<div class="content"> 
<form method="post" action="{{route('link.addlink')}}">    
<div class="form-group">
  <h1>Add website bookmark</h1>
    <input type="text" class="form-control" name="url" placeholder="Paste website link here" />
  </div>
    <button class="btn btn-md btn-primary">Add Link</button>
    <button name="link_mode" value="preview" class="btn btn-md btn-primary">Add Link &amp; Preview</button>
    <input type="hidden" name="_token" value="{{Session::token()}}" />
</form>
</div>
</div>


<div class="col-md-12 mylinks"> 
<h4>My Links</h4>

  
    
 @include('login.partials.links_grid')













@stop