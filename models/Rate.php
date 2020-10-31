<?php

/**
 * Page
 *
 */
class Rate extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		    'title' => 'required',
				'address' => 'required',
				'lineLink'=> 'url',
				'videoLink'=> 'url',
				// 'vr360Link'=> 'url',
				'taiwanArea'=> 'required',
	];
	public static  $messages = array(
    'required' => 'The :attribute ',
		'url' => ':attribute 請輸入正確的URL',
	);



  protected $softDelete = true;
	// Don't forget to fill this array
	protected $fillable = [ 	'title' ,'fb_title','image' ,
								'content','sub',
								'latitude','longitude',
								'video',"poster",
								"investment","baseArea",
								"floor","households",
								"floorNumber","pattern",
								"prim",
								"postulate","one_price",
								"total_price","base_address",
								"reception","tel",
								"googleTitle","googleContent",
								"taiwanArea","slogan1","slogan2",
								'xm','ym',"date_to_house",
								'lineLink','lineLinkOrg','videoLink','vr360Link','statement_content',
								'address','choice','content_email','data_from'];



}
