<?php

class FrontendController extends BaseController {



    public function init_date(){

        $data["cases"]  = Cas::take(10)->get();
        $cas=Cate::where('type', '廣告')->get();

        foreach ($cas as $row ) {
          $data["ad_".$row->id]    =   Ad::where("category_id",$row->id)->orderBy("pr","asc")->get();
        }

        $data["ad_8"]     =   Ad::where("category_id",8)->take(6)->orderBy('pr',"asc")->get();

        #14 首頁
        $data["ad_14"]    =   Ad::where("category_id",14)->orderBy("pr","asc")->get();
        $data["ad_10"]    =   Ad::where("category_id",10)->take(6)->orderBy("pr","asc")->get();
        $data["ad_23"]    =   Ad::where("category_id",23)->take(6)->orderBy("pr","asc")->get();
        #20	地產動態-置頂Banner
        $data["ad_20"]    =   Ad::where("category_id",20)->orderBy("pr","asc")->get();
        #22	生活美學-置頂Banner
        $data["ad_22"]    =   Ad::where("category_id",22)->orderBy("pr","asc")->get();
        #25	人物觀點-置頂Banner
        $data["ad_25"]    =   Ad::where("category_id",25)->orderBy("pr","asc")->get();
        #26	關於米築-置頂Banner
        $data["ad_26"]    =   Ad::where("category_id",26)->orderBy("pr","asc")->get();

        $data["adall"]  = Ad::orderBy("pr","asc")->get();

        return $data;
    }



    public function good_good_to_eat(){

      $d=array("title"=>"index","ip"=>$_SERVER["REMOTE_ADDR"],"created_at"=>date("Y-m-d h:i:s"));
      $this->insertToExplode($d);
  		$data = $this->init_date();



      $data["rate_categories"]    = DB::table("rate_areas")->orderBy("id","asc")->get();
      $data["rates"]    = Rate::orderBy("taiwanArea","asc")->get();
      # 地產動態
      $data["layouts"]  = DB::table("layouts")->get();

  		return View::make('frontend.good_good_to_eat',$data);

    }

    public function good2(){

      $d=array("title"=>"index","ip"=>$_SERVER["REMOTE_ADDR"],"created_at"=>date("Y-m-d h:i:s"));
      $this->insertToExplode($d);
  		$data = $this->init_date();



      $data["rate_categories"]    = DB::table("rate_areas")->orderBy("id","asc")->get();
      $data["rates"]    = Rate::orderBy("taiwanArea","asc")->get();
      # 地產動態
      $data["layouts"]  = DB::table("layouts")->get();

  		return View::make('frontend.good2',$data);

    }
	  public function index(){

      $d=array("title"=>"index","ip"=>$_SERVER["REMOTE_ADDR"],"created_at"=>date("Y-m-d h:i:s"));
      $this->insertToExplode($d);
  		$data = $this->init_date();

      $data["rates"]    = Rate::all();
      # 地產動態
      $data["one_news"] = Post::whereNotIn('id', array(7))->orderBy("prim","asc")->first();
      $tpeople         =  Deco::first();
      $data["one_life"] = !empty($tpeople)?$tpeople:false;
      $data["oabout"]   = Post::where('id',7)->first();
      $about            = Post::where('id',7)->first();
      #關於米築
      $data["about"]    = !empty($about)?$about:false;

      $data["deco_ads"]   = Deco::where('flag',1)->get();

      $data["areas"]   = RateArea::where("flag",1)->get();

      $data["people"]   = People::where("flag",0)->orderBy("id","desc")->first();
      #新案訊息
      $data["rate_ads"] = Rate::where("xm",1)->orderBy(DB::raw('RAND()'))->take(5)->get();
      $data["layouts"]  = DB::table("layouts")->get();
  		return View::make('frontend.index',$data);

  	}

    public function indextest(){

      $d=array("title"=>"index","ip"=>$_SERVER["REMOTE_ADDR"],"created_at"=>date("Y-m-d h:i:s"));
      $this->insertToExplode($d);
  		$data = $this->init_date();

      $data["rates"]    = Rate::all();
      # 地產動態
      $data["one_news"] = Post::whereNotIn('id', array(7))->orderBy("prim","asc")->first();
      $tpeople         =  Deco::first();
      $data["one_life"] = !empty($tpeople)?$tpeople:false;
      $data["oabout"]   = Post::where('id',7)->first();
      $about            = Post::where('id',7)->first();
      #關於米築
      $data["about"]    = !empty($about)?$about:false;

      $data["deco_ads"]   = Deco::where('flag',1)->get();

      $data["areas"]   = RateArea::where("flag",1)->get();

      $data["people"]   = People::orderBy("id","desc")->first();
      #新案訊息
      $data["rate_ads"] = Rate::where("xm",1)->orderBy(DB::raw('RAND()'))->take(5)->get();
      $data["layouts"]  = DB::table("layouts")->get();

  		return View::make('frontend.indextest',$data);

  	}

