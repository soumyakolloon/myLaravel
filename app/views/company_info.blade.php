@extends('layout')

@section('content')


@if (!Auth::guest()) 

<!-- List all the companies added by logged in user in a tabular format -->

<h6 style="color:#3366FF">
	Company '{{$company_info[0]->company_name}}' info
</h6>

<div class="company_info">

<div>Company Name: {{$company_info[0]->company_name}}</div>
<div>Company Name: {{$company_info[0]->country}}</div>
<div>Company Name: {{$company_info[0]->city}}</div>
<div>Company Name: {{$company_info[0]->address}}</div>

</div>

@endif
	
@stop
