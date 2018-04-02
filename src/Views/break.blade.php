@extends('layout')
@section('content')

	@include('break_script')
	<h1>Break page</h1>
	<h3>Increments counter via AJAX every 1 second.</h3>
	<input type="hidden" name="counter_value" value="{{ $counter_value }}">
	<p>Counter value: <span id="counter_value_text">{{ $counter_value }}</span></p>
	
@endsection
