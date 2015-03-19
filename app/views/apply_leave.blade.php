@extends('layout')

@section('content')
	<div class="row-fluid">
		
			
			{{ Form::open(array('url' => 'login')) }}
			<h1>Apply New Leave</h1>
			<!-- if there are login errors, show them here -->
	<p>
    {{ $errors->first('email') }}
    {{ $errors->first('password') }}
    
    @if(isset($msg) && $msg!='')
    {{$msg}}
    @endif
    
	</p>
   <div class="form-group">
   	{{ Form::label('leave_type','Leave Types') }}
   {{ Form::select('Leave Type', $leave_types) }}
    </div>
<div class="form-group">
	{{ Form::label('leave_nature','Leave Nature') }}
		<div>
          {{ Form::radio('day[]','Full Day','',array('id'=>'fullday')) }}
          {{ Form::label('fullday','Full Day') }}
          
          {{ Form::radio('day[]','Half Day','',array('id'=>'halfday')) }}
          {{ Form::label('halfday','Half Day') }}
      </div>
</div>



<div class="form-group">
	{{ Form::label('leave_session','Leave Session') }}
		<div>
          {{ Form::radio('session[]','First Half','',array('id'=>'first half')) }}
          {{ Form::label('firsthalf','First Half') }}
          
          {{ Form::radio('session[]','Second Half','',array('id'=>'second half')) }}
          {{ Form::label('second half','Second Half') }}
      </div>
</div>



	<div class="form-group">
	{{ Form::label('fromdate','From Date') }}
	  <?php echo Form::text('fromdate',$value=null, $attributes = array('class'=>'form-control datepicker', 'width'=>'500')); ?>
</div>

<div class="form-group">
	{{ Form::label('todate','To Date') }}
	  <?php echo Form::text('todate',$value=null, $attributes = array('class'=>'form-control datepicker', 'width'=>'500')); ?>
</div>
<div class="form-group">
		
    {{ Form::label('Reason_for_Leave', 'Reason For Leave') }}
    {{ Form::textarea('reason_for_Leave', null, $attributes = array('class'=>'form-control', 'width'=>'100')) }}
	</div>

    <div class="form-group">
			<?php echo Form::submit('Add', array('class'=>'btn btn-lg btn-primary')) ; ?>
			{{ Form::close() }}	
				
	</div>
@stop