    public function about(){

        $d=array("title"=>"about","ip"=>$_SERVER["REMOTE_ADDR"],"created_at"=>date("Y-m-d h:i:s"));
        $this->insertToExplode($d);
  		  $data = $this->init_date();
        $data["post"] = Post::where('id',7)->first();

  		  return View::make('frontend.about',$data);
  	}


    public function people(){

      $d=array("title"=>"people","ip"=>$_SERVER["REMOTE_ADDR"],"created_at"=>date("Y-m-d h:i:s"));
      $this->insertToExplode($d);


  		$data = $this->init_date();
      $data["peoples"] = People::where('flag',0)->orderBy("prim","desc")->paginate(5);
  		return View::make('frontend.people',$data);

  	}


    public function search(){

      $d=array("title"=>"search","ip"=>$_SERVER["REMOTE_ADDR"],"created_at"=>date("Y-m-d h:i:s"));
      $this->insertToExplode($d);

      $data = $this->init_date();

      if(Input::get("name")){

          $name = Input::get("name");
          $data["result_post"]    =   Post::where("content", 'LIKE', "%%".$name."%%")->whereNotIn("id",array(7))->orderBy("updated_at","desc")->get();
          $data["result_people"]  =   People::where("content", 'LIKE', "%%".$name."%%")->orderBy("updated_at","desc") ->get();
          $data["result_rate"]    =   Rate::where("content", 'LIKE', "%%".$name."%%")->orderBy("updated_at","desc")->get();
          $data["result_deco"]    =   Deco::where("content", 'LIKE', "%%".$name."%%")->orderBy("updated_at","desc")->get();

      }else{
          // echo "utmost";
          // print_r(Input::all());
          $data["result_post"] = "";
          $data["result_people"] = "";
          $data["result_rate"] = "";
          $data["result_deco"] = "";
      }

  		return View::make('frontend.search',$data);

  	}



    public function people2($id){

  		$data = $this->init_date();
      $data["people"] = People::where('id', $id)->first();

      $d=array( "title"=>"people2",
                "ip"=>$_SERVER["REMOTE_ADDR"],
                "content"=>$data["people"]->id."/".$data["people"]->name,
                "created_at"=>date("Y-m-d h:i:s"));

      $this->insertToExplode($d);
      $layout=Input::get("layout");

      if($data["people"]->template==1){
      // if(1){
        return View::make('frontend.people2',$data);
      }elseif ($data["people"]->template==2) {
        return View::make('frontend.people3',$data);
      }else{
        return View::make('frontend.people2',$data);
      }



  	}


    public function deco(){

      $d=array( "title"=>"deco",
                "ip"=>$_SERVER["REMOTE_ADDR"],
                "created_at"=>date("Y-m-d h:i:s"));

      $this->insertToExplode($d);
  		$data = $this->init_date();
      $_type=Input::get("type");

        if(Input::get("type")){

          $data["type"] = $_type;
          $data["decos"] = Deco::where("type",$_type)->orderBy("prim","asc")->paginate(5);

        }else{

          $data["type"] = '';
          $data["decos"] = Deco::orderBy("prim","asc")->paginate(5);

        }
        return View::make('frontend.deco',$data);
  	}



    public function f3u2c4ku($id){

  		$data = $this->init_date();
      $data["deco"] = Deco::find($id);


      // Find all images
      // echo "<div style=display:none>";
      // echo 'qweqwqwe';
      // $html = new \Htmldom($data["deco"]->content );
      // foreach($html->find('img') as $element){
      //        echo $element->src . '<br>';
      // }
      // echo "</div>";


  	}


    public function deco2($id){

  		$data = $this->init_date();
      $data["deco"] = Deco::find($id);

      // $html = $data["deco"]->content;
      // $doc = new DOMDocument();
      // $doc->loadHTML($html);
      // $xpath = new DOMXPath($doc);
      // $dta["image_src"] = $xpath->evaluate("string(//img/@src)");

      // print_r($src);
      // Find all images
      // echo "<div style=display:none>";
      // echo 'qweqwqwe';
      // $html = new \Htmldom($data["deco"]->content );
      // foreach($html->find('img') as $element){
      //        echo $element->src . '<br>';
      // }
      // echo "</div>";
      // $d= array("title"=>"deco2",
      //           "content"=>$data["deco"]->name,
      //           "ip"=>$_SERVER["REMOTE_ADDR"],
      //           "created_at"=>date("Y-m-d h:i:s"));

      // $this->insertToExplode($d);
  		return View::make('frontend.deco2',$data);

  	}

