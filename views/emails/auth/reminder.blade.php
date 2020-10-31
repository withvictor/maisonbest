<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>

	<link rel="stylesheet" href="http://www.maisonbest.com.tw/css/reserve2.css">
</head>
<body>
	<div id="reserve">
		<form action="">
			<h1>{{$slogan1}}</h1>
			<h4>{{$slogan2}}</h4>
			<span>X</span>

			<input type="text" value="{{$name}}" placeholder="姓名 Name">
			<input type="text" value="{{$email}}" placeholder="電子信箱 Email">
			<input type="text" value="{{$people}}" placeholder="預約人數">
			<input type="text" value="{{$phone}}" placeholder="手機號碼 Phone">
			<textarea name="" id="" rows="10" placeholder="若有任何問題，歡迎告訴我們">{{$note}}</textarea>

			<input type="submit" value="送出預約資訊">

		</form>
	</div>




</body>
</html>
