<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	
	<!--	<link rel="stylesheet" href='../css/bootstrap.min.css'>-->
	
	<link rel="stylesheet" href='../css/bootstrap.css'>
  <link rel='stylesheet prefetch' href='https://cdn.jsdelivr.net/foundation/5.0.2/css/foundation.css'>
  <link href="../css/mtree.css" rel="stylesheet" type="text/css">
      
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

  @if (!Auth::guest()) 
<div class="leftsidebar" style="margin-top: 100px;">
 <ul class="mtree transit">
      <li><a href="{{ URL::to('list_company') }}">My Company</a>
      <ul>
        <li><a href="{{ URL::to('add_company') }}">Add Company</a>  </li>
        <li><a href="#">Users</a>
          <ul>
      <li><a href="#">Deactivated Users</a></li>
      <li><a href="#">Add User</a></li>
          </ul>
        </li>

         <li><a href="#">Archived Companies</a></li>
           
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
      <script  src='../js/jquery-1.10.2.js'></script>
    
	     <script  src='../js/bootstrap.js'></script>



<script src='http://cdnjs.cloudflare.com/ajax/libs/velocity/0.2.1/jquery.velocity.min.js'></script> 

<script src="../js/mtree.js"></script> 
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
  
  s.find('button.skin').each(function(index){
    $(this).on('click.mtree-skin-selector', function(){
      s.find('button.skin.active').removeClass('active');
      $(this).addClass('active');
      mtree.removeClass(skins.join(' ')).addClass(skins[index]);
    });
  })
  s.find('button:first').addClass('active');
  s.find('.csl').on('click.mtree-close-same-level', function(){
    $(this).toggleClass('active'); 
  });
});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>



    
  </body>
</html>
