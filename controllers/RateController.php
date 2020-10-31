<?php

class RateController extends BaseController {

    	public function index(){

            $data["_title"] = array("top"=>"新案訊息","main"=>"Home","sub"=>"rate");
            $data["active"] = "rates";
            $data["areas"] = RateArea::all();
            $data["result"] = Rate::orderBy('prim','asc')->paginate(15);

    		return View::make('admin.rates.index',$data);

    	}

        public function rateApply($id){            
            $data["_title"] = array("top"=>"新案訊息-預約看屋","main"=>"Home","sub"=>"rate_applies");
            $data["active"] = "rates";
            $data["rate"] = Rate::where('id',$id)->first();
            $data["rate_applies"] = RateApply::where("rate_id",$id)->paginate(15);

            return View::make('admin.rates.applies',$data);

        }
        public function applyExcel($id){

            $rate= Rate::where('id',$id)->first();
            $fileName = date("ymd").$rate->title;
            $applies = RateApply::select("name","phone","email","note",'people')->where("rate_id",$id)->get();                       
            
            $data['total-user']     =   array();
            $percounting=0;
            foreach($applies as $apply){
                $data['total-user'][$percounting]['姓名'] = $apply->name;
                $data['total-user'][$percounting]['手機'] = $apply->phone;
                $data['total-user'][$percounting]['email'] = $apply->email;
                $data['total-user'][$percounting]['看屋人數'] = $apply->people;
                $data['total-user'][$percounting]['備註'] = $apply->note;
                $percounting++;
            } 

            Excel::create($fileName, function($excel) use($data) {
                

                $excel->sheet('Sheetname', function($sheet) use($data) {
                    $sheet->setStyle(array(
                        'font' => array(                            
                            'size'      =>  16,      )
                    ));
                     

                    

                    $sheet->setAutoSize(true);    
                    $sheet->fromArray($data['total-user']);

                    
                });

            })->export('xls');
             
        }


