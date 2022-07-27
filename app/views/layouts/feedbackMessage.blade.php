<style type="text/css">
	#alertTop {
	    position: fixed;
		top: 0px;
		left: 25%;
		z-index: 4000;
		font-size: 17px;
		line-height: 2.2;
		width: 50%;
	}

	.alert-dismissable .close {
	    top: 6px;
	    font-size: 25px;
	}
</style>

<div id="alertTop">
	<div class="alert alert-danger alert-dismissable">

	    <button id="feedbackClose" type="button" class="close" data-dismiss="alert" aria-hidden="true">
	    	<i class="fa fa-times"></i>
    	</button>
	    
	    <strong>{{ Lang::get('speaker.error') }}! </strong> 

		<ul style="list-style-type: none; display: inline-block;">
		    @foreach($errors as $message)
		    	<li style="padding-right: 10px;">{{ $message }}</li>
		    @endforeach
		</ul>

	</div>
</div>