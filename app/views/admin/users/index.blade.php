@extends('layouts.admin')

@section('title')
    {{ Lang::get('admin.users') }}
@stop


@section('top-action-buttons-content')
    <a href=" {{ route('admin.users.create') }} "><i class="fa fa-plus fa-fw"></i>{{ Lang::get('admin.createUser') }}</a>
@stop

@section('table-content')

<div class="table-responsive">
    <table class="table table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ Lang::get('admin.name') }}</th>
                <th>{{ Lang::get('admin.email') }}</th>
                <th class="centered">{{ Lang::get('admin.birthday') }}</th>
                <th class="centered">{{ Lang::get('admin.verified') }}</th>
                <th class="centered">{{ Lang::get('admin.administrator') }}</th>
                <th class="centered">{{ Lang::get('admin.active') }}</th>
                <th class="no-sort"></th>
                <th class="no-sort"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr class="odd gradeX">
                    <td>{{ $user->id }}</td>
                    <td><a href="{{URL::to('admin/users/' . $user->id)}}">{{$user->firstName." ".$user->lastName}}<i class="fa fa-search-plus fa-fw"></i></a></td>
                    <td>{{ $user->email }}</td>
                    <td class="centered"> @if (strlen($user->birthday) === 0) - @else {{$user->birthday}} @endif </td>
                    <td class="centered">
                        @if ($user->isverified == 1) <i class="fa fa-check"/>
                        @else <i class="fa fa-times"/>
                        @endif
                    </td>
                    <td class="centered">
                        @if ($user->isAdmin == 1) <i class="fa fa-check"/>
                        @else <i class="fa fa-times"/>
                        @endif
                    </td>
                    <td class="centered">
                        @if ($user->isActive == 1) <i class="fa fa-check"/>
                        @else <i class="fa fa-times"/>
                        @endif
                    </td>
                    <td>
                        <a href=" {{ URL::to('admin/users/' . $user->id . '/edit') }}" class="label label-warning"><i class="fa fa-pencil fa-fw"></i> {{ Lang::get('admin.edit') }}</a> 
                    </td>
                    <td> 
                        {{ Form::open(array('id' => 'deleteForm'.$user->id, 'url' => 'admin/users/' . $user->id)) }}
                            {{ Form::hidden('_method', 'DELETE') }}

                            {{ Form::submit('Delete', array('class' => 'label label-danger')) }}

                            <a href="#" onclick="{{'submitForm'.$user->id}}()" class="label label-danger"><i class="fa fa-times fa-fw"></i> {{ Lang::get('admin.delete') }}</a> 
                        {{ Form::close() }} 
                        <script>
                            function {{'submitForm'.$user->id}}() {
                                if (confirm("{{ Lang::get('admin.confirmDelete', array('name' => $user->name)) }}" )) {
                                    document.getElementById("{{'deleteForm'.$user->id}}").submit();
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