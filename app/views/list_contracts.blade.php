@extends('layout')

@section('content')


 

<table border="1">

<tr>
<th>Contract ID</th>
<th>Client</th>
<th>Start Date</th>
<th>End Date</th>
<th>Programmer</th>
<th>Supplier</th>
<th>Options</th>
</tr>

@foreach($contract_list as $ctrlist)
<tr>
<td>{{$ctrlist->id}}</td>
<td>{{$ctrlist->client_name}}</td>
<td>{{$ctrlist->start_date}}</td>
<td>{{$ctrlist->end_date}}</td>
<td>{{$ctrlist->programmer_name}}</td>
<td>{{$ctrlist->supplier_name}}</td>


<td>

<a href="{{URL::to('contract_info')}}/id/<?php echo Crypt::encrypt($ctrlist->id); ?>">Contract info</a> |

<a href="{{URL::to('edit_contracts')}}/id/<?php echo Crypt::encrypt($ctrlist->id); ?>">Edit Contract info</a>

<a href="{{URL::to('add_file')}}/id/<?php echo Crypt::encrypt($ctrlist->id); ?>">Add Files</a>

</td>


</tr>
@endforeach

</table>



@stop