<?php

/**
 * Page
 *
 */
class RateApply extends \Eloquent {

  // Add your validation rules here
	public static $rules = [
		    'name'      => 'required',
				"email"      => 'required',
				"phone"      => 'required',


	];

	protected $talbe     = "rate_apply";
	protected $fillable  = [	'name',"email","phone","note" ,'people','rate_id'];
}
