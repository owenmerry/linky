   
@foreach ($links->chunk(3) as $chunk)
 <div class="row">
@foreach ($chunk as $link)
<div class="col-md-4">
<div class="panel panel-default card card-link">
<!-- List group -->   
      <div class="panel-body">
          <?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($link->created_at))->diffForHumans() ?>
          <a href="{{$link->url}}" target="_blank">
              <img style="width:100%;" src="{{$link->image}}" />
              <div><b>{{$link->title}}</b></div>
          {{$link->description}}  
              <div><small>{{$link->url}}</small></div>
          </a>

          
          

<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
      <i class="glyphicon glyphicon-menu-hamburger"></i>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li class="dropdown-header">Collections</li>
    @foreach($collections as $collection)
    <li><a href="{{route('link.addlinktocollection',[$link->id,$collection->id])}}">{{$collection->name}}({{$collection->link()->count()}})</a></li>
    @endforeach
  </ul>
</div>
        
          @if($link_edit)
          <a href="{{route('link.deletelink',$link->id)}}" class="btn btn-default">Delete</a>          
          @endif
          
      </div>
</div>     
</div>  
    
@endforeach 
</div>
@endforeach    
    
</div>