<?php

class Company extends Eloquent {
	protected $guarded = array('id', 'isActive');

	public static $rules = array();


	protected $table = 'companies';

	public function users(){
		return $this->hasMany('User');
	}
}
