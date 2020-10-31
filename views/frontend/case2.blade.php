<!DOCTYPE html>
<html prefix='og: http://ogp.me/ns#'>
<head>

	<meta charset="UTF-8">
	<title>{{$case->title}} | 新案訊息 | 米築</title>
	@include("fb_code")
	<link rel="shortcut icon" href="/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta property="og:title"  content="{{$case->fb_title}}"></meta>
	<meta property="og:type"   content="房屋"></meta>
	<meta property="fb:app_id" content="1325670327461704" /></meta>
	<meta name="description" content="{{$case->title}},{{ms_str($case->content,200)}}" />

	<meta name="title" content="{{$case->title}}" />
	<meta property="og:url" content="{{Request::url()}}" /></meta>
	<meta property="og:site_name" content="米築"></meta>
	<meta property="og:description" content="{{ms_str($case->content,200)}}"></meta>



	<?php
	// try {
	// 				$rate_pics=DB::table("rate_pics")
	// 												->where('rate_id',$case->id)
	// 												->whereIn('name',array("setGoogle","setList","setFB"));
	//
	// 			if($rate_pics->count()>0){
	//
	// 				foreach($rate_pics->get() as $pic){
	// 						if( !empty($pic->image) AND File::exists(public_path().$pic->image) ){
	// 								echo '<meta property="og:image" content="http://www.maisonbest.com.tw/public'.$pic->image.'" /></meta>';
	// 						}
	// 				}
	//
	// 			}else{
	// 					echo '<meta property="og:image" content="http://www.maisonbest.com.tw/images/index/logo.jpg" /></meta>';
	// 			}
	// 			// echo "</div>";
	// } catch (Exception $e) {
	// 		echo '<meta property="og:image" content="http://www.maisonbest.com.tw/images/index/logo.jpg" /></meta>';
	//
	// }

	?>


	<?php
		$r_img = getRateImageType($case->id,'setFB');
	?>
	@if(  !empty($r_img->image) AND File::exists( public_path().$r_img->image)  )
		<meta property="og:image" content="http://www.maisonbest.com.tw/public{{$r_img->image}}" /></meta>
	@else
		<meta property="og:image" content="http://www.maisonbest.com.tw/images/index/logo.jpg" /></meta>

	@endif


	<link href="/css/jquery-ui.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/css/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="/css/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/css/default.css">
    <link rel="stylesheet" type="text/css" href="/css/case.css">
    <link rel="stylesheet" type="text/css" href="/css/case2.css">

    <script src="/js/jquery.js"></script>
		<script src="/js/jquery.flexslider-min.js"></script>
    <script src="/js/slick.min.js"></script>
    <script src="/js/Crawler.js"></script>
		<script src="http://malsup.github.com/jquery.cycle2.js"></script>
    <script src="/js/script.js"></script>

		<script src="/js/jquery.tinyMap.js"></script>


		<script type="text/javascript">
				$(window).load(function() {

					$('.fs1').flexslider({
					   // start: function(){
					   //  if( $('.fs1:eq(0) li:eq(1)').has("video").length ){
					   //   $('.fs1:eq(0) li:eq(1) video').get(0).pause();
					   //  }
					   // },
					   animation: "slide",
					   slideshowSpeed: 3500,
					   smoothHeight: true,
					   after: function(){
					    var video = $('.fs1 .flex-active-slide');

					    if( video.has("video").length ){
					     $('.fs1 .slideVideo').each(function(){
					      $(this).get(0).pause();
					     });
					     if( video.find("video").get(0).currentTime != 0 ){
					      video.find("video").get(0).play();
					     }
					    }
					    else{
					     $('.fs1 .slideVideo').each(function(){
					      $(this).get(0).pause();
					     });
					    }
					   }
					  });
					  // $('.fs1').flexslider("stop");

					  // FullScreen
					  var fulls;
					  $('.fs1 video , #videoBG').click(function(){
							var h = $(".fs1 .flex-viewport").height();
							var vid = $(this).parent().find("video").get(0);
					  //  var vid = $('.fs1 video').get(0);

						 if (vid.requestFullscreen) {

					        vid.requestFullscreen();
									exitFull(h);
									$("#videoBG").css("opacity",0);
									vid.play();

					      } else if (vid.mozRequestFullScreen) {

					        vid.mozRequestFullScreen();
									exitFull(h);
									$("#videoBG").css("opacity",0);
									vid.play();

					      } else if (vid.webkitRequestFullscreen) {

					        vid.webkitRequestFullscreen();
									exitFull(h);
									$("#videoBG").css("opacity",0);
									vid.play();

					      }

					  });


					function exitFull(h){
		   			$(".fs1 .flex-viewport").height(h);
		  		}

				  // if hover .fs1
				  $(".fs1").hover(function(){
				   $('.fs1').flexslider("pause");
				  },function(){
				   $('.fs1').flexslider("play");
				  });

					// $('.fs1').flexslider("stop");

				});

		function loadMap(){
		  var map 	=  $('.wmap');

		  map.tinyMap({
		    'center':  ['{{$case->latitude}}','{{$case->longitude}}'],
		    'zoom': 13,
				'infoWindowAutoClose':true,
				'scrollwheel': false,
		    'marker': [
		          {
		            'addr'          :['{{$case->latitude}}','{{$case->longitude}}'],

		            'icon'          : createMarkerIcon('{{$case->title}}'),
		            'newLabelCSS'   : 'labels',
		            'ignore'        : true,
		            'text'          :    '<table><tr><td>'+
																					<?php
																						$o_img = getRateImageType($case->id,'setGoogle');
																					?>
																					@if(  !empty($o_img->image) AND File::exists( public_path().$o_img->image)  )
																						'<img src="/public{{$o_img->image}}"    >'+
																					@endif
																			'</td><td> '+

																					' {{$case->googleTitle}}<br>'+
																					' {{$case->googleContent}}<br>'+

																			'</td></tr></table>'

		          },
							@foreach($cases as $o_case)
								{
									'addr'          : ['{{$o_case->latitude}}','{{$o_case->longitude}}'],

									'icon'          : createMarkerIcon('{{$o_case->title}}'),
									'newLabelCSS'   : 'labels',
									'ignore'        : true,
									'text'          : '<table><tr><td>'+
																				<?php
																					$r_img = getRateImageType($o_case->id,'setGoogle');
																				?>
																				@if(  !empty($r_img->image) AND File::exists( public_path().$r_img->image)  )
												                	'<img src="/public{{$r_img->image}}"    >'+
																				@endif
																			 '</td><td>'+
																					 '{{$o_case->googleTitle}} <br>'+
																					 ' {{$o_case->googleContent}} '+
																			 '<ul></td></tr></table>'

								},
							@endforeach

		    ] ,
		});
		}

		$("document").ready(function(){

			$.fn.tinyMapConfigure({
			    // Google Maps API URL
			    'api': '//maps.googleapis.com/maps/api/js',
			    // Google Maps API Version
			    'v': '3.21',
			    // Google Maps API Key，預設 null
			    'key': 'AIzaSyAd1MVcmyAZVp9PmtbRFuHlAqrRjSB-vPU',
			    // 使用的地圖語言
			    'language': 'zh‐TW'
			});
		        loadMap();
		});



		</script>
		<script src="/js/cases.js"></script>
		<style type="text/css">
		  #map-canvas { height: 100%; margin: 0; padding: 0;}


			.wmap {
				width: 100%; height: 500px;
			}

			@media (max-width: 480px) {


				.wmap {
			    height: 250px;
			  }
			}
		</style>
