@extends('layout')

@section('content')


@if (!Auth::guest()) 

<!-- List all the companies added by logged in user in a tabular format -->


<h6 style="color:#3366FF">
	Company 'Bridge India' info
</h6>

<div class="company_info">

<div>Company Name: Bridge India </div>
<div>Company Name: India</div>
<div>Company Name: Cochin</div>
<div>Company Name: TR 40/653 Krishnapriya, Automobile Road, Mamangalam, Cochin – 25</div>

</div>

@endif
	
@stop