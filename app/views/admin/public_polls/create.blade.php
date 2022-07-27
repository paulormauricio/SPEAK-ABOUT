@extends('layouts.admin')

@section('title')
    
    {{ Lang::get('admin.createPublicPoll') }}
@stop


@section('table-content')

	<!-- if there are creation errors, they will show here -->
	@if($errors->has())

		@include('layouts.feedbackMessage', array('errors' => $errors->all()))

	@endif


	{{ Form::model($public_poll, array('route' => array('admin.public_polls.store'))) }}

		<table class="editRecord">
			<tbody>
				<tr>
					<td>{{ Form::label('questionName', Lang::get('admin.questionName')) }}</td>
					<td>{{ Form::text('questionName') }}</td>
				</tr>
				<tr>
					<td>{{ Form::label('lastResponseDate', Lang::get('admin.lastResponseDate')) }}</td>
					<td>{{ Form::text('lastResponseDate') }}</td>
				</tr>
				<tr>
					<td>{{ Form::label('isActive', Lang::get('admin.active')) }}</td>
					<td>{{ Form::checkbox('isActive') }}</td>
				</tr>
			</tbody>
		</table>
		<div class="buttons-container">
			{{ Form::submit(Lang::get('admin.save'), array('class' => 'btn btn-primary')) }}
			<a type="button" href="{{URL::to('admin/public_polls')}}" class="btn btn-default">{{Lang::get('admin.return') }}</a>
		</div>
	{{ Form::close() }}

@stop 


@section('javascript-content')

  	$('#lastResponseDate').datetimepicker( {
  		minDate:'{{ date('Y-m-d')}}'
  	});

@stop