      public function rateStore(){

        $rate;

        $validator = Validator::make(Input::all() , Rate::$rules,Rate::$messages);
        $messages = $validator->messages();

        if ($validator->fails()) {
              return Redirect::to('/rates/create')->withErrors( $messages);
        }else{
              if(Input::get("xm")==1){
                  $res = Rate::where("xm",1)->get();
                  if($res->count() > 4 ){
                      return Redirect::to('/rates/create')->withInput()->with('error', '前台最多顯示五筆');
                  }
              }

              if (Input::file('images') AND !empty(Input::file('images')[0]) ) {



                   $rate=Rate::create(array('title' => Input::get("title"),
                                            'fb_title' => Input::get("fb_title"),
                                            // 'video' => ($video_uploadSuccess)?$video_filename:'',
                                            'content' => Input::get("content"),
                                            'sub'=>Input::get("sub"),
                                            'date_to_house'=>Input::get("date_to_house"),
                                            'xm' => Input::get("xm"),
                                            'prim' => Input::get("prim"),
                                            'statement_content'=> Input::get("statement_content"),
                                            'content_email'=> Input::get("content_email"),
                                            'longitude' => Input::get("longitude"),
                                            'latitude' => Input::get("latitude"),
                                            "taiwanArea"=> Input::get("taiwanArea"),
                                            "investment"  => Input::get("investment"),
                                            "baseArea"  => Input::get("baseArea"),
                                            "floor"  => Input::get("floor"),
                                            "households"  => Input::get("households"),
                                            "floorNumber"  => Input::get("floorNumber"),
                                            "pattern"  => Input::get("pattern"),
                                            "postulate"  => Input::get("postulate"),
                                            "one_price"  => Input::get("one_price"),
                                            "total_price"  => Input::get("total_price"),
                                            "base_address"  => Input::get("base_address"),
                                            "reception"  => Input::get("reception"),
                                            "lineLinkOrg"  => Input::get("lineLinkOrg"),
                                            "lineLink"  => Input::get("lineLink"),
                                            "videoLink"  => Input::get("videoLink"),
                                            "vr360Link"  => Input::get("vr360Link"),
                                            "tel"  => Input::get("tel"),
                                            "googleTitle"  => Input::get("googleTitle"),
                                            "googleContent"  => Input::get("googleContent"),
                                            'slogan1'=> Input::get("slogan1"),
                                            'slogan2'=> Input::get("slogan2"),
                                            'url'=> Input::get("url"),
                                            'data_from'=> Input::get("data_from"),

                                            // 'ym'=>$ym,
                                            // 'choice'=>$choice,
                                            'address'=>Input::get("address")));

                  $this->update_rate_image($rate->id , Input::file('images'));

                  // echo $rate->id;
                  // echo "<br>";
                  // echo 'has image';
                  // die;
               }else{

                   $rate=Rate::create(
                                      array('title' => Input::get("title"),
                                            // 'image' => '/img/'.$filename,
                                            // 'video' => ($video_uploadSuccess)?$video_filename:'',
                                            'fb_title' => Input::get("fb_title"),
                                            'content' => Input::get("content"),
                                            'content_email'=> Input::get("content_email"),
                                            'prim' => Input::get("prim"),
                                            "investment"  => Input::get("investment"),
                                            "baseArea"  => Input::get("baseArea"),
                                            "floor"  => Input::get("floor"),
                                            'statement_content'=> Input::get("statement_content"),
                                            "households"  => Input::get("households"),
                                            "floorNumber"  => Input::get("floorNumber"),
                                            "pattern"  => Input::get("pattern"),
                                            "taiwanArea"=> Input::get("taiwanArea"),
                                            "postulate"  => Input::get("postulate"),
                                            "one_price"  => Input::get("one_price"),
                                            "total_price"  => Input::get("total_price"),
                                            'longitude' => Input::get("longitude"),
                                            'latitude' => Input::get("latitude"),
                                            "base_address"  => Input::get("base_address"),
                                            "reception"  => Input::get("reception"),
                                            "tel"  => Input::get("tel"),
                                            'date_to_house'=>Input::get("date_to_house"),
                                            'sub'=> Input::get("sub"),
                                            "lineLink"  => Input::get("lineLink"),
                                            "lineLinkOrg"  => Input::get("lineLinkOrg"),
                                            "videoLink"  => Input::get("videoLink"),
                                            "vr360Link"  => Input::get("vr360Link"),
                                            'xm' => Input::get("xm"),
                                            "googleTitle"  => Input::get("googleTitle"),
                                            "googleContent"  => Input::get("googleContent"),
                                            'slogan1'=> Input::get("slogan1"),
                                            'slogan2'=> Input::get("slogan2"),
                                            'data_from'=> Input::get("data_from"),
                                            'url'=> Input::get("url"),
                                            'address'=>Input::get("address")));


               }

                $this->do_prim($rate->id);
              //  $this->update_xm_ym(Input::get("address"),$rate->id);

                if (Input::hasFile('video')) {
                      $this->update_rate_video($rate->id,Input::file('video'));
                 }

                if (Input::hasFile('poster')) {
                       $this->update_rate_poster($rate->id,Input::file('poster'));
                }

               return Redirect::to('rates')->withInput()->with('success', '新增成功');
        }

      }

