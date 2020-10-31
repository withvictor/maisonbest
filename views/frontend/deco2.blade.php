
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html prefix='og: http://ogp.me/ns#'>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

	<title>{{$deco->name}} | 生活美學 | 米築</title>

	<link rel="shortcut icon" href="/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" /></meta>


	<meta name="description" content="{{ms_str($deco->content,200)}}" />
	<meta property="fb:app_id" content="1325670327461704" /></meta>
	<meta property="og:title" content="{{$deco->fb_title}}" /></meta>
	<meta property="og:url" content="{{Request::url()}}" /></meta>


	<?php

	$iiiflag=false;
	// try {
	// 		$iiiflag=true;
	// 		//echo '1';
	// 		$html = new \Htmldom($deco->content );
	// 		foreach($html->find('img') as $element){
	// 				echo '<meta property="og:image" content="http://www.maisonbest.com.tw'.$element->src.'" /></meta>';
	// 		}
	// } catch (Exception $e) {

			// echo '<meta property="og:image" content="http://www.maisonbest.com.tw/images/index/logo.png'.'" /></meta>';
			// if(  !empty($deco->image) AND File::exists( public_path().$deco->image)  )
					// echo '<meta property="og:image" content="http://www.maisonbest.com.tw'.$deco->image.'" /></meta>';
					if(  !empty($deco->fb_image) AND File::exists( public_path().$deco->fb_image)  ){
							echo '<meta property="og:image" content="';
							echo 'http://www.maisonbest.com.tw/public';
							echo $deco->fb_image.'" id="1" /></meta>';
					}else{

						echo '<meta property="og:image" content="http://www.maisonbest.com.tw/images/index/logo.png'.'" id="2" /></meta>';
					}





	// }



	?>


	<meta property="og:site_name" content="米築" />
	<meta property="og:description" content="{{ms_str($deco->content,200)}}" />
    <link rel="stylesheet" type="text/css" href="/css/default.css">
    <link rel="stylesheet" type="text/css" href="/css/deco2.css">

    <script src="/js/jquery.js"></script>
		<script src="/js/jquery.flexslider-min.js"></script>
    <script src="/js/Crawler.js"></script>
    <script src="http://malsup.github.com/jquery.cycle2.js"></script>

    <script src="/js/script.js"></script>
		<style media="screen">
			div.articleControllerList{
				float:right;
			}
		</style>

		@include("fb_code")
</head>
 @include("ba")
<body>
	@include("ga_code")
<div id="container">
		@include("frontend.comm.top")

    @include("frontend.comm.top_ad",array("sql_data"=>$ad_22))

    <img id="toTop" src="/images/toTop.png">

	@include("frontend.comm.row-marquee",array("m"=>"m3" , "c_sql"=>$ad_8))

    <div id="main" class="clearfix">
        <section>
            <!-- <p>HOME & LIVING</p> -->
            <h1>
            <span style="font-weight: bold;font-size: 18px;line-height: 50px;" >{{$deco->name}}</span>
            </h1>

						@if( !empty($deco->image) AND File::exists( public_path().$deco->image))
						<!--
							<img src="/public{{$deco->image}}">
						-->
						@endif

        </section>

        <article>
					<div class="articleControllerList">
							@if($deco->videoLink)
								<a href="{{$deco->videoLink}}" target="_new" >
										<img src="/images/case/icon4.png" style="width:50px;">
								</a>
							@endif

							@if($deco->vr360Link)
								<a href="{{$deco->vr360Link}}"  target="_new" >
									<img src="/images/case/icon3.png"  style="width:50px;">
								</a>
							@endif

							<a href="javascript: void(window.open('http://www.facebook.com/share.php?u='.concat(encodeURIComponent(location.href)) ));"  target="_new" >
									<img src="/images/case/icon2.png"  style="width:50px;">
							</a>





							<a href="http://line.naver.jp/R/msg/text/?{{$deco->name}}%0D%0A{{Request::url()}}" rel="nofollow" >
								<img src="/images/case/icon1.png"   alt="用LINE傳送"   style="width:50px;"/>
							</a>





					</div>
            {{$deco->content}}
        </article>
    </div>

    @include("frontend.comm.footer")
</div>
</body>
</html>
