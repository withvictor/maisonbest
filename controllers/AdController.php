<?php

class AdController extends BaseController {


      public function __construct(){
          if (!Auth::check()){
            return Redirect::to('login');
          }
      }

      public function cate_init(){
        $cates=Cate::all();
        foreach($cates as $cate ){
            $cate_array[$cate->id]=$cate->name;
        }
        return $cate_array;
      }

    	public function index($id){

          $cate=Cate::where("id",$id)->first();
          $cate_array=$this->cate_init();
          $data["_title"] = array("top"=>'廣告-'.$cate->name,"main"=>"Home","sub"=>"ads");
          $data["active"] = "廣告";
          $data["post_id"] =  1;
          $data["category_id"] =  $id;
          $cate_array = array();
          $data["cates"] = $cate_array;
          $data["result"] = Ad::where("category_id",$id)->orderBy('pr',"asc")->paginate(20);

    		  return View::make('admin.ad.index',$data);

    	}


      public function adlist(){

          $cate_array=$this->cate_init();
          $data["_title"] = array("top"=>'廣告分類列表',"main"=>"Home","sub"=>"ads");
          $data["active"] = "廣告";
          $data["post_id"] =  1;
          $cate_array = array();
          $data["cates"] = $cate_array;
          $data["result"] = Ad::paginate(20);

          $data["ad_results"] = Cate::where('type', '廣告')->paginate(20);

    		  return View::make('admin.ad.adlist',$data);


    	}

      public function adStore(){


          $this_ad;

          $insert_array = array(
                  'title'        =>  Input::get('title'),
                  'category_id' =>  Input::get('category_id'),
                  'pr'     =>  Input::get('pr'),
                  'content'     =>  Input::get('content'),
                  'pr'     =>  Input::get('pr'),
                  'url'     =>  Input::get('url')
          );
          $ad_id;


          $validator = Validator::make($insert_array, Ad::$rules );





          if ( $validator->fails()) {

              return Redirect::to('/ads/create/'.Input::get('category_id'))->withErrors($validator);

          } else {
            $this_ad;
            // print_r( Input::all() );
            // die;
            //圖片
            if(Input::get("is_video")==2){
                if (Input::hasFile('image')) {

                      // $filename  = uploadImage(Input::file('image'));

                      $filename     = uploadImage(Input::file('image') , "resize" ,"太形廣告","ad");

                      $this_ad      = Ad::create(array(  'image' => '/img/ad/'.$filename,
                                                    'is_video'        =>  Input::get('is_video'),
                                                    'title'        =>  Input::get('title'),
                                                    'category_id' =>  Input::get('category_id'),
                                                    'pr'     =>  Input::get('pr'),
                                                    'content'     =>  Input::get('content'),
                                                    'pr'     =>  Input::get('pr'),
                                                    'url'     =>  Input::get('url')
                                                  ));


                 }else{
                      $this_ad = Ad::create($insert_array);
                 }
            }

            //影片
            if(Input::get("is_video")==1){

                if (Input::hasFile('video')) {

                   $video = Input::file('video');
                   if($video->getMimeType()=="video/mp4"){


                     $destinationPath = public_path()."/videos/";
                     $filename        = date("ymdhis").str_random(3). ".mp4";
                     $uploadSuccess   = $video->move( $destinationPath , $filename );

                     $this_ad      = Ad::create(array(  'video' => $filename,
                                                   'is_video'        =>  Input::get('is_video'),
                                                   'title'        =>  Input::get('title'),
                                                   'category_id' =>  Input::get('category_id'),
                                                   'pr'     =>  Input::get('pr'),
                                                   'content'     =>  Input::get('content'),
                                                   'pr'     =>  Input::get('pr'),
                                                   'url'     =>  Input::get('url')
                                                 ));

                   }else{
                     echo "檔案錯誤！";
                   }



               }else{
                    $this_ad = Ad::create($insert_array);
               }

            }

             $this->do_prim($this_ad->id , Input::get('category_id') );


            return Redirect::to('/ads/index/'.Input::get('category_id'));

          }

      }

