@extends('layouts.home')

@section('login-content')

	<div>
		<h2>Welcome!</h2>
		<p><a href="{{ URL::to('logout') }}">Logout</a></p>
	</div>

@stop