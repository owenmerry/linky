<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{route('home')}}">Linky</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            @if(Auth::check())
              <li><a href="{{route('login.recents')}}">My Links</a></li>
              <li><a href="{{route('login.collections')}}">Collections</a></li>
              <!--<li><a href="{{route('login.friends')}}">Friends</a></li>-->
            @else
              <li><a href="{{route('home')}}">Home</a></li>
            @endif 
            <!--<li><a href="{{route('login.browse')}}">Browse</a></li>-->
          </ul>
            <!--<form class="navbar-form navbar-left" method="post">
                <div class="form-group">
            <input type="text" class="form-control" placeholder="Search Linky.." />
                </div>
                <button class="btn btn-default">Search</button>
            </form>-->
            <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())   
            <li><a href="{{route('login.recents')}}">{{Auth::user()->email }}</a></li>
            <li><a href="{{route('users.signout')}}">Logout</a></li>    
            @else
            <li><a href="{{route('users.signup')}}">Sign Up</a></li>
            <li><a href="{{route('users.signin')}}">Sign In</a></li>     
            @endif   
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>