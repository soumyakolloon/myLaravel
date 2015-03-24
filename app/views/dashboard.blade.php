@extends('layout')

@section('content')

@if (!Auth::guest()) 

<h2>Dashboard</h2>

@endif
	
@stop
