@extends('layouts.admin')

@section('title')
    
    {{ Lang::get('admin.createCompany') }}
@stop


@section('table-content')

	<!-- if there are creation errors, they will show here -->
	@if($errors->has())

		@include('layouts.feedbackMessage', array('errors' => $errors->all()))

	@endif

	{{ Form::model($company, array('route' => array('admin.companies.store', $company->id))) }}

		<table class="editRecord">
			<tbody>
				<tr>
					<td>{{ Form::label('name', Lang::get('admin.name')) }}</td>
					<td>{{ Form::text('name') }}</td>
				</tr>
				<tr>
					<td>{{ Form::label('description', Lang::get('admin.description')) }}</td>
					<td>{{ Form::textarea('description') }}</td>
				</tr>
				<tr>
					<td>{{ Form::label('website', Lang::get('admin.website')) }}</td>
					<td>{{ Form::text('website') }}</td>
				</tr>
				<tr>
					<td>{{ Form::label('contact', Lang::get('admin.contact')) }}</td>
					<td>{{ Form::text('contact') }}</td>
				</tr>
			</tbody>
		</table>
		<div class="buttons-container">
			{{ Form::submit(Lang::get('admin.save'), array('class' => 'btn btn-primary')) }}
			<a type="button" href="{{URL::to('admin/companies')}}" class="btn btn-default">{{Lang::get('admin.return') }}</a>
		</div>
	{{ Form::close() }}

@stop 

