
<link rel="stylesheet" href="/css/reserve2.css">
{{Form::open(array('action' => 'HomeController@report' ,"id"=>"report","enctype"=>"multipart/form-data", 'files' => true  ))}}
{{Form::hidden('id' ,$case->id ) }}
<div id="reserve">
		 
			<h1>{{$case->slogan1}}</h1>
			<h4>{{$case->slogan2}}</h4>
			  
			<input type="text" name="name" id="name" placeholder="@if($errors->first('name')) 姓名必填 @else 姓名 Name @endif" value="">
			<input type="text" name="email" id="email" placeholder="@if($errors->first('email')) 電子信箱 Email必填 @else 電子信箱 Email @endif" value="">
			<input type="text" name="people" id="people" placeholder="@if($errors->first('people')) 預約人數 必填 @else 預約人數 @endif" value="">
			<input type="text" name="phone" id="phone" placeholder="@if($errors->first('phone')) 手機號碼 Phone 必填 @else 手機號碼 Phone @endif" value="">
			<textarea name="note" id="" rows="10" placeholder="若有任何問題，歡迎告訴我們"></textarea>

			<input type="submit" value="送出預約資訊" style=" cursor: pointer;margin-top: -5px; ">
			<!-- <input type="checkbox" name="statement"   id="statement_check"  value='1' style="margin: 0 0 0 49%;">
		 -->	 

			<button id="dialog-link" class="ui-button ui-corner-all ui-widget" style="margin: 5px 0 0 0;">
				<span class="ui-icon ui-icon-newwin"></span>隱私聲明
			</button>
			
			
		 
	</div>

	<div id="dialog" title="隱私聲明">
		<p>
			{{$case->statement_content}} 			  				 
		</p>
	</div>

{{ Form::close() }}
	 
	<script type="text/javascript">

		$(function(){

			
			$("#reserve a").on('click', function() {
				$("#statement").show();
				$("body").css('overflow-y', 'hidden');
			});
			$("#statement-close").on('click', function() {
				$("#statement").hide();
				$("body").css('overflow-y', 'auto');
			});
		});
	</script>