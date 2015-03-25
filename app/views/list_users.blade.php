@extends('layout')

@section('content')

@if (!Auth::guest()) 

<!-- List all the companies added by logged in user in a tabular format -->

<?php 

// echo '<pre>';
// print_r($user_list['page_key']);
// exit;

?>

<p style="color:#3366FF">
  @if($page_key=='list_users')
	<strong>List of Users</strong>
  @else
  <strong>List of PM Users</strong>
  @endif
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
<?php 
$page_key = Route::getCurrentRoute()->getPath();

if(Route::getCurrentRoute()->getPath()=='list_pm_users') 
$user_id = $lc->user_id;
else
$user_id = $lc->id;

?>

<td>{{$lc->first_name}} {{$lc->last_name}}</td>
<td>{{$lc->email}}</td>
<td>{{$lc->emp_code}}</td>
@if(Auth::user()->hasRole('admin'))

<td>
@if($lc->Status==1)
<a href="{{URL::to('register')}}/id/<?php echo Crypt::encrypt($user_id); ?>/page_key/<?php echo Crypt::encrypt($page_key); ?>">Edit</a> | 
@endif


<a onClick="Confirmaction('delete', {{$user_id}}, '{{$page_key}}');">Delete</a>
@if($page_key=='list_users')
@if($lc->Status==1)
| <a onClick="Confirmaction('deactive', {{$user_id}}, '<?php echo $page_key; ?>');">Deactive</a>
@else
| <a onClick="Confirmaction('active', {{$user_id}}, '<?php echo $page_key; ?>');">Active</a>
@endif
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

  function Confirmaction(action, id, page_key)
  {
    
    if(action=='delete')

    var x = confirm("Are you sure you want to delete?");

    else if(action=='deactive')

    var x = confirm("Are you sure you want to deactivate user?");

    else if(action=='active')

      var x = confirm("Are you sure you want to activate user?");
   
    if (x)
    {
    if(!page_key)
      page_key = 'list_users';
    window.open("{{URL::to('/')}}/"+action+"_user/action/"+action+"/id/"+ id+"/page_key/"+page_key, '_parent');
    //return true;
    }
    else
      return false;
    }



</script>