@extends('templates.master')

@section('content')



<div class="col-md-8"> 
<h3>Browse by Labels</h3>

@foreach($labels as $label)
<div class="media">
  <div class="media-body">
      <a href="" target="_blank">{{$label->name}}</a>
  </div>
</div>
@endforeach    
    
</div>


@stop