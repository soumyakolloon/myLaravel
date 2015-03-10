@extends('layout')

@section('content')

@if (!Auth::guest()) 
@if(isset($message) && $message!='')
<p style="color:green;">{{$message}}</p>
@endif

<!-- List all the companies added by logged in user in a tabular format -->

<p style="color:#3366FF">
	<strong>List of Main Companies</strong>
</p>

@if(!empty($list_comp))


<table border="1">
<tr>
<th>Title</th>
<th>Description</th>
<th>Address</th>
<th>Actions</th>
</tr>

@foreach($list_comp as $lc)
<tr>

<td><a href="{{URL::to('company_info')}}/id/<?php echo $lc->id; ?>">{{$lc->company_name}}</a></td>
<td>{{$lc->description}}</td>
<td>{{$lc->address}}, {{$lc->city}}, {{$lc->country}}</td>
<td>
	<a href="{{URL::to('add_company')}}/id/<?php echo $lc->id; ?>">Edit</a> | 
	<a href="{{URL::to('delete_company')}}/id/<?php echo $lc->id; ?>">Delete</a> |
	<a href="#">Archive</a>
</td>

</tr>



@endforeach

</table>
@else

<div style="color:green">No Companies added Yet!!!!! <p> <a href="{{ URL::to('add_company') }}">Add New Company</a> </p></div>

@endif

@endif
	
@stop