    public function news(){

  		$data = $this->init_date();

      $cate=Input::get("cate");
      if(!isset($cate)){
        // $cate="地產新聞";
      }
      $data['cate'] = $cate;

      if(isset($cate)){

        $data["posts"] = Post::where("cate",$cate)
                            ->whereNotIn('id',array(7))
                            ->orderby("prim","asc")
                            // ->orderby("created_at","desc")
                            ->paginate(5);

      }else{

        $data["posts"] = Post::whereNotIn('id',array(7))
                                ->orderby("prim","asc")
                                // ->orderby("updated_at","desc")
                                ->paginate(5);
      }

  		return View::make('frontend.news',$data);

  	}

    public function news2($id){


  		$data = $this->init_date();


      $data["post"] = Post::find($id);
      $data["color"]=Input::get("color");

      $d=array( "title"=>"news2",
                "ip"=>$_SERVER["REMOTE_ADDR"],
                "content"=>$data["post"]->name,
                "created_at"=>date("Y-m-d h:i:s"));
      $this->insertToExplode($d);

  		return View::make('frontend.news2',$data);

  	}

    public function case1(){

  		$data = $this->init_date();
      $data["areas"]   = RateArea::where("flag",1)->get();
      $data["layouts"] = DB::table("layouts")->get();
      $taiwanArea=Input::get("taiwanArea");

      $d=array( "title"=>"case1",
                "ip"=>$_SERVER["REMOTE_ADDR"],
                "created_at"=>date("Y-m-d h:i:s"));

      $this->insertToExplode($d);
      if(!empty($taiwanArea)){

          $data["taiwanArea"] = $taiwanArea;

          if($taiwanArea=="all"){

              $data["cases"] = Rate::paginate(9);
              $data["taiwanArea"] = '';

          }else{

              $cases = Rate::where("taiwanArea",$taiwanArea)->orWhere('status', NULL)
                                      ->orderBy('prim', 'asc')
                                      ->paginate(9);
              // if($cases->count()==0){
              //     $data["cases"] = Rate::paginate(1);
              // }else{
                  $data["cases"] = $cases;

              // }
              // die;

          }

      }else{

          $data["taiwanArea"] = "";
          $data["cases"] = Rate::where('status', 1)->orWhere('status', NULL)->orderBy('prim', 'asc')->paginate(9);

      }
      // $data["cases"] = Rate::paginate(9);

  		return View::make('frontend.case',$data);

  	}

    public function case2($id){

  		$data = $this->init_date();
      $data["layouts"] = DB::table("layouts")->get();
      $data["case"] = Rate::find($id);
      $taiwanArea=Input::get("taiwanArea");
      $data["areas"]   = RateArea::where("flag",1)->get();

      $d= array( "title"=>"case2",
                "content"=>$data["case"]->title,
                "ip"=>$_SERVER["REMOTE_ADDR"],
                "created_at"=>date("Y-m-d h:i:s"));
      $this->insertToExplode($d);

      $data["add_n"]   =  0.1;
      $data["desc_n"]  =  0.1;
      // echo $data["case"]->latitude;
      // echo "<br>";
      // echo $data["case"]->longitude;

      if(!empty($taiwanArea)){
      		echo '1';
          $data["taiwanArea"] = $taiwanArea;
          

          $data["cases"] = Rate::where('taiwanArea',$taiwanArea)->where('status',NULL)->orWhere('status',1)
                                ->whereBetween(  'latitude',
                                                    array(
                                                        $data["case"][0]->latitude - $data["add_n"],
                                                        $data["case"][0]->latitude + $data["desc_n"]
                                                        )
                                            )
                                ->whereBetween(  'longitude',
                                                    array(
                                                        $data["case"][0]->longitude - $data["add_n"],
                                                        $data["case"][0]->longitude + $data["desc_n"]
                                                        )
                                                )
                                ->whereNotIn('id', array($id) )  
								->orderBy('prim', 'asc')
                                ->paginate(9);




      }else{

          $data["taiwanArea"] = '';
          $data["cases"] = Rate::where('taiwanArea',$data["case"]->taiwanArea)
          ->whereNotIn('id', array($id) ) 
          ->orWhere('status',1)->whereNotIn('id', array($id) )         					
                                    ->whereBetween(  'latitude',
                                                        array(
                                                            $data["case"]->latitude - $data["add_n"],
                                                            $data["case"]->latitude + $data["desc_n"]
                                                            )
                                                )
                                    ->whereBetween(  'longitude',
                                                        array(
                                                            $data["case"]->longitude - $data["add_n"],
                                                            $data["case"]->longitude + $data["desc_n"]
                                                            )
                                                    )
                                     
									->orderBy('prim', 'asc')
                                    ->paginate(9);

      }
  		return View::make('frontend.case2',$data);

  	}