      public function rateUpdate(){

        $rate;
        $id = Input::get("id");
        $title = Input::get("title");
        $content = Input::get("content");
        $choice = Input::get("choice");
        $sub = Input::get("sub");
        // $ym    = Input::get("ym");
        $xm    = Input::get("xm");
        $address  = Input::get("address");

        $investment  = Input::get("investment");
        $baseArea  = Input::get("baseArea");
        $floor  = Input::get("floor");
        $households  = Input::get("households");
        $floorNumber  = Input::get("floorNumber");
        $pattern  = Input::get("pattern");
        $taiwanArea= Input::get("taiwanArea");
        $postulate  = Input::get("postulate");
        $one_price  = Input::get("one_price");
        $total_price  = Input::get("total_price");
        $base_address  = Input::get("base_address");
        $reception  = Input::get("reception");
        $tel  = Input::get("tel");




        $insert_array = array("title"=>$title,
                              // "update_day"=>$update_day,
                              "image"=>Input::file('image'),
                              "content"=>$content);
        $rules = [
      		    'title' => 'required',
      				'content' => 'required',
      	];

        $validator = Validator::make(Input::all() , Rate::$rules , Rate::$messages);
        // print_r(Input::file('image'));
        // die();/
        if ($validator->fails()) {

              return Redirect::to('/rate/'.$id)->withErrors( $validator);

        }else{

            $video_destinationPath = public_path()."/videos/";
            $video_filename='';
            // $video_uploadSuccess;
            // if (Input::hasFile('video')) {
            //       $video = Input::file('video');
            //       if($video->getMimeType()=="video/mp4"){
            //           $video_filename        = date("ymdhis").str_random(3). ".mp4";
            //           $video_uploadSuccess   = $video->move( $video_destinationPath , $video_filename );
            //       }
            // }

            if(Input::get("xm")==1){
                $res = Rate::where("xm",1)->whereNotIn('id', array($id))->get();
                if($res->count() > 4 ){
                    return Redirect::to('/rate/'.$id)->withInput()->with('error', '前台最多顯示五筆');
                }
            }


            if (Input::file('images') AND !empty(Input::file('images')[0]) ) {


                 $rate=Rate::where('id', $id)->update(array( 'title' => $title,
                                                             'fb_title' => Input::get("fb_title"),
                                                             'content' => $content,
                                                            //  'video' => ($video_uploadSuccess)?$video_filename:'',
                                                             'prim' => Input::get("prim"),
                                                             "taiwanArea"=> Input::get("taiwanArea"),
                                                             "investment"  => Input::get("investment"),
                                                             "baseArea"  => Input::get("baseArea"),
                                                             'content_email'=> Input::get("content_email"),
                                                             "floor"  => Input::get("floor"),
                                                             "households"  => Input::get("households"),
                                                             'statement_content'=> Input::get("statement_content"),
                                                             "floorNumber"  => Input::get("floorNumber"),
                                                             "pattern"  => Input::get("pattern"),
                                                             "postulate"  => Input::get("postulate"),
                                                             "one_price"  => Input::get("one_price"),
                                                             "total_price"  => Input::get("total_price"),
                                                             "base_address"  => Input::get("base_address"),
                                                             "reception"  => Input::get("reception"),
                                                             "tel"  => Input::get("tel"),
                                                             'sub'=>$sub,
                                                             'slogan1'=> Input::get("slogan1"),
                                                             'slogan2'=> Input::get("slogan2"),
                                                             'date_to_house'=>Input::get("date_to_house"),
                                                             "googleTitle"  => Input::get("googleTitle"),
                                                             "googleContent"  => Input::get("googleContent"),
                                                             'url'=> Input::get("url"),   
                                                             "lineLink"  => Input::get("lineLink"),
                                                             "lineLinkOrg"  => Input::get("lineLinkOrg"),
                                                             "videoLink"  => Input::get("videoLink"),
                                                             'data_from'=> Input::get("data_from"),
                                                             "vr360Link"  => Input::get("vr360Link"),
                                                             'longitude' => Input::get("longitude"),
                                                             'latitude' => Input::get("latitude"),
                                                             'xm' => Input::get("xm"),
                                                             'choice'=>$choice,
                                                             'address'=>Input::get("address")));

                        // $this->update_xm_ym($address,$id);
                        $this->update_rate_image($id , Input::file('images'));
                        $this->do_prim($id);

                        if (Input::hasFile('video')) {
                              $this->update_rate_video($id,Input::file('video'));
                        }

                        if (Input::hasFile('poster')) {
                               $this->update_rate_poster($id,Input::file('poster'));
                        }

             }else{
                  //更改


                 $rate=Rate::where('id', $id)->update(array('title' => $title,
                                                            'fb_title' => Input::get("fb_title"),
                                                     // 'image' => '/img/'.$filename,
                                                    //  'video' => ($video_uploadSuccess)?$video_filename:'',
                                                     'content' => $content,
                                                     'prim' => Input::get("prim"),
                                                     "investment"  => Input::get("investment"),
                                                     "baseArea"  => Input::get("baseArea"),
                                                     "floor"  => Input::get("floor"),
                                                     'content_email'=> Input::get("content_email"),
                                                     'date_to_house'=>Input::get("date_to_house"),
                                                     "taiwanArea"=> Input::get("taiwanArea"),
                                                     "households"  => Input::get("households"),
                                                     "floorNumber"  => Input::get("floorNumber"),
                                                     "pattern"  => Input::get("pattern"),
                                                     'statement_content'=> Input::get("statement_content"),
                                                     "postulate"  => Input::get("postulate"),
                                                     "one_price"  => Input::get("one_price"),
                                                     "total_price"  => Input::get("total_price"),
                                                     "base_address"  => Input::get("base_address"),
                                                     "reception"  => Input::get("reception"),
                                                     "tel"  => Input::get("tel"),
                                                     'slogan1'=> Input::get("slogan1"),
                                                     'slogan2'=> Input::get("slogan2"),
                                                     "googleTitle"  => Input::get("googleTitle"),
                                                     "googleContent"  => Input::get("googleContent"),
                                                     'url'=> Input::get("url"),   
                                                     "lineLink"  => Input::get("lineLink"),
                                                     "lineLinkOrg"  => Input::get("lineLinkOrg"),
                                                     "videoLink"  => Input::get("videoLink"),
                                                     "vr360Link"  => Input::get("vr360Link"),
                                                     'longitude' => Input::get("longitude"),
                                                     'latitude' => Input::get("latitude"),
                                                     'sub'=>$sub,
                                                     'data_from'=> Input::get("data_from"),
                                                     'xm' => Input::get("xm"),
                                                    //  'xm'=>$xm,
                                                    //  'ym'=>$ym,
                                                     'choice'=>$choice,
                                                     'address'=>Input::get("address")));
                 $this->do_prim($id);
                 // $this->update_xm_ym($address,$id);
                 if (Input::hasFile('video')) {
                      $this->update_rate_video($id,Input::file('video'));
                 }

                 if (Input::hasFile('poster')) {
                        $this->update_rate_poster($id,Input::file('poster'));
                 }

             }



             return Redirect::to('rates')->withInput()->with('success', '更新成功');
       }



      }


