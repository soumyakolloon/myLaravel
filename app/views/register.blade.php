@extends('layout')

@section('content')
	<div class="row-fluid">
		@if(isset($message))
		<p>{{$message}}</p>
		@endif
			
			{{ Form::open(array('url' => 'register')) }}
			<h2>Add New User</h2>
			<!-- if there are login errors, show them here -->
	
	<div class="form-group">
		
    {{ $errors->first('email') }}
    @if(empty($user_info))
    {{ $errors->first('password') }}
    @endif
     {{ $errors->first('name') }}
     {{ $errors->first('empcode') }}
	</div>
	
	<?php //echo $user_info[0]->password; die(); ?>



	@if(isset($user_info) && !empty($user_info))

	<div class="form-group">
	<?php $name = $user_info[0]->first_name." ". $user_info[0]->last_name; ?>
	{{ Form::label('Name', 'Your Name') }}
    {{ Form::text('name', $name, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'Your name')) }}
	</div>	
		
	<div class="form-group">
		
    {{ Form::label('Employee Code', 'Employee Code') }}
    {{ Form::text('empcode', $user_info[0]->emp_code, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder' => 'Employee Code')) }}
	</div>

	<div class="form-group">
		
    {{ Form::label('email', 'Email Address') }}
    {{ Form::text('email', $user_info[0]->email, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder' => 'awesome@awesome.com')) }}
	</div>
	
	<div class="form-group">	
		{{ Form::hidden('user_id',$user_info[0]->id , array('id' => 'user_id')) }}
	<?php echo Form::submit('Edit User', array('class'=>'btn btn-lg btn-primary')) ; ?>
	</div>
	@else

		<div class="form-group">
		
	{{ Form::label('Name', 'Your Name') }}
    {{ Form::text('name', Input::old('name'), $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'Your name')) }}
	</div>	
		
	<div class="form-group">
		
    {{ Form::label('Employee Code', 'Employee Code') }}
    {{ Form::text('empcode', Input::old('empcode'), $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder' => 'Employee Code')) }}
	</div>

	<div class="form-group">
		
    {{ Form::label('email', 'Email Address') }}
    {{ Form::text('email', Input::old('email'), $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder' => 'awesome@awesome.com')) }}
	</div>
	
	<div class="form-group">
		
	{{ Form::label('password', 'Password') }}
    {{ Form::password('password', array('class'=>'form-control')) }}
		</div>	
	<div class="form-group">	
	<?php echo Form::submit('Add User', array('class'=>'btn btn-lg btn-primary')) ; ?>
</div>
	@endif	




		
		
			{{ Form::close() }}	
		
	
@stop






