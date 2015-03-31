@extends('layout')

@section('content')

<div class="about-section">
   <div class="text-content">
     <div class="span7 offset1">


        @if(isset($msg))
        {{$msg}}
        @endif

        @if(Session::has('success'))
          <div class="alert-box success">
          <h2>{{ Session::get('success') }}</h2>
          </div>
        @endif
        <div class="secure">Upload files</div>
        {{ Form::open(array('url'=>'add_file','method'=>'POST', 'files'=>true)) }}
         <div class="control-group">
          <div class="controls">
          {{ Form::file('image') }}
	  <p class="errors">{{$errors->first('image')}}</p>
    	@if(Session::has('error'))
    	<p class="errors">{{ Session::get('error') }}</p>
    	@endif
        </div>
        </div>
        <div id="success"> </div>
      {{ Form::submit('Submit', array('class'=>'send-btn')) }}
      {{ Form::close() }}
      </div>
   </div>
</div>

<!-- .  -->

@stop