</head>
	@include("ba")
<body>
@include("ga_code")




<div id="container">


	<div class="WtfMap"></div>
	@include("frontend.comm.top")

    @include("frontend.comm.top_ad",array("sql_data"=>$ad_12))

    <img id="toTop" src="/images/toTop.png">
		@include("frontend.comm.row-marquee",array("m"=>"m3" , "c_sql"=>$ad_8))



		<div class="mainPic">
        <div class="flex">
            <div class="flexslider fs1">
                <ul class="slides">

										{{$case->title}}
										<?php
							      $rate_pics=DB::table("rate_pics")
																		->where('rate_id',$case->id)
																		->whereNotIn('name',array("setGoogle","setList","setShow","setFB"))
																		->take(6)
																		->get();
							      ?>


										@if(strlen($case->video) > 3)
												<li  >
														<video 	class="slideVideo"
														@if(!empty($case->poster))
															poster="{{"/public/videos/".$case->poster}}"
														@endif
														 width="100%" controls >
																<source src="{{"/public/videos/".$case->video}}" type="video/mp4" >
														</video>

														<img id="videoBG" src="/images/index/play.png">

												</li>
										@endif

							      @foreach($rate_pics as $pic)
												@if( !empty($pic->image) AND File::exists(public_path().$pic->image) )
				                    <li>
				                        <img src="/public{{$pic->image}}" />
				                    </li>
												@endif
										@endforeach







                </ul>
            </div>
        </div>
    </div>






    <div id="main">

        <span id="Name">{{$case->title}}</span>

        <p id="subTitle">
					<span>{{$case->sub}}</span>


					<span class="clearfix">
					@if($case->videoLink)
						<a href="{{$case->videoLink}}" target="_new" >
								<img src="/images/case/icon4.png">
						</a>
					@endif

					@if($case->vr360Link)
						<a href="http://maisonbest.com.tw/360/{{$case->vr360Link}}"  target="_new" >
							<img src="/images/case/icon3.png">
						</a>
					@endif

					<a href="javascript: void(window.open('http://www.facebook.com/share.php?u='.concat(encodeURIComponent(location.href)) ));"  target="_new" >
							<img src="/images/case/icon2.png">
					</a>

					<a href="http://line.naver.jp/R/msg/text/?{{$case->title}}%0D%0A{{Request::url()}}" rel="nofollow" >
						<img src="/images/case/icon1.png"   alt="用LINE傳送"   />
					</a>

					 

					@if($case->lineLink)
						<a href="{{$case->lineLink}}"  target="_new" >
							<img src="/images/case/icon1.png">
						</a>
					@endif
					</span>

				</p>

						<div id="intro" style="">
					{{$case->content}}
						</div>


		<p></p>

        <div id="info" class="clearfix">
            <p>本案資訊</p>
            <ul>
            		@if($case->investment)
                		<li>建設：{{$case->investment}}</li>
                @endif

                @if($case->baseArea)
                		<li>基地面積：{{$case->baseArea}}</li>
                @endif

                @if($case->floor)
                		<li>	樓層：{{$case->floor}}</li>
                @endif
                @if($case->households)
                		<li>戶數：{{$case->households}}</li>
                @endif

                @if($case->floorNumber)
                		<li>坪數：{{$case->floorNumber}}</li>
                @endif
                @if($case->pattern)
                		<li>格局：{{$case->pattern}}</li>
				@endif
            </ul>
            <ul>
            		@if($case->postulate)
                		<li>公設比：{{$case->postulate}}</li>
                @endif

                @if($case->one_price)
                		<li>單價：{{$case->one_price}}</li>
                @endif

                @if($case->total_price)
										<span class="price" style="display:none;">
											<span class="current_price">{{$case->total_price}}</span>
											<div class="as-price as-purchaseinfo-price">
							            <span>
							                    <meta content="{{$case->total_price}}">
							            </span>
							            <span class="as-price-currentprice">
							                    {{$case->total_price}}
							            </span>
							        </div>
										</span>

                		<li class="price">總價：{{$case->total_price}}</li>

                @endif

                @if($case->base_address)
                		<li>基地位置：{{$case->base_address}}</li>
                @endif

                @if($case->reception)
                		<li>接待中心：{{$case->reception}}</li>
                @endif

                @if($case->tel)
                		<li>洽詢電話：

