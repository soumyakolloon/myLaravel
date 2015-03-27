@extends('layout')

@section('content')

	<div class="row-fluid">
		@if(isset($message))
		<p>{{$message}}</p>
		@endif

			{{ Form::open(array('url' => 'add_pm_user',  'id'=>'add_pm_user_form')) }}
			@if(Route::getCurrentRoute()->getPath()=='add_pm_user')
			<h2>Add PM User</h2>
			@else
			<h2>Add New User</h2>
			@endif

		
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


	<?php 
	
		//Check if the form is frsh one or edit form and populate the if it is Edit form

		if(isset($user_info) && !empty($user_info))
		{
	      $first_name = $user_info[0]->first_name;
	      $last_name = $user_info[0]->last_name;
	      $email = $user_info[0]->email;
	      $description = $user_info[0]->description;
	      $emp_code = $user_info[0]->emp_code;
	      $gender = $user_info[0]->gender;
	      $phone = $user_info[0]->phone;
	      $job_title = $user_info[0]->job_title;
	      $birth_date = $user_info[0]->birth_date;
	      $password = $user_info[0]->password;
          $user_edit_id = $user_info[0]->id;
          $page_key = $user_info[0]->page_key;
	  	}
	  	else
	  	{

	  	  $first_name =  null;
	      $last_name = null;
	      $email = null;
	      $description = null;
	      $emp_code = null;
	      $gender =  null;
	      $phone = null;
	      $job_title = null;
	      $birth_date = null;
	      $password = null;
	      $user_edit_id = null;
          $page_key =null;
	  	}
	
	?>

	<div class="form-group">
		
	{{ Form::label('first_name', 'First Name') }}
    {{ Form::text('first_name', $first_name, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'Your First Name')) }}

			
	<div class="form-group">
	{{ Form::label('last_name', 'Last Name') }}

    {{ Form::text('last_name', $last_name, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'Your Last Name')) }}
 	</div>	

	<div class="form-group">
		
	{{ Form::label('email', 'Email') }}

    {{ Form::text('email', $email, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'email')) }}

    

	</div>

	<div class="form-group">
		
	{{ Form::label('description', 'Description') }}

    {{ Form::textarea('description', $description, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder'=>'description')) }}

	</div>	


	<div class="form-group">
	{{ Form::label('birth_day', 'Birth day') }}

    {{ Form::text('birth_day', $birth_date, $attributes = array('class'=>'form-control datepicker', 'width'=>'500'), array('placeholder'=>'birth_day')) }}

	</div>	


	<div class="form-group">
	{{ Form::label('gender','Gender') }}
		
		<div>
          
          {{ Form::radio('gender1[]','Not Determined','',array('name'=>'g')) }}
          {{ Form::label('not_determined','Not determined') }}

          {{ Form::radio('gender1[]','Male','',array('name'=>'g')) }}
          {{ Form::label('male','Male') }}
          
          {{ Form::radio('gender1[]','Female','',array('name'=>'g')) }}
          {{ Form::label('female','Female') }}
 
      </div>

</div>



	<div class="form-group">
		
    {{ Form::label('Employee Code', 'Employee Code') }}

    {{ Form::text('empcode', $emp_code, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder' => 'Employee Code')) }}

	</div>

	<div class="form-group">
		
    {{ Form::label('phone', 'Phone') }}

    {{ Form::text('phone', $phone, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder' => 'Phone')) }}

	
	</div>

	<div class="form-group">
		
    {{ Form::label('job_title', 'Job Title') }}

    {{ Form::text('job_title', $job_title, $attributes = array('class'=>'form-control', 'width'=>'500'), array('placeholder' => 'Job Title')) }}
	</div>
	
	@if($password==null)

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
	@endif

	
	<div class="form-group">


		@if(Route::getCurrentRoute()->getPath()=='add_pm_user')
		{{ Form::hidden('role_id','account_manager' , array('id' => 'role_id')) }}
		@else
		{{ Form::hidden('role_id','employee' , array('id' => 'role_id')) }}
		@endif
		
		{{ Form::hidden('route', Route::getCurrentRoute()->getPath()) }}

		<?php if(Route::getCurrentRoute()->getPath()=='add_pm_user' && $page_key==null) {
			$page_key = 'list_pm_users';
		} else if(Route::getCurrentRoute()->getPath()=='register' && $page_key==null)
		{
			$page_key = 'list_users';
		} ?>

		{{ Form::hidden('page_key', $page_key) }}

		{{ Form::hidden('user_edit_id',$user_edit_id , array('id' => 'user_edit_id')) }}

	<?php 
	
		echo Form::submit('Add', array('class'=>'btn btn-lg btn-primary')) ; 
	
	?>
	
	{{ Form::close() }}	
	
	</div>
	
	</div>		
	
	<div class="form-group">

		{{ Form::hidden('role_id','account_manager' , array('id' => 'role_id')) }}
	<?php 
	echo Form::submit('Add', array('class'=>'btn btn-lg btn-primary')) ; 
	?>
	{{ Form::close() }}	
	
	</div>




<script>
// Client side form validation starts here

 $(document).ready(function(){
 $("#add_pm_user_form").validate({
   rules:  {
   			'first_name': {required:true}, 
   			'last_name':{required:true}, 
			'description':{required:true},
			'g':{required:true},
			'empcode':{required:true, number:true},
			'phone':{ required:true, number:true},
			'job_title':{ required:true},
			'password':{ required:true},
			'confpassword':{ required:true,  equalTo: "#password"},
			 'email':{
				      required: true,
				      email: true
				    }, 
			 'birth_day': {required:true, date:true}
			},

   // submitHandler: function(form) {
   // do other things for a valid form
   //   form.submit();
   // }
});
 });
// Client side form validation ends here 
</script>
@stop







