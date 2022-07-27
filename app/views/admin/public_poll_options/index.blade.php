<div class="tab">

	<div class="tab-title">
		{{ Lang::get('admin.PollOptions') }}
	</div>

	<div class="top-action-buttons">
	    <a href=" {{ URL::to('admin/public_polls/'.$public_poll->id.'/public_poll_options/create') }} ">
	    	<i class="fa fa-plus fa-fw"></i>{{ Lang::get('admin.createPollOptions') }}
    	</a>
	</div>

	<div class="table-responsive" style="max-width: 900px !important;">
	    <table class="table table-hover" id="dataTables-example">
	        <thead>
	            <tr>
	                <th>#</th>
	                <th>{{ Lang::get('admin.optionName') }}</th>
	                <th class="centered">{{ Lang::get('admin.active') }}</th>
	                <th class="no-sort"></th>
	                <th class="no-sort"></th>
	            </tr>
	        </thead>
	        <tbody>
	            @foreach($public_poll_options as $public_poll_option)
	                <tr class="odd gradeX">
	                    <td>{{ $public_poll_option->id }}</td>
	                    <td>{{ $public_poll_option->optionName}}</td>
	                    <td class="centered">
	                        @if ($public_poll_option->isActive == 1) <i class="fa fa-check"/>
	                        @else <i class="fa fa-times"/>
	                        @endif
	                    </td>
	                    <td>
	                        <a href="{{URL::to('admin/public_polls/'.$public_poll->id.'/public_poll_options/'.$public_poll_option->id.'edit') }}" class="label label-warning">
	                        	<i class="fa fa-pencil fa-fw"></i> {{ Lang::get('admin.edit') }}
                        	</a> 
	                    </td>
	                    <td> 
	                        {{ Form::open(array(
	                        		'id' => 'deleteForm'.$public_poll_option->id, 
	                        		'url' => 'admin/public_polls/'.$public_poll->id.'/public_poll_options/'.$public_poll_option->id))}}
	                            {{ Form::hidden('_method', 'DELETE') }}

	                            {{ Form::submit('Delete', array('class' => 'label label-danger')) }}

	                            <a href="#" onclick="{{'submitForm'.$public_poll_option->id}}()" class="label label-danger"><i class="fa fa-times fa-fw"></i> {{ Lang::get('admin.delete') }}</a> 
	                        {{ Form::close() }} 
	                        <script>
	                            function {{'submitForm'.$public_poll_option->id}}() {
	                                if (confirm("{{ Lang::get('admin.confirmDelete', array('name' => $public_poll_option->optionName)) }}" )) {
	                                    document.getElementById("{{'deleteForm'.$public_poll_option->id}}").submit();
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
</div>