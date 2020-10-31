<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>米築官方後台登入</title>
<style type="text/css">
.c38 {line-height:29px;padding:0 11px}
.f29 {background-color:#fff;border:1px solid #edeeee;border-radius:1px;margin:0 0 10px;padding:10px 0}
.f29 {background-color:transparent;border:none}
.f38 {cursor:pointer}
.m69 {
	margin-bottom: 10px;
	margin-left: 40px;
	margin-right: 40px;
}
.n69 {display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column}
.o69 {
	margin: 0 40px 12px
}
.p69 {margin:4px 40px 14px}

.s39 {position:relative}

.t39 {background-color:#fdfdfd;border:1px solid #edeeee;border-radius:3px;font-size:14px;padding:9px 8px 7px;-webkit-appearance:none}

.u28 {
	background: 0 0;
	border-radius: 3px;
	border-style: solid;
	border-width: 1px;
	font-size: 16px;
	font-weight: 500;
	outline: none;
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
	-webkit-appearance: none;
	margin: 70,70,70,70;
}
.u69 {display:inline-block;margin-right:8px;position:relative;top:3px}
.u77 {display:block;overflow:hidden;text-indent:110%;white-space:nowrap}
.v28 {border:0;color:#4b4f54;font-weight:400}
.w28 {color:#fff}

.z28 {
	background-color: #492b6f;
	border-color: #492b6f
}

.z28 {color:#fff}
.login {
	background-image: url(/public/backlogin/images/bg.jpg);
	background-repeat: repeat-y;
	width: 461px;
	text-align: center;
	position: absolute;
	margin: auto;
	 top:0;
      right:0;
      bottom:0;
      left:0;
}

.n691 {display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column}

body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.logo {
	width: 300px;
	padding-top: 200px;
	padding-left: 85px;
	height: 100px;
}
</style>
</head>

<body>

	{{Form::open(array('action' => 'HomeController@postLogin'))}}
<div class="login">
  <div class="f29" >
    <div class="logo"><h2> 米築官方後台登入</h2></div>
    <div class="m69" >
      <form class="n691" >
        <div class="o69 s39">
          <input name="email" type="text" class="t39 e89" placeholder="用戶名稱" value="" size="36" maxlength="50" aria-describedby="" aria-label="用戶名稱" aria-required="true" autocapitalize="off" autocorrect="off"/>
        </div>
        <div class="o69 s39">
          <input name="password" type="password" class="t39 e89" placeholder="密碼" value="" size="36" aria-describedby="" aria-label="密碼" aria-required="true" autocapitalize="off" autocorrect="off"  />
        </div>
        <button class="p69 u28 z28 c38 f38" >登入</button>
      </form>

			<!-- <div style="width: 300px;padding-top: 177px;padding-left: 85px;height: 100px;">
				<img src="images/logo2.png" width="200px" alt="logo" />
			</div> -->
    </div>
  </div>
</div>

{{ Form::close() }}


<p>&nbsp;</p>


</body>
</html>
