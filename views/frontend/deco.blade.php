<!DOCTYPE html>
<html prefix='og: http://ogp.me/ns#'>
<head>
 <meta charset="UTF-8">
 <title>生活美學 | 米築</title>

 <link rel="shortcut icon" href="/favicon.ico">
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="stylesheet" type="text/css" href="/css/default.css">
		<link rel="stylesheet" type="text/css" href="/css/news.css">
		<link rel="stylesheet" type="text/css" href="/css/deco.css">

		<script src="/js/jquery.js"></script>
    <script src="/js/jquery.flexslider-min.js"></script>
		<script src="/js/Crawler.js"></script>
		<script src="http://malsup.github.com/jquery.cycle2.js"></script>

		<script src="/js/script.js"></script>


    <script type="text/javascript">
            $(window).load(function(){
                $(".center p").each(function(i){
                    var p = $(".center p:eq("+ i +")");
                    if( p.text().length > 6 ){
                        p.css("border","none");
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

		@include("frontend.comm.top_ad",array("sql_data"=>$ad_22))
		<img id="toTop" src="/images/toTop.png">

		@include("frontend.comm.row-marquee",array("m"=>"m3" , "c_sql"=>$ad_8))

		<div id="main" class="clearfix">
				<section>
						<p style="font-weight: bold;font-size: 18px;line-height: 50px;">DECO</p>
						<h1><span>生活美學</span></h1>

						<div class="deco_list">
								<?php

                $deco_type=array();

                foreach($decos as $deco_row){
                    $deco_type[]=$deco_row->id;
                }

                $type_decos=Deco::groupBy("type")->take(6)->get();
                // echo $type;
                ?>
                  @foreach($type_decos as $type_row)



                            <a href="/deco?type={{$type_row->type}}"
                              @if(!empty($type_row->type) AND ($type_row->type==$type) )
                               class="thisPage"
                              @endif
                              style="display:none;"
                              >
          										    {{$type_row->type}}
                            </a>


                  @endforeach
                            <a href="/deco?type=風格店鋪">
                                  風格店鋪
                            </a>
                            <a href="/deco?type=裝潢設計">
                                  裝潢設計
                            </a>  
                
                            <a href="/deco?type=藝文專欄">
                                  藝文專欄
                            </a>

                             
                            <a href="/deco?type=建材百科">
                                  建材百科
                            </a>
                            


                               
						</div>

				</section>


        @include("frontend.comm.straight")
				<?php
				$backgound_pics = array(1=>"/images/deco/1.jpg",
																2=>"/images/deco/2.jpg",
																3=>"/images/deco/3.jpg",
																4=>"/images/deco/4.jpg",
																5=>"/images/deco/5.jpg");
				$i=1;
				?>
				<article>

					<div class="ad">
            <?php

            ?>
						@foreach($decos as $deco)
						<div class="deco">
                @if(  !empty($deco->image) AND File::exists( public_path().$deco->image)  )
                  <img src="/public{{$deco->image}}" />
                @else
                  <img src="{{$backgound_pics[$i]}}">
                @endif

								<div class="center c<?php echo ($i%2)+1;?>">
										<p>{{$deco->name}}</p>
										<a href="/deco2/{{$deco->id}}"><span>MORE</span></a>
								</div>
						</div>
						<?php $i++;?>
						@endforeach



            @include("frontend.comm.straight_mobile")

						<p id="page">

              @if(!empty($type))
    					     <?php echo with(new CustomPresenter($decos->appends(array('type' => $type)) ))->render(); ?>
    					@else
    					     <?php echo with(new CustomPresenter($decos))->render(); ?>
    					@endif

						</p>
				</article>
		</div>

		@include("frontend.comm.footer")
    <style media="screen">
      .sel{
        background-color: rgb(54,46,43);
        margin: 30px 10px 0;
        padding: 5px 15px;
        color: #FFF;
        cursor: pointer;
      }
    </style>
</div>
<script type="text/javascript">
  ga('set', 'contentGroup1', '生活美學');        

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
