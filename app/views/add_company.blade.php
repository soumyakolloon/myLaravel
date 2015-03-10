@extends('layout')

@section('content')
	<div class="row-fluid">
		@if(isset($message))
		<p style="color:green;">{{$message}}</p>
		@endif

			@if(isset($emessage))
		<p style="color:red;">{{$emessage}}</p>
		@endif
			
			{{ Form::open(array('url' => 'add_company')) }}

			<h2>Add Company</h2>
			<!-- if there are login errors, show them here -->
	
	
	<div class="form-group" style="color:red;">
	<ul style='list-style:none;'>
	<li>{{ $errors->first('company_name') }}</li>
    <li>{{ $errors->first('description') }}</li>
    <li>{{ $errors->first('country') }}</li>
    <li>{{ $errors->first('city') }}</li>
    <li>{{ $errors->first('address') }}</li>

	</ul>
	</div>
	<!-- Check if it is an edit form or create form -->
	@if(isset($company_info) && !empty($company_info))

	<div class="form-group">
		
	{{ Form::label('Company Name', 'Your Company Name') }}
    {{ Form::text('company_name',$company_info[0]->company_name, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'Your Company Name')) }}
	</div>	
		
	<div class="form-group">
		
    {{ Form::label('Description', 'Description') }}
    {{ Form::textarea('description', $company_info[0]->description, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder' => 'Add description')) }}
	</div>
	

	
	<div class="form-group">
		
    {{ Form::label('Country', 'Country') }}
    {{ Form::text('country', $company_info[0]->country, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder' => 'Country')) }}
	</div>


	<div class="form-group">
		
    {{ Form::label('City', 'City') }}
    {{ Form::text('city', $company_info[0]->city, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder' => 'City')) }}
	</div>


	<div class="form-group">
		
    {{ Form::label('Address', 'Address') }}
    {{ Form::text('address', $company_info[0]->address, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder' => 'Address')) }}
	</div> 
	<div class="form-group">

		{{ Form::hidden('company_id',$company_info[0]->id , array('id' => 'company_id')) }}

		<?php echo Form::submit('Edit', array('class'=>'btn btn-lg btn-primary')) ; ?>
		<?php echo Form::button('Cancel', array('class'=>'btn btn-lg btn-primary')) ; ?>
	
		</div>
	<!-- else it is a request to add new company details  -->
	@else

		<div class="form-group">
		
	{{ Form::label('Company Name', 'Your Company Name') }}
    {{ Form::text('company_name',Input::old('company_name'), $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'Your Company Name')) }}
	</div>	
		
	<div class="form-group">
		
    {{ Form::label('Description', 'Description') }}
    {{ Form::textarea('description', Input::old('description'), $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder' => 'Add description')) }}
	</div>
	

	
	<div class="form-group">
		
    {{ Form::label('Country', 'Country') }}
    {{ Form::text('country', Input::old('country'), $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder' => 'Country')) }}
	</div>


	<div class="form-group">
		
    {{ Form::label('City', 'City') }}
    {{ Form::text('city', Input::old('city'), $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder' => 'City')) }}
	</div>


	<div class="form-group">
		
    {{ Form::label('Address', 'Address') }}
    {{ Form::text('address', Input::old('address'), $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder' => 'Address')) }}
	</div> 

		<div class="form-group">

		<?php echo Form::submit('Add', array('class'=>'btn btn-lg btn-primary')) ; ?>
		<?php echo Form::button('Cancel', array('class'=>'btn btn-lg btn-primary')) ; ?>
	
		</div>

	@endif

		
			{{ Form::close() }}	




		
	</div>
@stop






