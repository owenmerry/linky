   
@foreach ($links->chunk(3) as $chunk)
 <div class="row">
@foreach ($chunk as $link)
<div class="col-md-4">
<div class="panel panel-default card card-link">
<!-- List group -->   
      <div class="panel-body">
          <?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($link->created_at))->diffForHumans() ?>
          <a href="{{$link->url}}" target="_blank">
              @if($link->image)
              <img style="width:100%;" src="{{$link->image}}" />
              @else
              no_image.png
              @endif
              <div><b>{{$link->title}}</b></div>
          {{$link->description}}  
              <div><small>{{$link->url}}</small></div>
          </a>
        <div><i>Privacy: {{$link->privacy->name}}</i></div>
          
          

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
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".editlink_{{$link->id}}">Edit</button>
          @endif
          
      </div>
</div>     
</div>  
    
@endforeach 
</div>
@endforeach    








@foreach($links as $link)
<div class="modal fade editlink_{{$link->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Link</h4>
      </div>
      <div class="modal-body">
          
<form method="post" action="{{route('link.editlink')}}">  
<img style="width:100%;" src="{{$link->image}}" />    
<div class="form-group">
    <input type="text" class="form-control" value="{{$link->title}}" name="title" placeholder="Link Name" />
  </div>
<div class="form-group">
   <textarea name="description" cols="50" rows="5">
{{$link->description}}
</textarea> 
</div>    
<div class="form-group">
    <label for="Privacy" class="col-sm-2 control-label">Privacy</label>
    <select name="privacy" class="form-control">
    @foreach($privacy as $privacy_s)
    <option value="{{$privacy_s->id}}" @if($privacy_s->id==$collection->privacy_id) selected @endif >{{$privacy_s->name}}</option>
    @endforeach 
    </select>
</div>
    
    <button class="btn btn-default">Save Changes</button>
    <a href="{{route('link.deletelink',$link->id)}}" class="btn btn-default">Delete</a>
    <input type="hidden" name="linkid" value="{{$link->id}}" />
    <input type="hidden" name="_token" value="{{Session::token()}}" />
</form>        
      </div>
    </div>
  </div>
</div>
@endforeach 
