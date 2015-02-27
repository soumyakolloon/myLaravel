@extends('layout')

@section('content')
	<div class="row-fluid">
		@if(isset($message))
		<p>{{$message}}</p>
		@endif
			
			{{ Form::open(array('url' => 'register')) }}
			<h1>Registration</h1>
			<!-- if there are login errors, show them here -->
	<p>
    {{ $errors->first('email') }}
    {{ $errors->first('password') }}
     {{ $errors->first('name') }}
	</p>
	<p>
	{{ Form::label('Name', 'Your Name') }}
    {{ Form::text('name', Input::old('name'), array('placeholder'=>'Your name')) }}
		</p>	
		
	<p>
    {{ Form::label('email', 'Email Address') }}
    {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) }}
	</p>
	<p>
	{{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
		</p>	
			
		<p>{{ Form::submit('Register!') }}</p>
			{{ Form::close() }}	
		
	</div>
@stop






