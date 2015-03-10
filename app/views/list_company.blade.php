@extends('layout')

@section('content')

@if (!Auth::guest()) 


<!-- List all the companies added by logged in user in a tabular format -->

<p style="color:#3366FF">
	<strong>List of Main Companies</strong>
</p>


@if(empty($list_comp)!=1)


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
	@if($lc->status==1)
	<a href="{{URL::to('add_company')}}/id/<?php echo $lc->id; ?>">Edit</a> | 
	@endif
	<a onClick="javascript:ConfirmDelete('delete', {{$lc->id}});">Delete</a>
	@if($lc->status==1)
	| <a onClick="javascript:ConfirmDelete('archive', {{$lc->id}});">Archive</a>
	@else
	| <a onClick="javascript:ConfirmDelete('active', {{$lc->id}});">Active</a>
	@endif
</td>

</tr>



@endforeach

</table>

<script>

  function ConfirmDelete(action, id)
  {
  	
  	if(action=='delete')

  	var x = confirm("Are you sure you want to delete?");

  	else if(action=='archive')

  	var x = confirm("Are you sure you want to archive?");

  	else if(action=='active')

  	var x = confirm("Are you sure you want to make this company active?");

  if (x)
  {
  
  window.open("{{URL::to('/')}}/"+action+"_company/action/"+action+"/id/"+ id, '_parent');
  //return true;
  }
  else
    return false;
  }



</script>

@else

<div style="color:green">No Companies added Yet!!!!! </p></div>

@endif

@endif
	
@stop




