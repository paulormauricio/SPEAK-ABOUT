@extends('layouts.admin')

@section('title')
    
    {{ Lang::get('admin.showPublicPoll') }}
@stop


@section('table-content')

	<!-- if there are creation errors, they will show here -->
	@if($errors->has())

		@include('layouts.feedbackMessage', array('errors' => $errors->all()))

	@endif


	<table class="showRecord">
		<tbody>
			<tr>
				<td>{{ Lang::get('admin.questionName') }}</td>
				<td>{{ $public_poll->questionName }}</td>
			</tr>
			<tr>
				<td>{{ Lang::get('admin.lastResponseDate') }}</td>
				<td>{{ $public_poll->lastResponseDate }}</td>
			</tr>
			<tr>
				<td>{{ Lang::get('admin.active') }}</td>
				<td>
					@if ($public_poll->isActive == 1) <i class="fa fa-check"/>
                    @else <i class="fa fa-times"/>
                    @endif
                </td>
			</tr>
		</tbody>
	</table>
	<div class="buttons-container">
		<a type="button" href=" {{ URL::to('admin/public_polls/' . $public_poll->id . '/edit') }}" class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i> {{ Lang::get('admin.edit') }}</a> 
		<a type="button" href="{{URL::to('admin/public_polls')}}" class="btn btn-default">{{Lang::get('admin.return') }}</a>
	</div>

	@include('admin.public_poll_options.index', array($public_poll, $public_poll_options))

@stop 


@section('javascript-content')


@stop