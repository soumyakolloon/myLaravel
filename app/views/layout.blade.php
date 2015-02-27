<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	{{HTML::style('js/jquery-1.10.2.js')}}
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('js/bootstrap.js') }}
	
</head>
  <body>
    <nav class="navigation">
      @section('navigation')
        <a href="{{{ URL::to('/') }}}">Home</a>
        <a href="{{{ URL::to('about') }}}">About</a>
      @show
    </nav>
 
    <div class="container">
       @yield('content')
    </div>
     
    <div class="sidebar">
       @yield('sidebar')
    </div>
    
    
  </body>
</html>
