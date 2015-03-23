@extends('layout')

@section('content')
	<div class="row-fluid">
		
			
			{{ Form::open(array('url' => 'apply_leave')) }}
			<h1>Apply New Leave</h1>
			<!-- if there are login errors, show them here -->
	<p>
    {{ $errors->first('reason_for_Leave') }}
  
    
    @if(isset($msg) && $msg!='')
    {{$msg}}
    @endif
    
	</p>
   <div class="form-group">
   	{{ Form::label('leave_type','Leave Types') }}
   {{ Form::select('leave_type', $leave_types) }}
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

	@if(isset($summary) && $summary!='')

	<table border="1">
		<tr>
			<th>Leave Date(s)</th>
			<th>Leave Type</th>
			<th>Number of Days Applied</th>
			<th>Leave Nature</th>
			<th>Leave Session</th>
			<th>Leave Status</th>
			<th>Reason</th>
			<th>Applied Date</th>
			<th>Action</th>
		</tr>

		@foreach($summary as $sm)

		<?php

			//Count the number of days between two dates

			if($sm->fromdate==$sm->todate)
			{
				if($sm->leave_nature=='Full Day')
				{
				$count = '1';
				}
				else if($sm->leave_nature=='Half Day')
				{
				$count = '1/2';
				}
				


			}
			else
				{

					$date1  = strtotime($sm->fromdate);
			    	$date2  = strtotime($sm->todate);
			    	// echo $date1; exit;
			    	$count  =  (int)(($date2-$date1)/86400);      
				}

			// End of Count the number of days between two dates
	    	
	    	?>

		<tr>
			<td><?php echo $sm->fromdate." to ". $sm->todate; ?></td>
			<td><?php echo $sm->type; ?></td>

			<td><?php echo $sm->leave_nature; ?></td>
			<td><?php echo $sm->leave_session; ?></td>
			<td><?php echo $count; ?></td>
			<td><?php echo $sm->leave_status; ?></td>
			
			<td><?php echo $sm->reason; ?></td>
			<td><?php echo date_format(date_create($sm->created_at),"Y/m/d"); ?></td>

			

		</tr>

		@endforeach


	</table>


	@endif

@recentNews







@stop



