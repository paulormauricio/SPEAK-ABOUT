@extends('layouts.admin')

@section('title')
    {{ Lang::get('admin.companies') }}
@stop


@section('top-action-buttons-content')
    <a href=" {{ route('admin.companies.create') }} "><i class="fa fa-plus fa-fw"></i>{{ Lang::get('admin.createCompany') }}</a>
@stop


@section('table-content')

<div class="table-responsive">
    <table class="table table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ Lang::get('admin.name') }}</th>
                <th>{{ Lang::get('admin.description') }}</th>
                <th>{{ Lang::get('admin.website') }}</th>
                <th>{{ Lang::get('admin.contact') }}</th>
                <th class="no-sort"></th>
                <th class="no-sort"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
                <tr class="odd gradeX">
                    <td>{{ $company->id }}</td>
                    <td><a  href="{{ URL::to('admin/companies/' . $company->id) }}">{{ $company->name }}</a></td>
                    <td> @if (strlen($company->description) === 0) - @else {{$company->description}} @endif </td>
                    <td> 
                        @if (strlen($company->website) === 0) - 
                        @else <a href="{{$company->website}}">{{$company->website}}</a> 
                        @endif 
                    </td>
                    <td> @if (strlen($company->contact) === 0) - @else {{$company->contact}} @endif </td>
                    <td>
                        <a href=" {{ URL::to('admin/companies/' . $company->id . '/edit') }} " class="label label-warning"><i class="fa fa-pencil fa-fw"></i> {{ Lang::get('admin.edit') }}</a> 
                    </td>
                    <td> 

                        {{ Form::open(array('id' => 'deleteForm'.$company->name, 'url' => 'admin/companies/' . $company->id)) }}
                            {{ Form::hidden('_method', 'DELETE') }}

                            {{ Form::submit('Delete', array('class' => 'label label-danger')) }}

                            <a href="#" onclick="{{'submitForm'.$company->name}}()" class="label label-danger"><i class="fa fa-times fa-fw"></i> {{ Lang::get('admin.delete') }}</a> 
                        {{ Form::close() }} 
                        <script>
                            function {{'submitForm'.$company->name}}() {
                                if (confirm("{{ Lang::get('admin.confirmDelete', array('name' => $company->name)) }}" )) {
                                    document.getElementById("{{'deleteForm'.$company->name}}").submit();
                                 }
                              return false;
                            }
                        </script>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop