@extends('layout')
@section('content')

	<h1>Counter page</h1>
	<h3>{{ ($test_type == 'classic') ? 'classic' : 'post-redirect-get' }} flow</h3>
	<form method="post" action="{{ url(($test_type == 'classic') ? '/prg-problem/classic-flow' : '/prg-problem/prg-flow') }}">
		{{ csrf_field() }}
		<input type="hidden" name="counter_value" value="{{ $counter_value }}">
		<p>Counter value: {{ $counter_value }}</p>
		<input type="submit" value="Increment">
		<p><em><a href="{{ url('/prg-problem/break') }}" target="_blank">Open</a> break page</em></p>
		<p><em><a href="{{ url('/prg-problem') }}">Back</a> to start page</em></p>
	</form>
	
@endsection
