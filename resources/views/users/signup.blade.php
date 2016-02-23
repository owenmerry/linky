@extends('templates.master')

@section('content')


<div class="container">
<div class="col-md-6 card">
<h2>Sign Up</h2>


<form method="post" action="{{route('users.signup')}}">
 <div class="form-group{{$errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="control-label">Name</label>
    <input type="text" class="form-control" name="name" value="{{Request::old('name') ?: ''}}" placeholder="Your Full Name">
     @if($errors->has('name'))<div class="help-block">{{$errors->first('name')}}</div>@endif
  </div>
    <div class="form-group{{$errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="control-label">Email address</label>
    <input type="email" class="form-control" name="email" placeholder="Email">
    @if($errors->has('email'))<div class="help-block">{{$errors->first('email')}}</div>@endif
  </div>
  <div class="form-group{{$errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="control-label">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
      @if($errors->has('password'))<div class="help-block">{{$errors->first('password')}}</div>@endif
  </div>
    <button type="submit" class="btn btn-md btn-primary">Sign Up</button>
    <input type="hidden" name="_token" value="{{Session::token()}}" />
</form>
    
</div>
</div>


@stop