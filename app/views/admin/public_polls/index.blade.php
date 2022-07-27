@extends('layouts.admin')

@section('title')
    {{ Lang::get('admin.public_polls') }}
@stop


@section('top-action-buttons-content')
    <a href=" {{ route('admin.public_polls.create') }} "><i class="fa fa-plus fa-fw"></i>{{ Lang::get('admin.createPublicPoll') }}</a>
@stop

@section('table-content')

<div class="table-responsive">
    <table class="table table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ Lang::get('admin.questionName') }}</th>
                <th class="centered">{{ Lang::get('admin.lastResponseDate') }}</th>
                <th class="centered">{{ Lang::get('admin.active') }}</th>
                <th class="no-sort"></th>
                <th class="no-sort"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($public_polls as $public_poll)
                <tr class="odd gradeX">
                    <td>{{ $public_poll->id }}</td>
                    <td><a href="{{URL::to('admin/public_polls/' . $public_poll->id)}}">{{$public_poll->questionName}}<i class="fa fa-search-plus fa-fw"></i></a></td>
                    <td class="centered"> @if (strlen($public_poll->lastResponseDate) === 0) - @else {{$public_poll->lastResponseDate}} @endif </td>
                    <td class="centered">
                        @if ($public_poll->isActive == 1) <i class="fa fa-check"/>
                        @else <i class="fa fa-times"/>
                        @endif
                    </td>
                    <td>
                        <a href=" {{ URL::to('admin/public_polls/' . $public_poll->id . '/edit') }}" class="label label-warning"><i class="fa fa-pencil fa-fw"></i> {{ Lang::get('admin.edit') }}</a> 
                    </td>
                    <td> 
                        {{ Form::open(array('id' => 'deleteForm'.$public_poll->id, 'url' => 'admin/public_polls/' . $public_poll->id)) }}
                            {{ Form::hidden('_method', 'DELETE') }}

                            {{ Form::submit('Delete', array('class' => 'label label-danger')) }}

                            <a href="#" onclick="{{'submitForm'.$public_poll->id}}()" class="label label-danger"><i class="fa fa-times fa-fw"></i> {{ Lang::get('admin.delete') }}</a> 
                        {{ Form::close() }} 
                        <script>
                            function {{'submitForm'.$public_poll->id}}() {
                                if (confirm("{{ Lang::get('admin.confirmDelete', array('name' => $public_poll->name)) }}" )) {
                                    document.getElementById("{{'deleteForm'.$public_poll->id}}").submit();
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