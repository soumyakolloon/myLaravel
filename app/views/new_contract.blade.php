@extends('layout')

@section('content')



	<?php

		
		//Check if the form is fresh one or edit form and populate the data if it is Edit form

		if(isset($contract_info) && !empty($contract_info))
		{
			$contract_id = $contract_info[0]->id;
	      $client = $contract_info[0]->client;
	      $client_manager = $contract_info[0]->client_manager;
	      $supplier = $contract_info[0]->supplier;
	      $supplier_manager = $contract_info[0]->supplier_manager;
	      $supplier_programmer = $contract_info[0]->supplier_programmer;
	      $client_price = $contract_info[0]->client_price;
	      $supplier_price = $contract_info[0]->supplier_price;
	      $fixed_price = $contract_info[0]->fixed_price;
	      $remarks = $contract_info[0]->remarks;
	      $internal_remarks = $contract_info[0]->internal_remarks;
          $start_date = $contract_info[0]->start_date;
          $end_date = $contract_info[0]->end_date;
	  	}
	  	else
	  	{

	  	  $contract_id = null;
	  	  $client =  null;
	      $client_manager = null;
	      $supplier = null;
	      $supplier_manager = null;
	      $supplier_programmer = null;
	      $client_price =  null;
	      $supplier_price = null;
	      $fixed_price = null;
	      $remarks = null;
	      $internal_remarks = null;
	      $start_date = null;
          $end_date =null;
	  	}
	
	?>


	<div class="row-fluid">
		@if(isset($message))
		<p>{{$message}}</p>
		@endif
			
			{{ Form::open(array('url' => 'new_contract', 'id'=>'new_contract_form')) }}
			@if(Route::getCurrentRoute()->getPath()=='new_contract')
			<h2>Add New Contract</h2>
			@else
			<h2>Edit Contract</h2>
			@endif
			<!-- if there are login errors, show them here -->
	
	<!--  -->
	<?php //echo $user_info[0]->password; die(); ?>

<div class="form-group">
   	{{ Form::label('client','Client') }}
   {{ Form::select('client', $clients, $client) }}
</div>



<div class="form-group">
   {{ Form::label('client_manager',"Client's Manager") }}
   {{ Form::select('client_manager', $actm_users, $client_manager) }}
</div>


<div class="form-group">
   	{{Form::label('supplier','Supplier') }}
   {{Form::select('supplier', array("1"=>'Bridge India', "2" =>'Bridge Ukrain'), $supplier) }}
</div>



<div class="form-group">
   {{ Form::label('supplier_manager',"Supplier's Manager") }}
   {{ Form::select('supplier_manager', $actm_users, $supplier_manager) }}
</div>



<!-- <div class="form-group">
   {{ Form::label('supplier_pgmr',"Supplier's Programmer") }}
   {{ Form::select('supplier_pgmr', $dev_users) }}
</div> -->


<div class="form-group">

	{{ Form::label('start_date', 'Start Date') }}

    {{ Form::text('start_date', $start_date, $attributes = array('class'=>'form-control datepicker', 'width'=>'500'), array('placeholder'=>'Start Date')) }}

</div>	



<div class="form-group">
	{{ Form::label('end_date', 'End Date') }}

    {{ Form::text('end_date', $end_date, $attributes = array('class'=>'form-control datepicker', 'width'=>'500'), array('placeholder'=>'End Date')) }}

	</div>	


<div class="form-group">
		
	{{ Form::label('cl_price', "Client's Price") }}

    {{ Form::text('cl_price', $client_price, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'')) }}

</div>

<div class="form-group">
		
	{{ Form::label('sp_price', "Supplier's Price") }}

    {{ Form::text('sp_price', $supplier_price, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'email')) }}
  

</div>

<div class="form-group">
	{{ Form::label('fx_price', "Fixed Price") }}
{{ Form::checkbox('fx_price', 1, $fixed_price, ['class' => 'field']) }}
</div>


<div class="form-group">
		
	{{ Form::label('remarks', 'Remarks') }}

    {{ Form::textarea('remarks', $remarks, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'')) }}
</div>	


<div class="form-group">
		
	{{ Form::label('int_remarks', 'Internal Remarks') }}

    {{ Form::textarea('int_remarks', $internal_remarks, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'')) }}

</div>	


@if(!empty($contract_info))

{{ Form::hidden('route', 'edit_contracts') }}
{{ Form::hidden('contract_id',$contract_id) }}
@else

{{ Form::hidden('route', 'new_contracts') }}

@endif

<div class="form-group">	

	<?php echo Form::submit('Save', array('class'=>'btn btn-lg btn-primary')) ; ?>

</div>



{{ Form::close() }}	
		
	
<script>
// Client side form validation starts here

 $(document).ready(function(){
 $("#new_contract_form").validate({
   rules:  {
   			'client': {required:true}, 
   			'client_manager':{required:true}, 
			'supplier':{required:true},
			'supplier_manager':{required:true},
			'supplier_pgmr':{required:true, number:true},
			'start_date':{ required:true, date:true},
			'end_date':{ required:true, date:true},
			
			'cl_price': {required:true,},
			'sp_price': {required:true},
			'fx_price': {required:true},
			'remarks': {required:true},
			'int_remarks':{required:true}
			},

   
});
 });

/****/

// Client side form validation ends here 

/***

PMT fill ups

Updates as well

Completed the PM user section and started with contracts section. New contracts and list contracts are done 

Done contracts info and edit contracts section

***/
</script>


@stop






