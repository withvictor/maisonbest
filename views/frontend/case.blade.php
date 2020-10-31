<!DOCTYPE html>
<html prefix='og: http://ogp.me/ns#'>
<head>
	<meta charset="UTF-8">
	<title>新案資訊 | 米築</title>

	<link rel="shortcut icon" href="/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	@if($cases->count()!=0)
		<meta property="og:title" content="{{$cases[0]->title}}"></meta>
		<meta property="og:type" content="房屋"></meta>
		<meta property="fb:app_id" content="1325670327461704" />
		<meta property="og:url" content="{{Request::url()}}"></meta>
		<meta property="og:site_name" content="米築"></meta>

		<meta property="og:description" content="{{ms_str($cases[0]->content,200)}}"></meta>
		<?php
			$o_img = getRateImageType($cases[0]->id,'setList');
		?>
		@if(  !empty($o_img->image) AND File::exists( public_path().$o_img->image)  )
			<meta property="og:image" src="/public{{$o_img->image}}"></meta>
		@endif
	@endif
	<meta name="description" content="最新預售屋、新成屋資訊、最完整的建案剖析，為您掌握一手房市訊息！"></meta>
	<link rel="stylesheet" type="text/css" href="/css/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="/css/slick/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="/css/default.css">
	<link rel="stylesheet" type="text/css" href="/css/case.css">

	<script src="/js/jquery.js"></script>
	<script src="/js/jquery.flexslider-min.js"></script>
	<script src="/js/slick.min.js"></script>
	<script src="/js/Crawler.js"></script>
	<script src="http://malsup.github.com/jquery.cycle2.js"></script>

	<script src="/js/script.js"></script>
	@include("fb_code")
</head>
	@include("ba")
<body>
	@include("ga_code")
<div id="container">
	@include("frontend.comm.top")

    @include("frontend.comm.top_ad",array("sql_data"=>$ad_12))
    <img id="toTop" src="images/toTop.png">

		@include("frontend.comm.row-marquee",array("m"=>"m3" , "c_sql"=>$ad_8))

    <section id="map">
        <p>CASE</p>
        <h1><span>新案訊息</span></h1>

        <div class="googlemap">

            <!--
						<img src="images/case/map.jpg">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.596754221171!2d121.51487121540943!3d25.047755343893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a9727e338539%3A0xfbb9a2495d822933!2sTaipei+Railway+Station!5e0!3m2!1sja!2sjp!4v1459411689656" frameborder="0" style="border:0" allowfullscreen></iframe>
						 -->
            <img src="images/case/map.jpg">
        </div>

        <div class="select">
            <img class="left" src="images/index/case_arrowL.png">
            <img class="right" src="images/index/case_arrowR.png">
            <div class="slick3">
                <div class="area" id="all" ><a href="/case"><p>全部區域</p><p>ALL</p></a></div>

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

    <article>
			<?php
				$i=0;
				$ad12_1 = AD::where("category_id",23)->orderByRaw("RAND()")->take(4)->get();
			?>
			@foreach($ad12_1 as $ad12)
			<?php
			$i++;
			// if($i>=3){
			?>

						@if(  !empty($ad12->image) AND File::exists( public_path().$ad12->image)  )
						<a href="{{$ad12->url}}" target="_new">
        					<img src="/public{{$ad12->image}}" >
						</a>
						@endif
			<?php
		// }
			?>
			@endforeach
    </article>






    <aside class="clearfix">
			@if($cases->count()!=0)

				@foreach($cases as $case)
        <div class="case">
            <div class="casePic">
								<a href="/case2/{{$case->id}}"  >





									<?php
										$r_img = getRateImageType($case->id,'setList');
									?>
									@if(  !empty($r_img->image) AND File::exists( public_path().$r_img->image)  )
	                	<img src="/public{{$r_img->image}}"  >
									@else
										<img src="images/case/case1.jpg"  >
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
		@endif
    </aside>



    @include("frontend.comm.footer")
</div>


<script type="text/javascript">
		$("document").ready(function(){
				$(".area").click(function(){
					location.href="?taiwanArea="+$(this).attr("id");
				});
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
