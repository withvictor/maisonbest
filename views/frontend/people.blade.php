<!DOCTYPE html>
<html prefix='og: http://ogp.me/ns#'>
<head>
	<meta charset="UTF-8">
	@include("ba")
	<title>人物觀點 | 米築</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/css/default.css">
    <link rel="stylesheet" type="text/css" href="/css/news.css">
    <link rel="stylesheet" type="text/css" href="/css/people.css">
    <meta name="description" content="米築獨家人物專訪，舉凡建商大老、代銷大頭、建築師、設計師等，精彩人物故事，絕不能錯過！"></meta>

		<meta property="og:type" content="人物觀點"></meta>


		<meta property="fb:app_id" content="1325670327461704" />




		<meta property="og:site_name" content="米築"></meta>


    <script src="/js/jquery.js"></script>
		<script src="/js/jquery.flexslider-min.js"></script>
    <script src="/js/Crawler.js"></script>
		<script src="http://malsup.github.com/jquery.cycle2.js"></script>
    <script src="/js/script.js"></script>

    <script type="text/javascript">
        $(window).load(function(){
            $("#main section > div span:eq(0)").click(function(){
                $("html , body").animate({
                    "scrollTop": $(".people:eq(0)").offset().top -30
                })
            });

            $("#main section > div span:eq(1)").click(function(){
                $("html , body").animate({
                    "scrollTop": $(".people:eq(1)").offset().top -30
                })
            });

						$("#main section > div span:eq(2)").click(function(){
                $("html , body").animate({
                    "scrollTop": $(".people:eq(2)").offset().top -30
                })
            });

						$("#main section > div span:eq(3)").click(function(){
                $("html , body").animate({
                    "scrollTop": $(".people:eq(3)").offset().top -30
                })
            });

						$("#main section > div span:eq(4)").click(function(){
                $("html , body").animate({
                    "scrollTop": $(".people:eq(4)").offset().top -30
                })
            });

            $(window).scroll(function(){
                if( $(window).scrollTop() > $("#main").offset().top ){
                    $("#main aside").css("position","fixed");
                }
                else{
                    $("#main aside").css("position","absolute");
                }
            });
        });
    </script>
		@include("fb_code")
</head>
	@include("ba")
<body>
	@include("ga_code")
<div id="container">
	@include("frontend.comm.top")

    @include("frontend.comm.top_ad",array("sql_data"=>$ad_25))
    <img id="toTop" src="/images/toTop.png">

	@include("frontend.comm.row-marquee",array("m"=>"m3" , "c_sql"=>$ad_8))

    <div id="main" class="clearfix">
        <section>
            <p>PEOPLE</p>
            <span>人物觀點</span>

            <div>
							@foreach($peoples as $peoplfueck)
									<span>{{$peoplfueck->title}}</span>
							@endforeach
						</div>

        </section>



        <article>
					<?php
					$i=1;
					?>
						@foreach($peoples as $people)
							<?php
							$i++;
							?>
								@if( $i % 2 == 0)

				            <div class="people">

											@if( !empty($people->image) AND File::exists(public_path().$people->image) )
												<img src="/public{{$people->image}}">
											@endif




				                <div class="name"><p>-{{$people->title}}-</p><span>{{$people->name}}</span></div>
				                <p>{{ms_str($people->content,200) }}</p>
				            </div>

				            <div class="link">
				                <a href="/people2/{{$people->id}}"><span>MORE</span></a>
				                <img src="/images/people/b2.png">
				            </div>


									@else


				            <div class="people">
											@if( !empty($people->image) AND File::exists(public_path().$people->image) )
												<img src="/public{{$people->image}}">
											@endif

				                <div class="name"><p>-  {{$people->title}} -</p><span>{{$people->name}}</span></div>
				                <p>{{ms_str($people->content,200)}}</p>
				            </div>

										<div class="link">
				                <a href="/people2/{{$people->id}}"><span>MORE</span></a>
				                <img src="/images/people/b1.png">
				            </div>
								@endif
						@endforeach

            <p id="page">
							<?php echo with(new CustomPresenter($peoples))->render(); ?>
						</p>


        </article>
    </div>

    @include("frontend.comm.footer")
</div>

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
