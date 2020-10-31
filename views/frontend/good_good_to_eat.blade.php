<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>京都</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="/c/css/jquery.fullpage.css">
	<link rel="stylesheet" type="text/css" href="/c/css/slick.css">
	<link rel="stylesheet" type="text/css" href="/c/css/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="/c/css/index.css">

	<script src="/c/js/jquery-1.12.4.min.js"></script>
	<script src="/c/js/jquery.fullpage.min.js"></script>
	<script src="/c/js/ofi.browser.js"></script>
	<script src="/c/js/slick.min.js"></script>
</head>
<body>
@include("ga_code")
	<nav>
		<img id="menu" src="/c/img/menu.jpg">

		<ul class="clearfix">

				@foreach($rate_categories as $cate)
						<li><img src="/c/img/1/1.jpg"><p>{{$cate->name}}</p></li>
				@endforeach

		</ul>
	</nav>

	<div id="container">
		<div id="fullpage">
			<div class="section s0">
				<img class="main" src="/images/index/logo.png">

				<section class="slick">
					<div><img src="/c/img/1.jpg"></div>
					<div><img src="/c/img/2.jpg"></div>
					<div><img src="/c/img/3.jpg"></div>
				</section>
			</div>

			<!-- 京都府 -->
			@foreach($rates as $rate)
			<div class="section type{{$rate->taiwanArea-13}} right">

				<?php
					$r_img = getRateImageType($rate->id,'setList');
				?>
				@if(  !empty($r_img->image) AND File::exists( public_path().$r_img->image)  )
					<img src="/public{{$r_img->image}}"  >
				@else
					<img src="/c/img/1/1.jpg">
				@endif

				<div class="text right">
					<p>{{$rate->investment}}</p>
					<p>{{$rate->baseArea}}</p>
					<p>{{$rate->pattern}}</p>
				</div>

			</div>
			@endforeach




		</div>
	</div>

	<div id="toTop"><img src="/c/img/toTop.png"></div>

	<script type="text/javascript">
	$(document).ready(function(){
		$("#fullpage").fullpage({
			afterLoad: function(){
				$(this).find(".text").addClass("on");
			},
			onLeave: function(){
				$(this).find(".text").removeClass("on");
			}
		});

		$(".slick").slick({
			autoplay: true,
			fade: true,
			speed: 2000,
			draggable: false
		});

		objectFitImages("nav li img , .section img", {watchMQ: true});


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
			$.fn.fullpage.silentMoveTo( sum+1 );
			$("nav ul").fadeToggle();
		});

		$("#toTop").on('click', function(){
			$.fn.fullpage.moveTo(1);
		});
	});
	</script>
</body>
</html>
