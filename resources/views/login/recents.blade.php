@extends('templates.master')

@section('content')


<div class="col-md-6 col-md-offset-3"> 
<form method="post" action="{{route('link.addlink')}}">    
<div class="form-group">
  <h3>Add website bookmark</h3>
    <input type="text" class="form-control" name="url" placeholder="Paste website link here" />
  </div>
    <button class="btn btn-default">Add Link</button>
    <button name="link_mode" value="preview" class="btn btn-default">Add Link &amp; Preview</button>
    <input type="hidden" name="_token" value="{{Session::token()}}" />
</form>
</div>


<div class="col-md-12 mylinks"> 
<h4>My Links</h4>

    
 @include('login.partials.links_grid')













@stop