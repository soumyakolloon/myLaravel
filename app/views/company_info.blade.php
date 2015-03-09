@extends('layout')

@section('content')


@if (!Auth::guest()) 

<!-- List all the companies added by logged in user in a tabular format -->

<p style="color:#3366FF">
	<strong>Company {{$company_info[0]->company_name}}</strong>
</p>



@endif
	
@stop
