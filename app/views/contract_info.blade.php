@extends('layout')

@section('content')


@if (!Auth::guest()) 

<!-- List all the companies added by logged in user in a tabular format -->


<h6 style="color:#3366FF">
	Contract '#{{$contract_info[0]->id}}' details
</h6>

<div class="contract_info">

<div>Client: {{$contract_info[0]->client_name}}</div>

<div>Client Manager: {{$contract_info[0]->client_manager_name}}</div>
<div>Supplier: {{$contract_info[0]->supplier_name}}</div>
<div>Bridge Account Manager: {{$contract_info[0]->supplier_manager_name}}</div>
<div>Supplier Company Manager: {{$contract_info[0]->supplier_manager_name}}</div>
<div>Client Price: {{$contract_info[0]->client_price}}</div>
<div>Supplier Price: {{$contract_info[0]->supplier_price}}</div>

<div>Fixed Price: @if($contract_info[0]->fixed_price==1) Yes @else NO @endif</div>

<div>Remarks: {{$contract_info[0]->remarks}}</div>

</div>

@endif
	
@stop