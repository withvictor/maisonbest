<!DOCTYPE html>
<html prefix='og: http://ogp.me/ns#'>
<head>
	<meta charset="UTF-8">
	<title>{{$post->name}} | 地產動態 | 米築</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="/favicon.ico">
	<meta name="description" content="{{ms_str($post->content,200)}}" />
	<meta property="og:title" content="{{$post->fb_title}}"></meta>
	<meta property="og:type" content="地產動態"></meta>
	<meta property="og:url" content="{{Request::url()}}"></meta>
	<meta property="fb:app_id" content="1325670327461704" /></meta>
	<meta property="og:site_name" content="米築"></meta>
	<meta property="og:description" content="{{ms_str($post->content,200)}}"></meta>

	<?php
	if($post->image_facebook){
		echo '<meta property="og:image" content="http://www.maisonbest.com.tw/public'.$post->image_facebook.'" ></meta>';
	}else{
			try {

						$html = new \Htmldom($post->content);

						if($html->find('img')){
							// echo '/';
								foreach($html->find('img') as $element){
									echo '<meta property="og:image" content="http://www.maisonbest.com.tw'.$element->src.'" ></meta>';
								}
						}
			} catch (Exception $e) {
				 echo '<meta property="og:image" content="http://www.maisonbest.com.tw/public'.$post->image.'" ></meta>';
			}
	}

	?>






    <link rel="stylesheet" type="text/css" href="/css/default.css">
    <link rel="stylesheet" type="text/css" href="/css/news.css">

    <script src="/js/jquery.js"></script>
		<script src="/js/jquery.flexslider-min.js"></script>
    <script src="/js/Crawler.js"></script>
		<script src="http://malsup.github.com/jquery.cycle2.js"></script>
    <script src="/js/script.js"></script>

    <style type="text/css">
    h1 { font-weight:normal !important; }
    article{
        width: 94%;
    }
    .news{
        border: none;
    }
    .news p{
        margin: 30px 0;
    }
    .news img{
        max-width: 100%;
        height: auto !important;
    }
    .title a img{
        width:50px;
        height:50px;
        float: right;
    }

    @media all and (min-width: 360px) and (max-width: 480px) {
        .title a img{
	        width:30px;
	        
    	}
    }


    </style>
		@include("fb_code")
</head>

	@include("ba")
<body>
	@include("ga_code")
<div id="container">
	@include("frontend.comm.top")

    @include("frontend.comm.top_ad",array("sql_data"=>$ad_20))
    <img id="toTop" src="/images/toTop.png">

    @include("frontend.comm.row-marquee",array("m"=>"m3" , "c_sql"=>$ad_8))

    <div id="main" class="clearfix">
        <article>
            <div class="news clearfix">
                <span class="{{$color}} title"></span>
								<span>

									<?php
										// $dd=explode(" ",$post->created_at);
										// echo $dd[0];
										echo $post->date;

									?>
								</span>
                				<p class="{{$color}} title">{{$post->name}}
										<a href="javascript: void(window.open('http://www.facebook.com/share.php?u='.concat(encodeURIComponent(location.href)) ));"  target="_new" >
<img src="/images/case/icon2.png" style="float: right;margin: 0px 0px 0px 6px;" >
										</a>

										<a href="http://line.naver.jp/R/msg/text/?{{$post->name}}%0D%0A{{Request::url()}}" rel="nofollow" >
											<img src="/images/case/icon1.png"   alt="用LINE傳送"   style="float: right;    margin: -3x 0px 0px 3px;"/>
										</a>
								</p>



								@if( !empty($post->image) AND File::exists( public_path().$post->image))
									<!-- <img src="/public{{$post->image}}"> -->
								@endif



                <p>{{ ($post->content) }}</p>
            </div>
        </article>
    </div>

  @include("frontend.comm.footer")
</div>
</body>
</html>
