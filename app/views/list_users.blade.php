@extends('layout')

@section('content')

@if (!Auth::guest()) 


<!-- List all the companies added by logged in user in a tabular format -->

<p style="color:#3366FF">
	<strong>List of Users</strong>
</p>

@if(empty($user_list)!=1)


<table border="1">
<tr>
<th>Name</th>
<th>Email</th>
<th>Employee Code</th>
<th>Actions</th>
</tr>

@foreach($user_list as $lc)
<tr>

<td>{{$lc->name}}</td>
<td>{{$lc->email}}</td>
<td>{{$lc->emp_code}}</td>

<td>

  @if($lc->status==1)
  <a href="{{URL::to('register')}}/id/<?php echo $lc->id; ?>">Edit</a> | 
  @endif
  <a onClick="javascript:ConfirmDelete('delete', {{$lc->id}});">Delete</a>
  @if($lc->status==1)
   | <a onClick="javascript:ConfirmDelete('user_deactive', {{$lc->id}});">Deactive</a>
  @endif

</td>

</tr>



@endforeach

</table>


@else

<div style="color:green">No Users added Yet!!!!! </p></div>

@endif

@endif
	
@stop




