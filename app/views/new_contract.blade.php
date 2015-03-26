@extends('layout')

@section('content')
	<div class="row-fluid">
		@if(isset($message))
		<p>{{$message}}</p>
		@endif
			
			{{ Form::open(array('url' => 'new_contract', 'id'=>'new_contract_form')) }}
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


<div class="form-group">
	{{ Form::label('start_date', 'Start Date') }}

    {{ Form::text('start_date', null, $attributes = array('class'=>'form-control datepicker', 'width'=>'500'), array('placeholder'=>'Start Date')) }}

	</div>	



<div class="form-group">
	{{ Form::label('end_date', 'End Date') }}

    {{ Form::text('end_date', null, $attributes = array('class'=>'form-control datepicker', 'width'=>'500'), array('placeholder'=>'End Date')) }}

	</div>	


<div class="form-group">
		
	{{ Form::label('cl_price', "Client's Price") }}

    {{ Form::text('cl_price', null, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'')) }}

</div>

<div class="form-group">
		
	{{ Form::label('sp_price', "Supplier's Price") }}

    {{ Form::text('sp_price', null, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'email')) }}
  

</div>

<div class="form-group">
	{{ Form::label('fx_price', "Fixed Price") }}
{{ Form::checkbox('fx_price', 1, null, ['class' => 'field']) }}
</div>


<div class="form-group">
		
	{{ Form::label('remarks', 'Remarks') }}

    {{ Form::textarea('remarks', null, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'')) }}
</div>	


<div class="form-group">
		
	{{ Form::label('int_remarks', 'Internal Remarks') }}

    {{ Form::textarea('int_remarks', null, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'')) }}

</div>	




<div class="form-group">	
	<?php echo Form::submit('Save', array('class'=>'btn btn-lg btn-primary')) ; ?>
</div>



{{ Form::close() }}	
		
	
<script>
// Client side form validation starts here

 // $(document).ready(function(){
 // $("#new_contract_form").validate({
 //   rules:  {
 //   			'client': {required:true}, 
 //   			'client_manager':{required:true}, 
	// 		'supplier':{required:true},
	// 		'supplier_manager':{required:true},
	// 		'supplier_pgmr':{required:true, number:true},
	// 		'start_date':{ required:true, date:true},
	// 		'end_date':{ required:true, date:true},
			
	// 		'cl_price': {required:true,},
	// 		'sp_price': {required:true},
	// 		'fx_price': {required:true},
	// 		'remarks': {required:true},
	// 		'int_remarks':{required:true}
	// 		},

   // submitHandler: function(form) {
   // do other things for a valid form
   //   form.submit();
   // }
});
 });

 /****/
// Client side form validation ends here 
</script>













@stop






