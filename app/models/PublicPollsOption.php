<?php

class PublicPollsOption extends Eloquent {
	protected $guarded = array();

	public static $rules = array();


	public function public_poll() {

        return $this->belongsTo('public_poll', 'public_poll_id');
        
    }

}