<a href="tel:{{$case->tel}}" style="color:blue">{{$case->tel}}</a>

                        </li>
                @endif

				@if($case->url && strlen($case->url)>6 )
                		<li>建案網址：
						<a href="{{$case->url}}" target="_blank">{{$case->url}}</a>
						
						</li>
                @endif

                @if($case->lineLinkOrg)
					<li>Line官方建案帳號：
						<a href="{{$case->lineLinkOrg}}" target="_blank" style="color:blue;">{{$case->lineLinkOrg}}</a>
						
					</li>
				@endif

				@if($case->data_from)
					<li>資料來源：
						{{$case->data_from}}						
					</li>
				@endif
            </ul>
            <div>
							<?php
								$s_img = getRateImageType($case->id,'setShow');
							?>
							@if(  !empty($s_img->image) AND File::exists( public_path().$s_img->image)  )
								<img src="/public{{$s_img->image}}"     >
							@else
								<img src="/images/case/c1.jpg">
							@endif

						</div>
        </div>

    </div>


    @if($case->date_to_house==1)
    	<?php echo View::make('frontend.report',array('case'=>$case ,'errors'=>$errors) ) ?>
    @endif

    <section id="map">



			<div class="googlemap">
				<img src="/images/case/map.jpg">
				<iframe width="400" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src=http://maps.google.com.tw/maps?f=q&hl=zh-TW&geocode=&q={{$case->latitude}},{{$case->longitude}}&z=13&output=embed></iframe>
				<img src="/images/case/map.jpg">
			</div>


        <div class="select">
            <img class="left" src="/images/index/case_arrowL.png">
            <img class="right" src="/images/index/case_arrowR.png">
            <div class="slick3">
                <div class="area"><a href="/case"><p>全部區域</p><p>ALL</p></a></div>


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
    </section>

    <aside class="clearfix">

				@foreach($cases as $sub_case)
        <div class="case">
            <div class="casePic">
								<a href="/case2/{{$sub_case->id}}">
									<?php
										$r_img = getRateImageType($sub_case->id,'setList');
									?>
									@if(  !empty($r_img->image) AND File::exists( public_path().$r_img->image)  )
	                						<img src="/public{{$r_img->image}}"  >
									@else
										<img src="/images/case/case1.jpg"  >
									@endif



								</a>
						</div>
        </div>
				@endforeach



        <p id="page">

					@if($taiwanArea)
					<?php echo with(new CustomPresenter($cases->appends(array('taiwanArea' => $taiwanArea)) ))->render(); ?>
					@else
					<?php echo with(new CustomPresenter($cases))->render(); ?>
					@endif
				</p>
    </aside>

    @include("frontend.comm.footer")
