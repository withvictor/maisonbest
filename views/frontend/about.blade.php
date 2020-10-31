<!DOCTYPE html>
<html prefix='og: http://ogp.me/ns#'>
<head>
	<meta charset="UTF-8">
	<title>關於米築 | 米築</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="米築取自於法文的「Maison」，做為名詞為「家」之意，當成形容詞則是「獨門的」，所以我們將兩者合一，並以時尚、質感為主軸，建構全台灣最獨特的房地產網站─米築株式會社。"></meta>
	<link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/css/default.css">
    <link rel="stylesheet" type="text/css" href="/css/about.css">
		<meta property="fb:app_id" content="1325670327461704" />
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
<div id="container">
	@include("frontend.comm.top")

    @include("frontend.comm.top_ad",array("sql_data"=>$ad_26))

    <img id="toTop" src="images/toTop.png">



		<div id="main" class="clearfix">
        <section>
            <p>ABOUT US</p>
            <span>關於米築</span>


        </section>
				{{$post->content}}


    </div>

   @include("frontend.comm.footer")
</div>
</body>
</html>
