<!DOCTYPE html>
<html prefix='og: http://ogp.me/ns#'>
<head>
	<meta charset="UTF-8">
	<title>地產動態 | 米築</title>

	<link rel="shortcut icon" href="/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" type="text/css" href="/css/default.css">
	<link rel="stylesheet" type="text/css" href="/css/news.css">
	<meta name="description" content="帶給您最新的房室第一手消息！" />
	<script src="/js/jquery.js"></script>
	<script src="/js/jquery.flexslider-min.js"></script>
	<script src="/js/Crawler.js"></script>
	<script src="http://malsup.github.com/jquery.cycle2.js"></script>

	<script src="/js/script.js"></script>


@include("fb_code")
</head>
	@include("ba")
<body>
@include("ga_code")
<?php

$titless=array("green","brown","yellow","wheat","pink",);
$bgs = array( "images/news/n1.jpg",
							"images/news/n2.jpg",
							"images/news/n3.jpg",
							"images/news/n4.jpg",
							"images/news/n5.jpg",
								);

?>
<div id="container">
	@include("frontend.comm.top")

    @include("frontend.comm.top_ad",array("sql_data"=>$ad_20))
    <img id="toTop" src="images/toTop.png">

  	@include("frontend.comm.row-marquee",array("m"=>"m3" , "c_sql"=>$ad_8))

    <div id="main" class="clearfix">
        <section>
            <p>NEWS</p>
            <span><h1 style="font-weight:normal;">地產動態</h1></span>
            <!-- <select>
                <option>2016</option>
            </select> -->

						<div class="deco_list">
								<?php

                $deco_type=array();



                $type_decos=Post::groupBy("cate")->orderBy("cate","desc")->get();
                // echo $type;
								$bgia=0;
                ?>
								<div class="news clearfix">
                  @foreach($type_decos as $type_row)

									<?php
									$bgia+=1;
									?>


                            <a  href="/news?cate={{$type_row->cate}}"
															style=""
															 >

          										    {{$type_row->cate}}

                            </a>




                  @endforeach
						</div>
						</div>
        </section>


        <article>
					<?php

					$bgi=0;
					?>

						@foreach($posts as $post)
            <div class="news clearfix">
                <div>
                    <span class="{{$titless[$bgi]}} title"></span><span>
											<?php
												// $dd=explode(" ",$post->created_at);
												// echo $dd[0];
												echo $post->date;
											?>
										</span>
                    <p class="{{$titless[$bgi]}} title">{{$post->name}}</p>
                    <p>{{ms_str_news($post->content,200) }}<a href="news2/{{$post->id}}?color={{$titless[$bgi]}}"><span>(繼續閱讀)</span></a></p>
                </div>

                <div class="newsPic">
                    <a href="/news2/{{$post->id}}?color={{$titless[$bgi]}}">



												@if( !empty($post->image) AND File::exists(public_path().$post->image) )
													<img src="/public{{$post->image}}">
												@else
													<img src="{{$bgs[$bgi]}}">
												@endif
													<img class="hover" src="images/news/hover.png">

                    </a>
                </div>
            </div>
						<?php $bgi++;?>
						@endforeach



            <p id="page">
        		@if($cate)
				<?php echo with(new CustomPresenter($posts->appends(array('cate' => $cate)) ))->render(); ?>
				@else
				<?php echo with(new CustomPresenter($posts))->render(); ?>
				@endif
								
			</p>
        </article>
    </div>

   @include("frontend.comm.footer")
</div>

<style media="screen">
	.news.clearfix a{
		margin: 0 5px;
		font-size: 18px;
		text-decoration: none;
		color: #000;
	}
</style>

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
</html