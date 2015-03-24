<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	
	<!--	<link rel="stylesheet" href='../css/bootstrap.min.css'>-->
	
	<link rel="stylesheet" href='{{URL::to('/')}}/css/bootstrap.css'>
   <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <link rel='stylesheet prefetch' href='https://cdn.jsdelivr.net/foundation/5.0.2/css/foundation.css'>
  <link href="{{URL::to('/')}}/css/mtree.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="http://jqueryvalidation.org/files/demo/site-demos.css">

     {{ asset('css/mtree.css') }} 
 <script  src='{{URL::to('/')}}/js/jquery-1.10.2.js'></script>
  <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>

    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>

</head>
  <body>
	  
	    <!-- Navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                
                <!-- Everything you want hidden at 940px or less, place within here -->
                <div class="collapse navbar-collapse">
                    
                    <ul class="nav navbar-nav">
                       	
					<!-- <li><a a href="{{URL::to('')}}">Home</a></li> -->
					
					@if (Auth::guest()) 
					<!-- <li><a href="{{URL::to('register')}}">Create User</a></li> -->
					<li><a href="{{URL::to('login')}}">Login</a></li>
					</ul>
					@else
					</ul>
					<p class="nav navbar-nav" style="float:right; margin-left:900px;">
					Welcome {{Auth::user()->name}}
					<a href="{{ URL::to('logout') }}">Logout</a>
					</p>
					@endif
				    </div>
            </div>
        </div> 

  @if (!Auth::guest()) 
<div class="leftsidebar" style="margin-top: 100px;">
 <ul class="mtree transit">
      
      <li><a href="{{ URL::to('my_company_info') }}">My Company</a>
     
       
         @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('account_manager') )
         <ul>
        <li><a href="{{ URL::to('list_company') }}">My Companies</a> </li>

        <li><a href="{{ URL::to('add_company') }}">Add Company</a>  </li>
       
        <li><a href="{{ URL::to('list_company/action/archive') }}">Archived Companies</a>

        </li>
        </ul>
        @endif

          
        </li>

        <li><a href="{{URL::to('list_users')}}">Users</a>
      @if(Auth::user()->hasRole('admin'))  
      <ul>
      <li><a href="{{URL::to('list_users')}}">Active Users</a></li>
      <li><a href="{{ URL::to('deactivate_user/action/deactive') }}">Deactivated Users</a></li>
      <li><a href="{{ URL::to('register') }}">Add User</a></li>
      </ul>
      
      @endif
      </li>
      
     <!--  <li><a href="#">Leave Management</a>
      <ul>
        <li><a href="{{URL::to('apply_leave')}}">Apply Leave</a></li>
        <li><a href="#">Holiday Calendar</a></li>
        <li><a href="#">Leave Summary</a></li>

      </ul>

   </li>  -->       


  <li><a href="#">PM Users</a>
      <ul>
        <li><a href="{{URL::to('list_pm_users')}}">List PM Users</a></li>
        <li><a href="{{URL::to('add_pm_user')}}">Add PM users</a></li>
            

      </ul>

   </li>    
        
</ul>
</div>

@endif
        <!-- Container -->
        <div class="container">

            <!-- Content -->
            @yield('content')

        </div>
	  
   
     
       
        
    <div class="sidebar">
       @yield('sidebar')
    </div>
   


  <!-- Scripts are placed here -->
 
     
    
	     <script  src='{{URL::to('/')}}/js/bootstrap.js'></script>
  <!-- Load jQuery UI Main JS  -->
   <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
   <script src="http://cdnjs.cloudflare.com/ajax/libs/velocity/0.2.1/jquery.velocity.min.js"></script> 
 
    <!-- valiadation styles -->
   


    <script src="{{URL::to('/')}}/js/mtree.js"></script> 

<script>
$(document).ready(function() {
  var mtree = $('ul.mtree');
  
  // Skin selector for demo
  mtree.wrap('<div class=mtree-demo></div>');
  var skins = ['bubba','skinny','transit','jet','nix'];
  mtree.addClass(skins[0]);
  $('body').prepend('');
  var s = $('.mtree-skin-selector');
  $.each(skins, function(index, val) {
    s.find('ul').append('<li>' + val + '</li>');
  });
  
  
  /* This is the function that will get executed after the DOM is fully loaded */
 
    $(".datepicker").datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true, //this option for allowing user to select from year range
     //  minDate: 1
    });
 
});
</script>

  
</body>
</html>