      public function delRate($id){

          $rate=Rate::find($id)->delete();
          // $rate->softDelete();
          // $rate->save();
          return Redirect::to('rates')->withInput()->with('error', '刪除成功');
      }


      public function create(){
          $data["_title"] = array("top"=>"新增-新案訊息","main"=>"Home","sub"=>"rate");
          $data["active"] = "rates";
          $data["result"] = "";
          $data["title"] = "新增新案訊息";
          $data["areas"]   = RateArea::all();
    		  return View::make('admin.rates.create',$data);
          // return View::make('layout.admin');
    	}



      public function edit($id){
          $data["_title"] = array("top"=>"編輯-新案訊息","main"=>"Home","sub"=>"rate");
          $data["active"] = "rates";
          $data["result"]=Rate::find($id);
          $data["areas"]   = RateArea::all();

    		  return View::make('admin.rates.edit',$data);

    	}

      public function details($id){

          $data["_title"] = array("top"=>"新案訊息-詳細資料","main"=>"Home","sub"=>"rate");
          $data["active"] = "rates";

          $data["rate_id"] = $id;
          $data["result"]=Rate::find($id);
          $data["title"] = "編輯新案訊息";

    		  return View::make('admin.rates.detail',$data);

    	}


      public function delRateImage(){
        $id = Input::get("id");
        $rate=DB::table('rate_pics')->where("id", $id)->first();

        if( File::exists( public_path().$rate->image )){
            File::delete( public_path().$rate->image );
            DB::table('rate_pics')->where('id', $id)->delete();

            return 1;
        }else{
            return 2;
        }


      }

