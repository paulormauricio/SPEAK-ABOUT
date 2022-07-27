@extends('layouts.admin')

@section('title')
    
    {{ Lang::get('admin.createUser') }}
@stop


@section('table-content')

	<!-- if there are creation errors, they will show here -->
	@if($errors->has())

		@include('layouts.feedbackMessage', array('errors' => $errors->all()))

	@endif


	{{ Form::model($user, array('route' => array('admin.users.store', $user->id))) }}

		<table class="editRecord">
			<tbody>
				<tr>
					<td>{{ Form::label('firstName', Lang::get('admin.firstName')) }}</td>
					<td>{{ Form::text('firstName') }}</td>
				</tr>
				<tr>
					<td>{{ Form::label('lastName', Lang::get('admin.lastName')) }}</td>
					<td>{{ Form::text('lastName') }}</td>
				</tr>
				<tr>
					<td>{{ Form::label('email', Lang::get('admin.email')) }}</td>
					<td>{{ Form::text('email') }}</td>
				</tr>
				<tr>
					<td>{{ Form::label('birthday', Lang::get('admin.birthday')) }}</td>
					<td>{{ Form::text('birthday') }}</td>
				</tr>
				<tr>
					<td>{{ Form::label('isAdmin', Lang::get('admin.administrator')) }}</td>
					<td>{{ Form::checkbox('isAdmin') }}</td>
				</tr>
				<tr>
					<td>{{ Form::label('isActive', Lang::get('admin.active')) }}</td>
					<td>{{ Form::checkbox('isActive') }}</td>
				</tr>
			</tbody>
		</table>
		<div class="buttons-container">
			{{ Form::submit(Lang::get('admin.save'), array('class' => 'btn btn-primary')) }}
			<a type="button" href="{{URL::to('admin/users')}}" class="btn btn-default">{{Lang::get('admin.return') }}</a>
		</div>
	{{ Form::close() }}

@stop 


@section('javascript-content')

  	<!-- $("#birthday").dateinput(); -->
  	$('#birthday').datetimepicker( {
  		format:'Y-m-d',
  		timepicker:false,
  		maxDate:'{{ date('Y-m-d')}}'
  	});

@stop