      public function adUpdate(){

        $id       =  Input::get('id');
        $update_data = array(
                'title'       =>  Input::get('title'),
                'category_id' =>  Input::get('category_id'),
                'pr'          =>  Input::get('pr'),
                'content'     =>  Input::get('content'),
                'url'         =>  Input::get('url')
        );



        $validator = Validator::make(Input::all(), Ad::$rules);


        if ( $validator->passes() ) {

          if (Input::hasFile('poster')) {
                 $this->update_ad_poster($id,Input::file('poster'));
          }


          if(Input::get("is_video")==2){
              // echo "1";

             if (Input::hasFile('image')) {
                  // $filename        = uploadImage(Input::file('image'));
                  $filename     =  uploadImage(Input::file('image') ,"resize" ,"太形80118017", "ad");
                  $thad         =  Ad::where('id',$id)->update(
                             array( 'image' => '/img/ad/'.$filename,
                                    'title'        =>  Input::get('title'),
                                    'is_video'        =>  Input::get('is_video'),
                                    'category_id' =>  Input::get('category_id'),
                                    'pr'     =>  Input::get('pr'),
                                    'content'     =>  Input::get('content'),
                                    'url'     =>  Input::get('url')
                                    ));
             }else{
              //  echo "2";
                  AD::where('id',$id)->update($update_data);
             }
           }


           //影片
           if(Input::get("is_video")==1){
            //  echo "3";

               if (Input::hasFile('video')) {

                  $video = Input::file('video');
                  if($video->getMimeType()=="video/mp4"){


                    $destinationPath = public_path()."/videos/";
                    $filename        = date("ymdhis").str_random(3). ".mp4";
                    $uploadSuccess   = $video->move( $destinationPath , $filename );

                    $this_ad      = Ad::where('id',$id)->update(array(  'video' => $filename,
                                                                        'is_video'        =>  Input::get('is_video'),
                                                                        'title'        =>  Input::get('title'),
                                                                        'category_id' =>  Input::get('category_id'),
                                                                        'pr'     =>  Input::get('pr'),
                                                                        'content'     =>  Input::get('content'),
                                                                        'pr'     =>  Input::get('pr'),
                                                                        'url'     =>  Input::get('url')
                                                                      ));

                  }else{
                    echo "檔案錯誤！";
                  }



              }else{
                // echo "4";
                   $this_ad = Ad::create($insert_array);
              }

           }

           Ad::where('id',$id)->update(array(  'title'        =>  Input::get('title'),
                                               'category_id' =>  Input::get('category_id'),
                                               'pr'     =>  Input::get('pr'),
                                               'content'     =>  Input::get('content'),
                                               'pr'     =>  Input::get('pr'),
                                               'url'     =>  Input::get('url')
                                            ));

        // print_r(Input::all());
        $this->do_prim($id , Input::get('category_id') );
        return Redirect::to('/ads/index/'.Input::get("category_id"));

        } else {
                return Redirect::to('/ads/'.$id."?category_id=".Input::get("category_id"))->withErrors($validator);

        }




      }


      public function delUser($id){

          User::find($id)->delete();
          return Redirect::to('users')->withInput()->with('error', '使用者刪除成功');
      }


      public function create($id){

          $cate=Cate::where("id",$id)->first();
          $cate_array=$this->cate_init();
          $data["post"] = "";
          $data["category_id"] = $id;
          $data["_title"] = array("top"=>"新增-廣告(分類".$cate->name.")" ,"main"=>"Home","sub"=>"ad");
          $data["active"] = "廣告";
          $data["cates"] = Cate::where('id',$id)->get()->toArray();

    		  return View::make('admin.ad.create',$data);

    	}

      public function deleteUser(){

          // $data["title"] = "新增使用者";
    		  // return View::make('admin.users.create',$data);
          // return View::make('layout.admin');
    	}

      public function edit($id){

          $category_id = Input::get('category_id');
          $cate_array=$this->cate_init();
          $cate=Cate::where("id",$category_id)->first();

          $data["_title"] = array("top"=>"編輯-".$cate->name ,"main"=>"Home","sub"=>"post");
          $data["active"] = "廣告";
          $data["category_id"] = $category_id;
          $data["post"]=Ad::find($id);
          $data["cates"] = Cate::where('type','最新消息')->get()->toArray();

    		  return View::make('admin.ad.edit',$data);

    	}

      public function  delAd($id){

        $category_id = Input::get('category_id');

        $ad=Ad::find($id);
        File::delete( '/public'.$ad->image );
        $ad->delete();
        return Redirect::to('ads/index/'.$category_id);

      }

      public function layout(){

        $category_id = Input::get('category_id');
        $cate_array=$this->cate_init();

        $data["_title"] = array("top"=>"編輯-" ,"main"=>"Home","sub"=>"post");
        $data["active"] = "layout";

        $data["result"]=    DB::table("layouts")->get();
        return View::make('admin.setLayout',$data);

      }

      public function delThisAdImage($id){

        // print_r( Input::all() );
        $category_id   = Input::get("category_id");
        $adi = Ad::find($id);
        // print_r($adasdasd);
        // echo $adi->image;
        if( File::exists( public_path().$adi->image )){
            File::delete( public_path().$adi->image );
        }

        $adi->image="";
        $adi->save();
        return Redirect::to('ads/'.$id.'?category_id='.$category_id);
      }

      public function do_prim($ad_id , $category_id){

        // echo $ad_id."/". $category_id;
        // echo "<br>";
        $on_ad    = Ad::find($ad_id);
        $a_ads    = Ad::where('category_id',$category_id)
                        ->whereNotIn('id',array($ad_id))
                        // ->orderBy("pr","asc")
                        ->get();

        // $i        = $on_ad->pr;
        // $deco     = Deco::where('id', $id)->first();
        // $res      = Deco::whereNotIn( 'id' , array($id) )->orderBy("prim","asc")->get();

        $i=$on_ad->pr;

        foreach($a_ads as $row){

              $i+=1;
              // echo $row->id;
              // echo "<br>";
              // echo "<br>";

              if($row->pr >= $on_ad->pr){
                  // echo $row->id;
                  // echo "<br>";
                  $row->pr =  $i;
                  $row->save();
                  // echo "<br>";
                  // echo "<br>";
              }
        }

        // die;



      }



      public function update_ad_poster($id,$video){

        $ad=Ad::find($id);
        // $this->update_rate_video($rate->id,Input::file('video'));
        $video_destinationPath = public_path()."/videos/";
        $video_filename='';
        $video_uploadSuccess;

        if ($video) {
              $video = $video;


              $video_filename        = "ad_".date("ymdhis").str_random(3). ".jpg";
              $video_uploadSuccess   = $video->move( $video_destinationPath , $video_filename );
              //成功才寫入
              if($video_uploadSuccess){
                $ad->poster = $video_filename;
                $ad->save();
              }


         }

      }

 }