      public function detailStore(){

        $data["_title"] = array("top"=>"新案訊息","main"=>"Home","sub"=>"rate");
        $data["active"] = "rates";

        $rate_id = Input::get("rate_id");
        $category_id = Input::get("category_id");


        if (Input::hasFile('images')) {

             $files            = Input::file('images');

             foreach ($files as $file) {
                # code...
                 $destinationPath = public_path().'/img/rates';
                 $filename        = str_random(6) . '_' . $file->getClientOriginalName();
                 $uploadSuccess   = $file->move($destinationPath, $filename);

                 DB::table('rate_pics')->insert(
                                array(  'rate_id'=>$rate_id,
                                        'name' => '',
                                        'category_id' => $category_id,
                                        'content'=>'',
                                        'image' => '/img/rates/'.$filename,
                                        'created_at'=>date("Y-m-d H:i:s"),
                                        'updated_at'=>date("Y-m-d H:i:s"),
                                    ));
              }

            return Redirect::to('/rates')->withInput()->with('success', '上傳成功');
         }else{
            return Redirect::to('/rate/details/'.$rate_id);
         }

      }


      public function update_xm_ym($address , $rate_id){

        $geocode = Geocoder::geocode($address);

        $geocode->getLatitude();
        $geocode->getLongitude();

        DB::table('rates')
            ->where('id', '=', $rate_id )
            ->update(array( 'latitude'  => $geocode->getLatitude() ,
                            "longitude" =>$geocode->getLongitude() ));

      }


      public function update_rate_image($rate_id , $images){

        foreach($images as $file){

          try {
            $filename     = uploadImage($file , "resize" ,"太形廣告","rate");
            $insert_data=array('rate_id'=>$rate_id, 'image' => '/img/rate/'.$filename);
            DB::table("rate_pics")->insert($insert_data);

          } catch (Exception $e) {

          }
        }

      }

      public function te_xm_ym(){

        foreach(Rate::all() as $rate){

            $geocode = Geocoder::geocode($rate->address);
            echo $rate->address;
            echo "<br>";
            echo $geocode->getLatitude();
            echo "<br>";
            echo $geocode->getLongitude();
            echo "<br>";
            echo "<br>";
            echo "<br>";

            Rate::where('id',  $rate->id )
                ->update(array( 'latitude'  => $geocode->getLatitude() ,
                                "longitude" =>$geocode->getLongitude() ));
        }

      }



      public function do_prim($id ){

        // $on_ad    = Rate::find($id);
        // $a_ads    = Rate::whereNotIn('id',array($id))->get();
        // $i        = $on_ad->prim;
        //
        // foreach($a_ads as $fad){
        //    $i++;
        //    if($on_ad->prim <= $fad->prim){
        //
        //        $fad->prim = $on_ad->prim+$i;
        //        $fad->save();
        //    }
        //
        // }


          $deco = Rate::where('id', $id)->first();
          $res  = Rate::whereNotIn( 'id' , array($id) )->orderBy("prim","asc")->get();
          $i=$deco->prim;
          foreach($res as $row){
                $i+=1;
                if($row->prim >= $deco->prim){
                    $row->prim =  $i;
                    $row->save();
                }
          }





      }

      //影片
      public function update_rate_video($rate_id,$video){

        $rate=Rate::find($rate_id);
        // $this->update_rate_video($rate->id,Input::file('video'));
        $video_destinationPath = public_path()."/videos/";
        $video_filename='';
        $video_uploadSuccess;

        if ($video) {
              $video = $video;

              //MP4才上傳，成功才寫入

              if($video->getMimeType()=="video/mp4"){
                  $video_filename        = date("ymdhis").str_random(3). ".mp4";
                  $video_uploadSuccess   = $video->move( $video_destinationPath , $video_filename );
              }
              //成功才寫入
              if($video_uploadSuccess){
                $rate->video = $video_filename;
                $rate->save();
              }


         }

      }


      public function update_rate_poster($rate_id,$video){

        $rate=Rate::find($rate_id);
        // $this->update_rate_video($rate->id,Input::file('video'));
        $video_destinationPath = public_path()."/videos/";
        $video_filename='';
        $video_uploadSuccess;

        if ($video) {
              $video = $video;


              $video_filename        = date("ymdhis").str_random(3). ".jpg";
              $video_uploadSuccess   = $video->move( $video_destinationPath , $video_filename );
              //成功才寫入
              if($video_uploadSuccess){
                $rate->poster = $video_filename;
                $rate->save();
              }


         }

      }

 }
