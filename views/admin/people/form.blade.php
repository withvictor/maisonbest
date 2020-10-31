<style media="screen">
  input{
    width: 500px;
  }
</style>

  <div class="tab-pane active in" id="home">
        @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
        @endif



  <label>標題</label>
  <input type="text" name="name" value="<?php echo (!empty($people))?$people->name:''?>" >

  <label>FB標題</label>
  <input type="text" name="fb_title" value="<?php echo (!empty($people))?$people->fb_title:''?>" >

  <input type="hidden" name="fbLink" value="fbLink">

  <label>人名</label>
  <input type="text" name="title" value="<?php echo (!empty($people))?$people->title:''?>" >

  <label>副標</label>
  <input type="text" name="tag" value="<?php echo (!empty($people))?$people->tag:''?>"  >

  <label>排序</label>
  <input type="text" name="prim" value="<?php echo (!empty($people))?$people->prim:''?>" >


  <label>版形選擇</label>
  <?php
  $template =  (!empty($people))?$people->template:1;

  if($template==NULL){
    $template=1;
  }
  ?>
  原有的
  <input type="radio" name="template" value="1" {{($template==1)?" checked ":""}} >

  新版
  <input type="radio" name="template" value="2"  {{($template==2)?" checked ":""}} >


  <label>是否顯示 </label>
  <?php
  $flag =  (!empty($people))?$people->flag:1;

  if($flag==NULL){
    $flag=0;
  }
  ?>
  是
  <input type="radio" name="flag" value="0" {{($flag==0)?" checked ":""}} >

  否
  <input type="radio" name="flag" value="1"  {{($flag==1)?" checked ":""}} >



  <label>列表人物照片</label>
  <font style="color:red;">圖片檔案為_尺寸寬500px高320px</font>


  <br>
  @if(!empty($people) && $people->image)
  <div class="col-md-1" style="wdith:200px;">


      <button type="button" id="{{$people->id}}"  class="close2"  style="float:left;" >×</button>

      {{ HTML::image( "/public".$people->image ,'',array( 'class' => 'img-thumbnail',
                                          "id" => $people->id ,
                                          'style' =>  "width:200px;height:190px;")) }}
  </div>
  @else
    <input type="file" name="image" value="" class="input-xlarge">
  @endif

<br>
<br>
  <label>內容人物照片</label>
  <font style="color:red;">圖片檔案為_尺寸寬282px高420px</font>
  <br>
  @if(!empty($people) && $people->image2)
  <div class="col-md-1" style="wdith:200px;">


      <button type="button" id="{{$people->id}}"  class="close3"  style="float:left;" >×</button>

      {{ HTML::image( "/public".$people->image2 ,'',array( 'class' => 'img-thumbnail',
                                          "id" => $people->id ,
                                          'style' =>  "width:200px;height:190px;")) }}
  </div>
  @else
    <input type="file" name="image2" value="" class="input-xlarge">
  @endif


  <br>
    <label>FB分享照片</label>
    <font style="color:red;"> </font>
    <br>
    @if(!empty($people) && $people->image_facebook)
    <div class="col-md-1" style="wdith:200px;">


        <button type="button" id="{{$people->id}}"  class="close4"  style="float:left;" >×</button>

        {{ HTML::image( "/public".$people->image_facebook ,'',array( 'class' => 'img-thumbnail',
                                            "id" => $people->id ,
                                            'style' =>  "width:200px;height:190px;")) }}
    </div>
    @else
      <input type="file" name="image_facebook" value="" class="input-xlarge">
    @endif






  <label>內容</label>
  <textarea name="content" rows="8" cols="40" ><?php echo ($people)?$people->content:''?></textarea>



</div>

<style media="screen">
  label{
    font-size: 20px;
    font-weight: 600;
    margin: 8px 0px 8px 0px;
  }
</style>

<script type="text/javascript">
$("document").ready(function(){
      // $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
      // alert('qq');
      $(".close2").click(function(){
            var html = $(this);
            var pic_id = html.attr('id') ;
            // $(this).clone().appendTo('.clone');
            // alert(pic_id);
            var r = confirm("確定刪除圖片!?");
            if (r == true) {

              $.post("/delPeopleImage1",
                    {"id":pic_id},
                    function(data){
                      // alert(data);
                      if(data==1){
                          location.reload();
                      }


                  });
            }

      });


      $(".close3").click(function(){
            var html = $(this);
            var pic_id = html.attr('id') ;
            // $(this).clone().appendTo('.clone');
            // alert(pic_id);
            var r = confirm("確定刪除圖片!?");
            if (r == true) {

              $.post("/delPeopleImage2",
                    {"id":pic_id},
                    function(data){
                      // alert(data);
                      if(data==1){
                          location.reload();
                      }


                  });
            }

      });

      $(".close4").click(function(){
            var html = $(this);
            var pic_id = html.attr('id') ;
            // $(this).clone().appendTo('.clone');
            // alert(pic_id);
            var r = confirm("確定刪除圖片!?");
            if (r == true) {

              $.post("/delPeopleImg_facebook",
                    {"id":pic_id},
                    function(data){
                      // alert(data);
                      if(data==1){
                          location.reload();
                      }


                  });
            }

      });

});
</script>
