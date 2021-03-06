<!DOCTYPE html>
<html prefix='og: http://ogp.me/ns#'>
<head>
	<meta charset="UTF-8">

	<title>米築</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="/css/default.css">
    <link rel="stylesheet" type="text/css" href="/css/searcha.css">

    <script src="/js/jquery.js"></script>
    <script src="/js/script.js"></script>
		@include("fb_code")
</head>
	@include("ba")
<body>
@include("ga_code")
<div id="container">
	@include("frontend.comm.top")

    <img id="toTop" src="/images/toTop.png">
    <div class="wood"></div>

    <div id="main">
			@if($result_post)
					@foreach($result_post as $post)
		        <div class="result">
								<a href="/news2/{{$post->id}}?color=brown">
				            <span>地產動態-{{$post->name}}</span>
				            <img src="/images/search/tri.png">
				            <p>{{ms_str($post->content,500)}}(繼續閱讀)</p>
										<span>{{$post->created_at}}</span>
								</a>
		        </div>
					@endforeach
			@endif

			@if($result_people)
					@foreach($result_people as $people)
		        <div class="result">
								<a href="/people2/{{$people->id}}">
				            <span>人物觀點-{{$people->name}}</span>
				            <img src="/images/search/tri.png">
				            <p>{{ms_str($people->content,500)}}(繼續閱讀)</p>
										<span>{{$people->created_at}}</span>
								</a>
		        </div>
					@endforeach
			@endif


			@if($result_rate)
					@foreach($result_rate as $rate)
		        <div class="result">
								<a href="/case2/{{$rate->id}}">
				            <span>新案訊息-{{$rate->title}}</span>
				            <img src="/images/search/tri.png">
				            <p>{{ms_str($rate->content,500)}}(繼續閱讀)</p>
										<span>{{$rate->created_at}}</span>
								</a>
		        </div>
					@endforeach
			@endif

			@if($result_deco)
					@foreach($result_deco as $deco)
		        <div class="result">
								<a href="/deco2/{{$deco->id}}">
				            <span>生活美學-{{$deco->name}}</span>
				            <img src="/images/search/tri.png">
				            <p>{{ms_str($deco->content,500)}}(繼續閱讀)</p>
										<span>{{$deco->created_at}}</span>
								</a>
		        </div>
					@endforeach
			@endif



    </div>

    <footer>
        <div>
            <section>
                <a href="news"><img src="/images/news.png"></a>
                <a href="case"><img src="/images/case.png"></a>
                <a href="deco"><img src="/images/deco.png"></a>
                <a href="people"><img src="/images/people.png"></a>
                <a href="about"><img src="/images/about.png"></a>
            </section>
        </div>
        <section><img src="/images/footer.png"></section>
    </footer>

		<style media="screen">
		@charset "utf-8";

		#container{
			background-color: rgb(254,252,250);
		}
		nav section{
		    background-color: #a6937c;
		    text-align: center;
		}
		nav form{
			display: inline-block;
			margin: 0 auto;
			padding: 17px 0;
		}
		nav input[type='text']{
			height: 22px;
		    border-radius: 3px;
		    border: 1px solid #BBB;
		    /*padding-right: 50px;*/

		    text-indent: 5px;
		    letter-spacing: 1px;
		    vertical-align: bottom;
		}
		nav input[type='submit']{
			background: url(/images/search_icon.png) center center no-repeat;
			margin-left: -25px;
			width: 22px; height: 24px;
			border: none;
			padding: 7px 5px;
			cursor: pointer;
		}
		nav #slogan2{
			float: right;
			margin: 17px 10px;
		}
		.wood{
			background: url(/images/search/wood.jpg) right no-repeat;
			width: 100%; height: 100px;
			font-size: 0;
		}
		.wood img{
			width: 100%;
		}


		#main{
			background: url(/images/search/bg.png) right bottom no-repeat , rgb(254,252,250);
			background-size: 100%;
			padding-top: 80px;
		}
		.result{
			margin-bottom: 80px;
			width: 80%;
			padding: 0 10%;
		}
		.result span{
			color: #629400;
			font-size: 21px;
		}
		.result img{
			vertical-align: text-top;
		}
		.result p{
			margin: 10px 0;
			text-align: justify;
			line-height: 28px;
			letter-spacing: 1px;
		}

		#page{
			clear: both;
			padding: 0 0 90px;
			text-align: center;
		}
		#page a{
			margin: 0 10px;
			padding: 3px 5px;
			border: 1px solid #CCC;
			color: #7e7664;
		}


		@media (max-width: 980px){

		.result{
			width: 80%;
			padding: 0 10%;
		}

		}

		@media (max-width: 480px){

		nav form{
			clear: both;
			display: block;
		}

		}		</style>
</div>
</body>
</html>
