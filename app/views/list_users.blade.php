@extends('layout')

@section('content')

@if (!Auth::guest()) 


<!-- List all the companies added by logged in user in a tabular format -->

<p style="color:#3366FF">
	<strong>List of Users</strong>
</p>

<?php 

// echo '<pre>';
// print_r($user_list);
// exit;

?>

@if(empty($user_list)!=1)


<table border="1">
<tr>
<th>Name</th>
<th>Email</th>
<th>Employee Code</th>
@if(Auth::user()->hasRole('admin'))
<th>Actions</th>
@endif

</tr>

@foreach($user_list as $lc)
<tr>

<td>{{$lc->first_name}} {{$lc->last_name}}</td>
<td>{{$lc->email}}</td>
<td>{{$lc->emp_code}}</td>
@if(Auth::user()->hasRole('admin'))
<td>

  @if($lc->Status==1)

  <a href="{{URL::to('register')}}/id/<?php echo $lc->id; ?>">Edit</a> | 
  
@endif



  <a onClick="Confirmaction('delete', {{$lc->id}});">Delete</a>

  @if($lc->Status==1)

  | <a onClick="Confirmaction('deactive', {{$lc->id}});">Deactive</a>

  @else

| <a onClick="Confirmaction('active', {{$lc->id}});">Active</a>

  @endif



</td>
@endif
</tr>



@endforeach

</table>


@else

<div style="color:green">No Users added Yet!!!!! </p></div>

@endif

@endif
	
@stop




<script>

  function Confirmaction(action, id)
  {
    
    if(action=='delete')

    var x = confirm("Are you sure you want to delete?");

    else if(action=='deactive')

    var x = confirm("Are you sure you want to deactivate user?");

    else if(action=='active')

      var x = confirm("Are you sure you want to activate user?");
   
    if (x)
    {
    
    window.open("{{URL::to('/')}}/"+action+"_user/action/"+action+"/id/"+ id, '_parent');
    //return true;
    }
    else
      return false;
    }



</script>