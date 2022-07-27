@extends('layouts.home')

@section('login-content')
	<style type="text/css">
		@if($login === 0) 
			#sign-up-container {display: block }
			.register-errors {display: block}
		@else
			#sign-in-container {display: block }
			.login-errors {display: block}
		@endif
	</style>

	<div id="sign-up-container">
		<div>
			<h4>Become a member <small style="color: white;">or</small><small class="hidden-link" style="color: white; white-space: nowrap"><a id="register-button" href"#">Log in</a></small></h4>
		</div>
		<a href="#">
			<div class="input-group input-group-lg">
				<span class="input-group-addon facebook-color"><i class="fa fa-facebook fa-fw"></i></span>
				<span class="form-control facebook-color align-left">Sign up with facebook</span>
			</div>
		</a>
		<div class="divider divider-or"></div>
		{{ Form::open(array('route' => 'register')) }}
    		<div class="form-inline">
		    	{{ Form::text('firstName', '', array(
		    		'class' => 'form-control form-left', 
		    		'placeholder' => 'First name', 
		    		'autocomplete' => 'off',
		    		'autofocus' => '',
		    		/*'oninvalid' => 'setCustomValidity('.Lang::get('speaker.error_required').')',*/
		    		'required' => '')) }}
		    	{{ Form::text('lastName', '', array(
		    		'class' => 'form-control form-right', 
		    		'placeholder' => 'Last name', 
		    		'autocomplete' => 'off',
		    		/*'oninvalid' => 'setCustomValidity('.Lang::get('speaker.error_required').')',*/
		    		'required' => '')) }}
			</div>	
			<div style="padding-right: 10px;clear: both;">
		    	{{ Form::email('email', '', array(
		    		'class' => 'form-control', 
		    		'placeholder' => 'Email', 
		    		/*'oninvalid' => 'setCustomValidity('.Lang::get('speaker.error_email').')',*/
		    		'autocomplete' => 'off')) }}
		    	{{ Form::password('password', array(
		    		'class' => 'form-control', 
		    		'placeholder' => 'Password', 
		    		'autocomplete' => 'off',
		    		/*'oninvalid' => 'setCustomValidity('.Lang::get('speaker.error_required').')',*/
		    		'required' => '')) }}
			</div>
			<div class="button-container">
				{{ Form::submit('Register me', array('class' => 'btn btn-danger')) }}	
			</div>
			
		{{ Form::close() }}

		@if($errors->has())
			<ul class="errors-container register-errors">
				@foreach ($errors->all() as $message) 
					<li>{{ $message }}</li>
				@endforeach
			</ul>
		@endif

	</div>
	<div id="sign-in-container">
		<div>
			<h4>Sign in with your account <small style="color: white;">or</small><small class="hidden-link" style="color: white; white-space: nowrap"><a id="login-button" href"#">Register</a></small></h4>
		</div>
		<div class="input-group input-group-lg">
			<span class="input-group-addon facebook-color"><i class="fa fa-facebook fa-fw"></i></span>
			<span class="form-control facebook-color align-left">Sign in with facebook</span>
		</div>
		<div class="divider divider-or"></div>
		{{ Form::open(array('route' => 'home')) }}
			<div style="padding-right: 10px;">
		    	{{ Form::email('email', '', array(
		    		'class' => 'form-control', 
		    		'placeholder' => 'Email',
		    		'autofocus' => '',
		    		/*'oninvalid' => 'setCustomValidity('.Lang::get('speaker.error_email').')',*/
		    		'required' => '')) }}
		    	{{ Form::password('password', array(
		    		'class' => 'form-control', 
		    		'placeholder' => 'Password',
		    		/*'oninvalid' => 'setCustomValidity('.Lang::get('speaker.error_required').')',*/
		    		'required' => '')) }}
			</div>
			<div class="button-container">
    			{{ Form::submit('Sign in', array('class' => 'btn btn-danger')) }}
			</div>

		{{ Form::close() }}

			
		@if($errors->has())
			<ul class="errors-container login-errors">
				@foreach ($errors->all() as $message) 
					<li>{{ $message }}</li>
				@endforeach
			</ul>
		@endif

	</div>

@stop

@section('javascript-content')

	/*Add placeholder support to IE9 and earlier versions*/
  	$('input').placeholder();

@stop