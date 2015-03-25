@extends('layout')

@section('content')
	<div class="row-fluid">
		@if(isset($message))
		<p>{{$message}}</p>
		@endif
			
			{{ Form::open(array('url' => '#')) }}
			<h2>Add New Contract</h2>
			<!-- if there are login errors, show them here -->
	
	
	<?php //echo $user_info[0]->password; die(); ?>

<div class="form-group">
   	{{ Form::label('client','Client') }}
   {{ Form::select('client', $clients) }}
</div>



<div class="form-group">
   {{ Form::label('client_manager',"Client's Manager") }}
   {{ Form::select('client_manager', $actm_users) }}
</div>


<div class="form-group">
   	{{Form::label('supplier','Supplier') }}
   {{Form::select('supplier', $clients) }}
</div>



<div class="form-group">
   {{ Form::label('supplier_manager',"Supplier's Manager") }}
   {{ Form::select('supplier_manager', $actm_users) }}
</div>



<div class="form-group">
   {{ Form::label('supplier_pgmr',"Supplier's Programmer") }}
   {{ Form::select('supplier_pgmr', $dev_users) }}
</div>



{{ Form::close() }}	
		
	
@stop






