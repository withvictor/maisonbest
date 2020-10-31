<?php

/**
 * Page
 *
 */
class People extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		    'name' => 'required',
				'tag'  => 'required',
        'content' => 'required',
				'template'=> 'required',
        // 'image' => 'required|image',
				// 'image2' => 'required|image',
				"title"=>"required|max:5",
	];

	protected $softDelete = true;
	protected $talbe = "peoples";

	protected $fillable = ['name','fb_title' ,'fbLink','content','tag','title' ,'flag',
	'category_id' , 'prim', 'image','image2' ,'image_facebook','template'];

  // public function cate(){
  //     // return $this->belongsTo('categories');
  // }

}
