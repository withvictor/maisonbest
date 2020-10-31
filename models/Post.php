<?php

/**
 * Page
 *
 */
class Post extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		    'name' => 'required',
        'content' => 'required',
        'date' => 'required|date',
	];

	protected $softDelete = true;

	protected $fillable = ['name','fb_title' ,'content' , 'category_id' , 'prim', 'image',"date",'image_facebook' ];

  // public function cate(){
  //     // return $this->belongsTo('categories');
  // }

}
