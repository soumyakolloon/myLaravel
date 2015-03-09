<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	
		<link rel="stylesheet" href='../css/bootstrap.min.css'>
	<link rel="stylesheet" href='../css/bootstrap.css'>
        <style>
        @section('styles')
            body {
                padding-top: 60px;
            }
        @show
        </style>
</head>
  <body>
	  
	    <!-- Navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                
                <!-- Everything you want hidden at 940px or less, place within here -->
                <div class="collapse navbar-collapse">
                    
                    <ul class="nav navbar-nav">
                       	
					<li><a a href="{{URL::to('')}}">Home</a></li>
					
					@if (Auth::guest()) 
					<li><a href="{{URL::to('register')}}">Create User</a></li>
					<li><a href="{{URL::to('login')}}">Login</a></li>
					</ul>
					@else
					</ul>
					<p class="nav navbar-nav" style="float:right; margin-left:900px;">
					{{Auth::user()->email}}
					<a href="{{ URL::to('logout') }}">Logout</a>
					</p>
					@endif
					
					
                     
                </div>
            </div>
        </div> 

        <!-- Container -->
        <div class="container">

            <!-- Content -->
            @yield('content')

        </div>
	  
   
     
       
        
    <div class="sidebar">
       @yield('sidebar')
    </div>
     <!-- Scripts are placed here -->
      <script  src='../js/jquery-1.10.2.js'></script>
    
	<script  src='../js/bootstrap.js'></script>
    
  </body>
</html>
