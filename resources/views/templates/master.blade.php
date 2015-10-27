<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Webshare</title>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">  
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--sweet alerts-->  
    <link rel="stylesheet" href="{{asset('frameworks/sweetalert/sweetalert.css')}}">  
    <!--custom-->  
    <link rel="stylesheet" href="{{asset('css/stylesheet.css')}}">  

  </head>
  <body>

      
     
@include('templates.partials.navigation')            
      
<div class="container"> 
@include('templates.partials.alerts')    
    
@yield('content')      
</div>      

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!--sweet alerts--> 
    <script src="{{asset('frameworks/sweetalert/sweetalert.min.js')}}"></script>
    <!--custom-->
    <script src="{{asset('js/myscripts.js')}}"></script>
      
  </body>
</html>

