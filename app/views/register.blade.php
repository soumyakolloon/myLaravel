@extends('layout')

@section('content')
	<div class="row-fluid">
		@if(isset($message))
		<p>{{$message}}</p>
		@endif
			
			{{ Form::open(array('url' => 'register')) }}
			<h2>Registration</h2>
			<!-- if there are login errors, show them here -->
	
	<div class="form-group">
		
    {{ $errors->first('email') }}
    {{ $errors->first('password') }}
     {{ $errors->first('name') }}
	</div>
	
	<div class="form-group">
		
	{{ Form::label('Name', 'Your Name') }}
    {{ Form::text('name', Input::old('name'), $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'Your name')) }}
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
		<?php echo Form::submit('Login', array('class'=>'btn btn-lg btn-primary')) ; ?>
			{{ Form::close() }}	
		
	</div>
@stop






