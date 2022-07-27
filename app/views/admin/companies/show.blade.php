@extends('layouts.admin')

@section('title')
    
    {{ Lang::get('admin.detail') . "'" . $company->name . "'"}}

@stop


@section('table-content')

	<!-- if there are creation errors, they will show here -->
	@if($errors->has())

		@include('layouts.feedbackMessage', array('errors' => $errors->all()))

	@endif

	<table class="showRecord">
		<tbody>
			<tr>
				<td>{{ Lang::get('admin.name') }}</td>
				<td>{{ $company->name }}</td>
			</tr>
			<tr>
				<td>{{ Lang::get('admin.description') }}</td>
				<td>{{ $company->description }}</td>
			</tr>
			<tr>
				<td>{{ Lang::get('admin.website') }}</td>
				<td><a href="{{ $company->website }}">{{ $company->website }}</a></td>
			</tr>
			<tr>
				<td>{{ Lang::get('admin.contact') }}</td>
				<td>{{ $company->contact }}</td>
			</tr>
		</tbody>
	</table>
	<div class="buttons-container">
		<a type="button" href="{{URL::to('admin/companies/' . $company->id . '/edit')}}" class="btn btn-primary">
			{{Lang::get('admin.edit') }}
		</a>
		<a type="button" href="{{URL::to('admin/companies')}}" class="btn btn-default">{{Lang::get('admin.return') }}</a>
	</div>

@stop 

