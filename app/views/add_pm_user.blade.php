@extends('layout')

@section('content')

	<div class="row-fluid">
		@if(isset($message))
		<p>{{$message}}</p>
		@endif
			
			{{ Form::open(array('url' => 'add_pm_user',  'id'=>'add_pm_user_form')) }}
			<h2>Add PM User</h2>
			<!-- if there are login errors, show them here -->
	
	<div class="form-group">
		
    {{ $errors->first('email') }}
    {{ $errors->first('password') }}
    {{ $errors->first('firstname') }}
    {{ $errors->first('lastname') }}
    {{ $errors->first('empcode') }}
    {{ $errors->first('description') }}
    {{ $errors->first('birth_day') }}
    {{ $errors->first('gender') }}
    </div>
	
	<div class="form-group">
		
	{{ Form::label('first_name', 'First Name') }}
    {{ Form::text('first_name', Input::old('firstName'), $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'Your First Name')) }}
	</div>	
		
	<div class="form-group">
		
	{{ Form::label('last_name', 'Last Name') }}
    {{ Form::text('last_name', Input::old('lastName'), $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'Your Last Name')) }}
	</div>	

	<div class="form-group">
		
	{{ Form::label('email', 'Email') }}
    {{ Form::text('email', Input::old('email'), $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'email')) }}
	</div>

	<div class="form-group">
		
	{{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', Input::old('description'), $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'description')) }}

	</div>	


	<div class="form-group">
	{{ Form::label('birth_day', 'Birth day') }}
    {{ Form::text('birth_day', Input::old('birth_day'), $attributes = array('class'=>'form-control datepicker', 'width'=>'500'), array('placeholder'=>'birth_day')) }}
	</div>	


	<div class="form-group">
	{{ Form::label('gender','Gender') }}
		
		<div>
          
          {{ Form::radio('gender1[]','Not Determined','',array('id'=>'not_determined')) }}
          {{ Form::label('not_determined','Not determined') }}

          {{ Form::radio('gender1[]','Male','',array('id'=>'male')) }}
          {{ Form::label('male','Male') }}
          
          {{ Form::radio('gender1[]','Female','',array('id'=>'female')) }}
          {{ Form::label('female','Female') }}
      </div>

</div>



	<div class="form-group">
		
    {{ Form::label('Employee Code', 'Employee Code') }}
    {{ Form::text('empcode', Input::old('empcode'), $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder' => 'Employee Code')) }}
	</div>

	<div class="form-group">
		
    {{ Form::label('phone', 'Phone') }}
    {{ Form::text('phone', Input::old('phone'), $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder' => 'Phone')) }}
	
	</div>

	<div class="form-group">
		
    {{ Form::label('job_title', 'Job Title') }}
    {{ Form::text('job_title', Input::old('job_title'), $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder' => 'Job Title')) }}
	</div>
	
	<div class="form-group">
		
	{{ Form::label('password', 'Password') }}
    {{ Form::password('password', array('class'=>'form-control')) }}
	
	</div>


	<div class="form-group">
	{{ Form::label('confpassword', 'Confirm Password') }}
    {{ Form::password('confpassword', array('class'=>'form-control')) }}
	</div>		
	
	<div class="form-group">

		{{ Form::hidden('role_id','account_manager' , array('id' => 'role_id')) }}
	<?php 
	echo Form::submit('Add', array('class'=>'btn btn-lg btn-primary')) ; 
	?>
	{{ Form::close() }}	
	
	</div>
@stop


<script>
// Client side form validation starts here
// $(document).ready(function(){
// $("#add_pm_user_form").validate(function(){
  
 
//   rules: {
//     // simple rule, converted to {required:true}
//     firstname: "required",
//     // compound rule
//     // email: {
//     //  required: true,
//     //  email: true
//     // },
//   },

//   // submitHandler: function(form) {
//   //   // do other things for a valid form
//   //   form.submit();
//   // }
// });
// });
// Client side form validation ends here 
</script>