    public function demo1(){

        $min =  trim(Input::get("min"));
        $max =  trim(Input::get("max"));

        $pmin =  trim(Input::get("pmin"));
        $pmax =  trim(Input::get("pmax"));

        $address = trim(Input::get("address"));

        $data["cases"] = '';

        // print_r($_GET);
        $all_data=Input::all();

        $cases;

        if ( empty($address) AND  empty($max) AND  empty($min) AND  empty($pmax) AND  empty($pmix)) {
            // echo 'qweqweqweqwe!!!!!!!!';
            $cases = Cas::take(100);
        }else{

          $cases=Cas::where(function ($query) use ($all_data) {

              foreach($all_data as $key => $value){
                // echo $key ."=>". $value;
                  if($key=="min" AND !empty($value)){
                      $query->where('total_price', '>', $value);
                  }

                  if($key=="max" AND !empty($value)){
                      $query->where('total_price', '<', $value);
                  }

                  if($key=="pmin" AND !empty($value)){
                      $query->where('floor_number_price', '>', $value);
                  }

                  if($key=="pmax" AND !empty($value)){
                      $query->where('floor_number_price', '<', $value);
                  }

                  if($key=="address" AND !empty($value)){
                      $query->where('address', 'like', "%".$value."%");
                  }
              }


          });
        }


        $cases->select("id","title","latitude" , "longitude","address",'total_price')->distinct('title','address')->toSql();
        $data["cases"]=$cases->paginate(70);


        return View::make('frontend.demo1',$data);
    }


    public function showCase($id){

        $data["case"]  = Cas::where('id',$id)->get();

        $data["add_n"]   =  0.01;
        $data["desc_n"]  =  0.01;
        $take=false;

        $betweens = Cas::whereBetween(  'latitude',
                                            array(
                                                $data["case"][0]->latitude - $data["add_n"],
                                                $data["case"][0]->latitude + $data["desc_n"]
                                                )
                                    )
                        ->whereBetween(  'longitude',
                                            array(
                                                $data["case"][0]->longitude - $data["add_n"],
                                                $data["case"][0]->longitude + $data["desc_n"]
                                                )
                                        )
                                        ->take($take)
                                        ->get();
        // latitude
        // longitude
        $data["betweens"]  =$betweens;
        // echo $betweens;

        return View::make('frontend.showCase',$data);

    }

    public function food(){


        echo $main_type =  trim(Input::get("main_type"));
        $address = trim(Input::get("address"));

        $data["cases"] = '';

        // print_r($_GET);
        $all_data=Input::all();

        $cases;
        $data['main_type']=Food::groupBy('main_type')->get();

        if ( empty($main_type) AND  empty($cate) ) {

            $cases = Food::take(40);

        }else{

          $cases=Food::where(function ($query) use ($all_data) {

              foreach($all_data as $key => $value){

                  if($key=="main_type" AND !empty($value)){
                      // echo $main_type ;

                      $query->where('main_type', '=', "".$value."");
                  }

                  if($key=="address" AND !empty($value)){
                      $query->where('address', 'like', "%".$value."%");
                  }
              }


          });
        }


        echo $cases->toSql();
        $data["cases"] = $cases->paginate(10);


        return View::make('frontend.food',$data);
    }


    public function insertToExplode($d){

      //定義那些User Agent String屬於手機瀏覽
      if( $this->check_mobile() ){
        //如果是手機瀏覽，則執行此段語法
        $d["from_drvice"] = "mobile"."|".$_SERVER['HTTP_USER_AGENT'];
      }else {
        $d["from_drvice"] = "pc";
      }

      $d["date"]=date("Y-m-d");

      // DB::table("explode")->insert($d);

    }

    public function check_mobile(){
        $regex_match="/(nokia|iphone|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|";
        $regex_match.="htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|";
        $regex_match.="blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|";
        $regex_match.="symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|";
        $regex_match.="jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320x320|240x320|176x220";
        $regex_match.=")/i";
        return preg_match($regex_match, strtolower($_SERVER['HTTP_USER_AGENT']));
    }
}
