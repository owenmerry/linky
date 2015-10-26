@extends('templates.master')

@section('content')



<div class="col-md-9 mylinks"> 

    <a href="{{route('login.collections')}}" class="btn btn-default">Collections</a> >   

    
    <div class="dropdown" style="display:inline-block;">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
      {{$collection->name}}
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    @foreach($collections as $collection_d)
    <li><a href="{{route('login.collections_det',$collection_d->id)}}">
        {{$collection_d->name}}
        ({{$collection_d->link()->count()}})
        </a></li>
    @endforeach
  </ul>
</div>    
    
    
<h3>{{$collection->name}} Links</h3>


@foreach ($links->chunk(3) as $chunk)
 <div class="row">
@foreach ($chunk as $link)
<div class="col-md-4">
<div class="panel panel-default  card card-link">
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
@endforeach    
</div>

<div class="col-md-3">
<div class="text-center">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".addlink">Add Link</button>   
</div>
    <div><b>Last Link Added</b> <span>{{$collection->linkLastAdded()}}</span></div>
    <div><b>Links in collection</b> <span>{{$collection->link->count()}}</span></div>
    <div><b>Collection shared</b> <span>{{$collection->collectionShared()}}</span></div>
    <div><b>Privacy</b> <span>{{$collection->privacy->name}}</span></div>
    
</div>





<div class="modal fade addlink" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Link</h4>
      </div>
      <div class="modal-body">
          
<form method="post" action="{{route('link.addlink')}}">          
<div class="form-group">
    <input type="text" class="form-control" name="url" placeholder="Paste website address" />
  </div>
    <button class="btn btn-default">Add Collection</button>
    <input type="hidden" name="collection_id" value="{{$collection->id}}" />
    <input type="hidden" name="_token" value="{{Session::token()}}" />
</form>        
      </div>
    </div>
  </div>
</div>













@stop