<?php

class PublicPoll extends Eloquent {
	protected $guarded = array();

	public static $rules = array();


	public function public_polls_options(){
		return $this->hasMany('public_polls_options');
	}


	public static function getOptions($id)
	{
		return DB::select('select public_polls_options.* from public_polls_options where public_polls_id = ?', array($id));
	}

}
