@extends('layout')

@section('content')
	<div class="row-fluid">
		
			
			{{ Form::open(array('url' => 'login')) }}
			<h1>Login</h1>
			<!-- if there are login errors, show them here -->
	<p>
    {{ $errors->first('email') }}
    {{ $errors->first('password') }}
    
    @if(isset($msg) && $msg!='')
    {{$msg}}
    @endif
    
	</p>
			<div class="form-group">
    {{ Form::label('email', 'Email Address') }}
   
    <?php echo Form::email('email',$value=null, $attributes = array('class'=>'form-control', 'width'=>'500')); ?>
    
	</div>
	<div class="form-group">
		{{ Form::label('password', 'Password') }}
       <?php echo Form::password('password',array('class'=>'form-control')); ?>
    
		</div>	
			
		<div class="form-group">
			<?php echo Form::submit('Login', array('class'=>'btn btn-lg btn-primary')) ; ?>
			{{ Form::close() }}	
		
	</div>
@stop





