<!DOCTYPE html>
<html prefix='og: http://ogp.me/ns#'>
<head itemscope itemtype="http://schema.org/WebSite" >
	<meta charset="UTF-8">
	<title>米築</title>
	<link rel="canonical" href="http://www.maisonbest.com.tw/" itemprop="url">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="/favicon.ico">
	<meta property="og:title" content="米築"></meta>
	<meta property="og:type" content="房地產"></meta>
	<meta property="fb:app_id" content="1325670327461704" />
	
	<meta property="og:url" content="{{Request::url()}}"></meta>
	<meta property="og:description" content="全台最有溫度的地產網站「米築株式會社」集合全台最頂尖的編輯群，為讀者提供一手房市資訊，努力發掘台灣優質建築，以及精彩的人物故事，提供讀者多元豐富的閱讀體驗。"></meta>
	<meta property="og:site_name" content="米築"></meta>	
	<meta name="description" content="全台最有溫度的地產網站「米築株式會社」集合全台最頂尖的編輯群，為讀者提供一手房市資訊，努力發掘台灣優質建築，以及精彩的人物故事，提供讀者多元豐富的閱讀體驗。" />


	<meta property="og:image" content="http://www.maisonbest.com.tw/images/index/logo.png" /></meta>


    <link rel="stylesheet" type="text/css" href="/css/slick/flexslider.css">
    <link rel="stylesheet" type="text/css" href="/css/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="/css/slick/slick-theme.css">

    <link rel="stylesheet" type="text/css" href="/css/default.css">
    <link rel="stylesheet" type="text/css" href="/css/index.css">

    <script src="/js/jquery.js"></script>
    <script src="/js/jquery.flexslider-min.js"></script>
    <script src="/js/slick.min.js"></script>
    <script src="/js/Crawler.js"></script>

    <script src="/js/script.js"></script>
    <script src="/js/index.js"></script>
		@include("fb_code")
</head>
@include("ba")
<body>
@include("ga_code")

 
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebSite",
  "logo": "http://maisonbest.com.tw/images/logo.png",
  "name": "米築",
  "url": "http://maisonbest.com.tw/",
  "sameAs": [
    "https://www.facebook.com/maisonbest",
    "https://www.youtube.com/channel/UC_b2d3l7qq1qvWEoGc_wYmw"
  ]
}

</script>


<div style="display:none;">
<h1 itemprop="name">米築| 全台最有溫度的地產網站</h1>
</div>



