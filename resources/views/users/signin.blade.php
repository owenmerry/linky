@extends('templates.master')

@section('content')

<div class="container">
<div class="col-md-6 card">
<h2>Sign In</h2>


<form method="post" action="{{route('users.signin')}}">
    <div class="form-group{{$errors->has('email') ? ' has-error' : '' }}">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email" placeholder="Email">
    @if($errors->has('email'))<div class="help-block">{{$errors->first('email')}}</div>@endif
  </div>
  <div class="form-group{{$errors->has('password') ? ' has-error' : '' }}">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
    @if($errors->has('password'))<div class="help-block">{{$errors->first('password')}}</div>@endif
  </div>
     <div class="checkbox">
    <label>
      <input type="checkbox"> Remember Me
    </label>
  </div>
    <button type="submit" class="btn btn-md btn-primary">Sign In</button>
    <input type="hidden" name="_token" value="{{Session::token()}}" />
</form>
    
</div>
</div>

@stop