@extends('layout')

@section('content')
	<h2>Dashboard</h2>
	
	<ul>
		<li><a a href="{{URL::to('')}}">Home</a></li>
		
	@if (Auth::guest()) 
	<li><a href="{{URL::to('register')}}">Create User</a></li>
	<li><a href="{{URL::to('login')}}">Login</a></li>
	@else
	<p>{{Auth::user()->email}}</p>
	<li><a href="{{ URL::to('logout') }}">Logout</a></li>
	
	
	
	@endif
		
	</ul>
	
@stop
