@extends('layout')

@section('content')

@if (!Auth::guest()) 

<!-- List all the companies added by logged in user in a tabular format -->

<p style="color:#3366FF">
	<strong>List of Main Companies</strong>
</p>



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
<td>edit| delete| archive</td>

</tr>



@endforeach

</table>

@endif
	
@stop
