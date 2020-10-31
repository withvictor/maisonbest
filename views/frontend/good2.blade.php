<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>京都</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="/c/left/css/jquery.fullpage.css">
	<link rel="stylesheet" type="text/css" href="/c/left/css/slick.css">
	<link rel="stylesheet" type="text/css" href="/c/left/css/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="/c/left/css/index.css">

	<script src="/c/left/js/jquery-1.12.4.min.js"></script>
	<script src="/js/jquery.fullpage.min.js"></script>
	<script src="/c/left/js/ofi.browser.js"></script>
	<script src="/c/left/js/slick.min.js"></script>
	<script src="/c/left/js/screenfull.js"></script>
</head>
<body>
	@include("ga_code")
	<nav>
		<img src="/c/left/img/menu.jpg" id="menu">
		<a id="FS"></a>

		<ul class="clearfix">
			@foreach($rate_categories as $cate)
          		<li><img src="/c/img/1/{{($cate->id-13)%3+1}}.jpg"><p>{{$cate->name}}</p></li>
      		@endforeach
		</ul>
	</nav>
	<div id="container">
		<div id="fullpage">
			<div class="section">
				<div class="slide s0">
					<img class="main" src="/c/left/img/0.png">

					<section class="slick">
						<div><img src="/c/left/img/1.jpg"></div>
						<div><img src="/c/left/img/2.jpg"></div>
						<div><img src="/c/left/img/3.jpg"></div>
					</section>
				</div>

				<!-- 京都府 -->
				<div class="slide type1">
					<img src="/c/left/img/1/1.jpg">
					<div class="text">
						<p>京都市は</p>
						<p>京都府南部に位置する同府最大の市で</p>
						<p>府庁所在地である</p>
					</div>
				</div>

				@foreach($rates as $rate)
        <div class="slide type{{$rate->taiwanArea-13}}">
          <?php
  					$r_img = getRateImageType($rate->id,'setList');
  				?>
  				@if(  !empty($r_img->image) AND File::exists( public_path().$r_img->image)  )
  					<img src="/public{{$r_img->image}}"  >
  				@else
  					<img src="/c/img/1/1.jpg">
  				@endif

          @if(( (int)$rate->id % (rand(1,3)) ) ==1 )
            <div class="text right">
          @else
            <div class="text">
          @endif

  					<p>{{$rate->investment}}</p>
  					<p>{{$rate->baseArea}}</p>
  					<p>{{$rate->pattern}}</p>
            <p><img src="/images/logo.png" alt="" style="width:54px;height:54px;" /></p>

  				</div>


				</div>
        @endforeach

				<div class="slide type1">
					<img src="/c/left/img/1/2.jpg">
					<div class="text">
						<p>京都市は</p>
						<p>京都府南部に位置する同府最大の市で</p>
						<p>府庁所在地である</p>
					</div>
				</div>
				<div class="slide type1">
					<img src="/c/left/img/1/3.jpg">
					<div class="text">
						<p>京都市は</p>
						<p>京都府南部に位置する同府最大の市で</p>
						<p>府庁所在地である</p>
					</div>
				</div>

				<!-- 清水寺 -->
				<div class="slide type2">
					<img src="/c/left/img/2/1.jpg">
					<div class="text">
						<p>清水寺は法相宗（南都六宗の一）系の寺院で</p>
						<p>広隆寺、鞍馬寺とともに</p>
						<p>平安京遷都以前からの歴史をもつ</p>
						<p>京都では数少ない寺院の1つである</p>
					</div>
				</div>
				<div class="slide type2">
					<img src="/c/left/img/2/2.jpg">
					<div class="text">
						<p>清水寺は法相宗（南都六宗の一）系の寺院で</p>
						<p>広隆寺、鞍馬寺とともに</p>
						<p>平安京遷都以前からの歴史をもつ</p>
						<p>京都では数少ない寺院の1つである</p>
					</div>
				</div>
				<div class="slide type2">
					<img src="/c/left/img/2/3.jpg">
					<div class="text">
						<p>清水寺は法相宗（南都六宗の一）系の寺院で</p>
						<p>広隆寺、鞍馬寺とともに</p>
						<p>平安京遷都以前からの歴史をもつ</p>
						<p>京都では数少ない寺院の1つである</p>
					</div>
				</div>
				<div class="slide type2">
					<img src="/c/left/img/2/4.jpg">
					<div class="text">
						<p>清水寺は法相宗（南都六宗の一）系の寺院で</p>
						<p>広隆寺、鞍馬寺とともに</p>
						<p>平安京遷都以前からの歴史をもつ</p>
						<p>京都では数少ない寺院の1つである</p>
					</div>
				</div>
				<div class="slide type2">
					<img src="/c/left/img/2/5.jpg">
					<div class="text">
						<p>清水寺は法相宗（南都六宗の一）系の寺院で</p>
						<p>広隆寺、鞍馬寺とともに</p>
						<p>平安京遷都以前からの歴史をもつ</p>
						<p>京都では数少ない寺院の1つである</p>
					</div>
				</div>

				<!-- 金閣寺 -->
				<div class="slide type3">
					<img src="/c/left/img/3/1.jpg">
					<div class="text right">
						<p>建物の内外に金箔を貼った3層の楼閣建築である舎利殿は金閣</p>
						<p>舎利殿を含めた寺院全体は金閣寺として知られる</p>
					</div>
				</div>
				<div class="slide type3">
					<img src="/c/left/img/3/2.jpg">
					<div class="text right">
						<p>建物の内外に金箔を貼った3層の楼閣建築である舎利殿は金閣</p>
						<p>舎利殿を含めた寺院全体は金閣寺として知られる</p>
					</div>
				</div>
				<div class="slide type3">
					<img src="/c/left/img/3/3.jpg">
					<div class="text right">
						<p>建物の内外に金箔を貼った3層の楼閣建築である舎利殿は金閣</p>
						<p>舎利殿を含めた寺院全体は金閣寺として知られる</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="toTop"><img src="/c/left/img/toTop.png"></div>

	<script type="text/javascript">
	$(document).ready(function(){
		$("#fullpage").fullpage({
			resetSliders: true,
			afterSlideLoad: function(){
				$(this).find(".text").addClass("on");
			},
			onSlideLeave: function(){
				$(this).find(".text").removeClass("on");
			}
		});

		$(".slick").slick({
			autoplay: true,
			fade: true,
			speed: 2000,
			draggable: false
		});
		// $(".section").slick({
		// 	speed: 500,
		// 	arrows: false,
		// 	dots: false
		// }).on('afterChange', function(slick, currentSlide){
		// 	$(".slick-active").prev().find(".text").removeClass("on");
		// 	$(".slick-active").find(".text").addClass("on");
		// 	$(".slick-active").next().find(".text").removeClass("on");
		// });

		objectFitImages("nav li img , .slide img", {watchMQ: true});


		///////////////////////////////////////
		var allow = true;
		$("#menu").on('click', function(){
			$("nav ul").fadeToggle();

			allow = !allow;
			$.fn.fullpage.setAllowScrolling(allow);
		});
		$("nav li").on('click', function(){
			var item = $(this).index()+1, sum=1;
			for(var i=0; i < item; i++){
				sum += $(".type"+ i).length;
			}

			allow = true;
			$.fn.fullpage.setAllowScrolling(true);
			$.fn.fullpage.silentMoveTo( 0, sum );
			$("nav ul").fadeToggle();

			// $(".section").slick("slickGoTo", sum, true);
			// $("nav ul").fadeToggle();
		});

		$("#toTop").on('click', function(){
			$.fn.fullpage.moveTo(0,0);
			// $(".section").slick("slickGoTo", 0);
		});

		$("#FS").click(function(){
			if (screenfull.enabled) {
			    screenfull.toggle();
			}
		});
	});
	</script>
</body>
</html>
