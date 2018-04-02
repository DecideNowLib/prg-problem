@extends('layout')
@section('content')

	<h1>Start page</h1>
	<h3>Select a test</h3>
	<a href="{{ url('/prg-problem/classic-flow') }}">Increment counter value using <strong>classic</strong> flow</a>
	<br>
	<a href="{{ url('/prg-problem/prg-flow') }}">Increment counter value using <strong>post-redirect-get</strong> flow</a>
	
@endsection