</div>



<script type="text/javascript">
		$("document").ready(function(){
				$(".area").click(function(){
					location.href="?taiwanArea="+$(this).attr("id");
				});

				if ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
			    // alert("使用行動裝置!");
					$("#videoBG").hide();
				}


				// var _name    = $("input#name");

				// $("#submit").on('click',function(){
				// 	alert(_name.val);
				// });


		});
</script>




<?php
	$r_img = getRateImageType($case->id,'setFB');
	// $case->total_price
?>




<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type" : "Product",
  "name" : "{{$case->title}}",
  "logo" : "http://www.maisonbest.com.tw/images/index/logo.jpg",  
  "url" : "{{Request::url()}}",
  "image" : "@if(  !empty($r_img->image) AND File::exists( public_path().$r_img->image)  )http://www.maisonbest.com.tw/public{{$r_img->image}}@endif",
  	
  	"description" : "{{ms_str($case->content,200)}}",		 
	"offers": {
        "@type": "http://schema.org/AggregateOffer",
        "priceCurrency": "NTD",
        "highPrice": "150000",
        "lowPrice": "350000"
    }
  	 
}
</script>


<style media="screen">
#videoBG{
	position: absolute;
	top: 39%; left: 50%;
	transform: translateX(-50%);
	-webkit-transform: translateX(-50%);
	width: auto; height: 25%;
}
.fs1 .slides li{
	position: relative;
}
.fs1 .slideVideo{
	cursor: pointer;
}
.fs1 video{
	width: 100%;
	height: auto;
}
</style>

<script src="/js/jquery-ui.js"></script>

<script type="text/javascript">
		$( "#dialog" ).dialog({
		autoOpen: false,
		width: 1000,
		buttons: [
		{
			text: "Ok",
			click: function() {
				// $("#statement_check").prop('checked', true);
				$( this ).dialog( "close" );
			}
		},
		{
			text: "Cancel",
			click: function() {
				$( this ).dialog( "close" );
			}
		}
	]
});

// Link to open the dialog
$( "#dialog-link" ).click(function( event ) {
	$( "#dialog" ).dialog( "open" );
	event.preventDefault();
});
</script>

<style>

	.demoHeaders {
		margin-top: 2em;
	}
	#dialog-link {
		padding: .4em 1em .4em 20px;
		text-decoration: none;
		position: relative;
	}
	#dialog-link span.ui-icon {
		margin: 0 5px 0 0;
		position: absolute;
		left: .2em;
		top: 50%;
		margin-top: -8px;
	}
	#icons {
		margin: 0;
		padding: 0;
	}
	#icons li {
		margin: 2px;
		position: relative;
		padding: 4px 0;
		cursor: pointer;
		float: left;
		list-style: none;
	}
	#icons span.ui-icon {
		float: left;
		margin: 0 4px;
	}
	.fakewindowcontain .ui-widget-overlay {
		position: absolute;