<div id="container">

	<nav>
				<section class="clearfix">
						<div id="logo"><a href="/index"><img src="/images/index/logo.png"></a></div>
						<div id="slogan">
								<img src="/images/index/slogan.png">

								<div>
									<form method="post" action="/search">
									<a href="https://www.facebook.com/maisonbest"  target="_new" >
											<img class="fb" src="/images/index/fb_icon.png">
									</a>


	                    <input type="text" name="name" placeholder="SEARCH" />

											<input type="submit"  value="" style="background-image:url('/images/search_icon.png'); background-size:contain; ">


	                </form>


								</div>
						</div>
				</section>
				<div>
						<ul>
			              	<li><a href="/news"  itemprop="url"><p>NEWS</p><span> 地產動態</span></a></li>
			              	<li><a href="/case"  itemprop="url"><p>CASE</p><span>新案訊息</span></a></li>
			              	<li><a href="/deco" itemprop="url"><p>DECO</p><span>生活美學</span></a></li>
			              	<li><a href="/people"  itemprop="url"><p>PEOPLE</p><span>人物觀點</span></a></li>
			              	<li><a href="/about"  itemprop="url"><p>ABOUT</p><span>關於米築</span></a></li>
			          	</ul>
				</div>
		</nav>


    <img id="toTop" src="images/toTop.png">

    <div id="main">

        <div class="flex">
            <div class="flexslider fs1">
                <ul class="slides">
										<?php foreach ($ad_14 as $row14): ?>
											<li>
												@if($row14->is_video==2)
												<?//圖片?>
														@if(  !empty($row14->image) AND File::exists( public_path().$row14->image)  )
															<a href="{{$row14->url}}"   target="_new" >
																<img src="/public{{$row14->image}}" />
															</a>
														@else
															<img src="/images/798x422.jpg"  />
														@endif

												@elseif($row14->is_video==1)
													<?//影片?>
															<div class="slideVideo">
																<video width="100%"
																@if(!empty($row14->poster))
																		poster="/public/videos/{{$row14->poster}}"
																@endif
																 controls  >
																		<source src="{{"/public/videos/".$row14->video}}" type="video/mp4">
																</video>
																<img id="videoBG" src="/images/index/play.png">
															</div>
												@else

														@if(  !empty($row14->image) AND File::exists( public_path().$row14->image)  )
															<a href="{{$row14->url}}"   target="_new" >
																<img src="/public{{$row14->image}}" />
															</a>
														@else
															<img src="/images/798x422.jpg"  />
														@endif

												@endif
											</li>
										<?php endforeach; ?>



                </ul>
            </div>

            <div class="viewmore" style="display:none;" ><img src="images/index/viewmore.png" style="display:none;"></div>
        </div>

				@include("frontend.comm.row-marquee",array("m"=>"m" , "c_sql"=>$ad_8))

    </div>

    @include("frontend.comm.middle")

    <div id="news">
        <div class="content clearfix">
            <img src="images/index/news_bg2.jpg">
            <p class="summary">
                <span class="EN">NEWS</span>
                <span class="CH"> / 地產動態  </span>
								<br>
								<span class="summaryTitle" > {{$one_news->name}}</span>
                <span class="text">{{ms_str($one_news->content,300)}}</span>
                <a href="/news2/{{$one_news->id}}?color=green"><span class="link">MORE</span></a>
            </p>
            <div>



							@if( !empty($one_news->image) AND File::exists(public_path().$one_news->image) )
								<img src="/public{{$one_news->image}}">
							@else
								<img src="images/index/news1.jpg">
							@endif



            </div>
        </div>
    </div>


		@include("frontend.comm.row-marquee",array("m"=>"m2" , "c_sql"=>$ad_8))

    <div id="case">
        <div class="select">
            <img class="left" src="images/index/case_arrowL.png">
            <img class="right" src="images/index/case_arrowR.png">
            <div class="slick4">
                		<div class="area" id="" >
											<a href="/case">
												<p>全部區域</p><p>ALL</p>
											</a>
										</div>

										@foreach($areas as $area)
										<div class="area" id="{{$area->id}}">
												<a href="/case?taiwanArea={{$area->id}}">
													<p>{{$area->name}}</p>
													<p>{{$area->title}}</p>
												</a>
										</div>
										@endforeach




            </div>
        </div>

        <div class="slick">


						@foreach($rate_ads as $rate_ad)
            <div class="slick2">
								<?php
									$r_img = getRateImage($rate_ad->id,'noAd');
								?>
								@if(  !empty($r_img->image) AND File::exists( public_path().$r_img->image)  )
                	<img src="/public{{$r_img->image}}"  >
								@else

								@endif

		                <div class="detail">
		                    	<img src="images/index/case_close.png">

														{{$rate_ad->name}}

			                    	{{rate_info($rate_ad)}}

		                </div>

            </div>
						@endforeach





        </div>

        <button id="prev"></button>
        <button id="next"></button>

        <p class="summary">
            <span class="EN">CASE</span>
            <span class="CH"> /新案訊息</span>
            <a href="/case"><span class="link">MORE</span></a>
        </p>
    </div>


		@include("frontend.comm.row-marquee",array("m"=>"m3" , "c_sql"=>$ad_8))

		<section id="deco">
        <div class="flexslider fs1">
            <ul class="slides">

								@foreach($deco_ads as $deco)
		                <li>
												@if(  !empty($deco->image) AND File::exists( public_path().$deco->image)  )
													<img src="/public{{$deco->image}}" />
												@else
		                    	<img src="images/index/deco1.jpg" />
												@endif
		                    <p class="summary">
		                        <span class="EN">DECO</span>
		                        <span class="CH"> / 生活美學 </span>
														<br>
														<span class="summaryTitle" >  {{$deco->name}}</span>
		                        <span class="text">{{ms_str($deco->content,300)}}</span>
		                        <a href="/deco2/{{$deco->id}}"><span class="link">MORE</span></a>
		                    </p>
		                </li>
								@endforeach
            </ul>
        </div>
        <!-- <p class="summary">
            <span class="EN">DECO</span>
            <span class="CH"> / 生活美學</span>
            <span class="text">ETABS是由CSI公司開發研製的房屋建築結構分析與設計軟體，ETABS已有近三十年的發展歷史....</span>
            <a href="deco.html"><span class="link">MORE</span></a>
        </p> -->
    </section>

  <section class="row-ad">
									<?php
									$ad23_get = AD::where("category_id",23)->orderByRaw("RAND()")->take(3)->get();

									// $ad23_1 = AD::where("category_id",23)->orderByRaw("RAND()")->first();
									?>
									@if(  !empty($ad23_get[0]->image) AND File::exists( public_path().$ad23_get[0]->image)  )
											<a href="{{$ad23_get[0]->url}}" target="_new">
		                    <img src="/public{{$ad23_get[0]->image}}"   />
											</a>
									@endif
		</section>

    <section id="people" class="clearfix">
        <p class="summary">
            <span class="EN">PEOPLE</span>
            <span class="CH"> / 人物觀點   </span>
						<br>
						<span class="summaryTitle" > {{$people->name}}</span>
            <span class="text">
							<?php
							// $pd=explode("<p>",$people->content);
							// $pd=explode("</p>",$pd[1]);
							// echo $pd[0];
							echo ms_str($people->content);
							?>
						</span>
            <a href="/people2/{{$people->id}}"><span class="link">MORE</span></a>
        </p>

        <div >
						@if(  !empty($people->image) AND File::exists( public_path().$people->image)  )
            	<img src="/public{{$people->image}}">
						@endif



        </div>
    </section>

		<section class="row-ad">
								<?php
								// $ad23_2 = AD::where("category_id",23)->orderByRaw("RAND()")->first();
								?>
								@if(  !empty($ad23_get[1]->image) AND File::exists( public_path().$ad23_get[1]->image)  )
									<a href="{{$ad23_get[1]->url}}"  target="_new" >
                  		<img src="/public{{$ad23_get[1]->image}}"/>
									</a>
								@endif
			</section>


		<div id="about" class="clearfix">

        <div>
			@if(  !empty($about->image) AND File::exists( public_path().$about->image)  )
			<img src="/public{{$about->image}}">
			@endif
		</div>
        <p class="summary">
            <span class="EN">ABOUT US</span>
            <span class="CH"> / 關於米築</span>
            <span class="text">{{ms_str($about->content,400)}}</span>
            <a href="/about"><span class="link">MORE</span></a>
        </p>
    </div>

    @include("frontend.comm.footer")

</div>


<script type="text/javascript">
$("document").ready(function(){

	if ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    // alert("使用行動裝置!");
		$("#videoBG").hide();
	}else {
    // alert("使用桌上型裝置!");
	}
		// $(".area").click(function(){
		//
		// 		if(  $(this).attr("id") != "undefined" ){
		//
		// 				// alert( $(this).attr("id") );
		// 		}
		//
		// });
});

</script>

 


<script>
  (function() {
    var cx = '014562598121488912658:8rjjoh_ab8q';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>


</body>
</html>
