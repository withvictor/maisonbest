<?php

class PostController extends BaseController {


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

    	public function index(){

          $name=Input::get('name');
          $cate_array=$this->cate_init();
          $data["_title"] = array("top"=>'地產動態',"main"=>"Home","sub"=>"post");
          $data["active"] = "地產動態";

          $cate_array = array();
          $data["cates"] = $cate_array;
          
          if($name && !empty($name)){
            $data["result"] = Post::where("name" , 'like',"%".$name."%")
                                    ->orderby("prim","asc")
                                    ->paginate(10);  
          }else{
            $data["result"] = Post::whereNotIn('id',array(7))
                                    ->orderby("prim","asc")
                                    ->paginate(10);
          }

    		  return View::make('admin.posts.index',$data);


    	}


      public function postStore(){
        $uploadSuccess=false;
        $filename;
        $insert_array;

        $insert_array = array(
                'name'        =>  Input::get('name'),
                'category_id' =>  Input::get('category_id'),
                'prim'        =>  Input::get('prim'),
                'date'        =>  Input::get('date'),
                "fb_title"    =>  Input::get('fb_title'),
                'cate'        =>  Input::get('cate'),
                'content'     =>  Input::get('content')
        );
        $validator = Validator::make($insert_array, Post::$rules );



          if ( $validator->fails()) {

              return Redirect::to('/post/create')->withErrors($validator);

          } else {

              $t_post =  Post::create($insert_array);
              if(Input::hasFile('image')){
                  $filename           = uploadImage(Input::file('image') , "resize" ,"太形廣告","post");
                  $t_post->image        = '/img/post/'.$filename;

              }

              if(Input::hasFile('image_facebook')){
                  $filename_facebook      = uploadImage(Input::file('image_facebook') , "resize" ,"太形廣告","post");
                  $t_post->image_facebook = '/img/post/'.$filename_facebook;
              }

              $t_post->cate=$insert_array["cate"];
              $t_post->save();

              $this->do_prim($t_post->id);
              return Redirect::to('/posts');

          }

      }

      public function postUpdate(){

        $id           = Input::get("id");
        $name         = Input::get("name");
        $content      = Input::get("content");
        $category_id  = Input::get("category_id");
        $prim         = Input::get('prim');


        $filename;
        $update_array;

        $post = Post::find($id);
        $post->name         =  Input::get('name');
        $post->category_id  =  Input::get('category_id');
        $post->prim         =  Input::get('prim');
        $post->date         =  Input::get('date');
        $post->fb_title     =  Input::get('fb_title');
        $post->cate         =  Input::get('cate');
        $post->content      =  Input::get('content');
        // $post->save();

        if(Input::hasFile('image')){
             $filename     = uploadImage(Input::file('image') , "resize" ,"太形廣告" , "post" );
             $post->image       = '/img/post/'.$filename;
        }

        if(Input::hasFile('image_facebook')){
             $image_facebook     = uploadImage(Input::file('image_facebook') , "resize" ,"太形廣告" , "post" );
             $post->image_facebook       = '/img/post/'.$image_facebook;
        }
        $post->save();


        $validator = Validator::make(Input::all(), Post::$rules);

        if ( $validator->passes() ) {
                // Post::where('id', $id)->update($update_array);
                $this->do_prim($id);

                if($id==7){
                    return Redirect::to('/post/'.$id );
                }else{
                    return Redirect::to('/posts');
                }

        }else{
                return Redirect::to('/post/'.$id )->withErrors($validator);
        }




      }


      public function delUser($id){

          User::find($id)->delete();
          return Redirect::to('users')->withInput()->with('error', '使用者刪除成功');
      }


      public function create(){

          $cate_array=$this->cate_init();
          $data["post"] = "";

          $data["_title"] = array("top"=>"新增-地產動態","main"=>"Home","sub"=>"post");
          $data["active"] = "地產動態";

          $data["cates"] = Cate::where('type','最新消息')->get()->toArray();
    		  return View::make('admin.posts.create',$data);

    	}

      public function deleteUser(){

          // $data["title"] = "新增使用者";
    		  // return View::make('admin.users.create',$data);
          // return View::make('layout.admin');
    	}

      public function edit($id){

          $category_id = Input::get('category_id');
          $cate_array=$this->cate_init();
          $data["_title"] = array("top"=>"編輯-地產動態","main"=>"Home","sub"=>"post");

          if($id==7){
              $data["active"] = "關於米築";
          }elseif($id==5){
              $data["active"] = "生活美學";
          }elseif($id==4){
              $data["active"] = "地產動態";
          }else{
              $data["active"] = "news";
          }



          $data["category_id"] = $category_id;
          $data["post"]=Post::find($id);


          $data["cates"] = Cate::where('type','最新消息')->get()->toArray();
          if($id==7){
              return View::make('admin.about',$data);
          }else{
              return View::make('admin.posts.edit',$data);
          }


    	}

      public function  delPost($id){
        $cate_array=$this->cate_init();
        Post::find($id)->delete();
        // $category_id = Input::get("category_id");
        return Redirect::to('/posts')->withInput()->with('success', '刪除成功');
      }


      public function delPostImage($id){

    		$post = Post::find($id);

    		if( File::exists( public_path().$post->image )){
    				File::delete( public_path().$post->image );
    		}
    		$post->image="";
    		$post->save();
        return Redirect::to('/post/'.$id );
      }

      public function delPostImage_facebook($id){

    		$post = Post::find($id);

    		if( File::exists( public_path().$post->image_facebook )){
    				File::delete( public_path().$post->image_facebook );
    		}
    		$post->image_facebook="";
    		$post->save();
        return Redirect::to('/post/'.$id );
      }



      public function do_prim($id ){

        $deco = Post::where('id', $id)->first();
        $res  = Post::whereNotIn( 'id' , array($id) )->orderBy("prim","asc")->get();
        $i=$deco->prim;
        foreach($res as $post){
              $i+=1;
              if($post->prim >= $deco->prim){
                  $post->prim =  $i;
                  $post->save();
              }
        }


      }

 }
