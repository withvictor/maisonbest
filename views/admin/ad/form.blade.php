  <div class="tab-pane active in" id="home">
        @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
        @endif

  <?php
    $cate_array = array();
    foreach($cates as $cate){
        $cate_array[$cate['id']]=$cate['name'];
    }
  ?>

  <label>標題</label>
  <input type="text" name="title" value="<?php echo (!empty($post))?$post->title:''?>" class="input-xlarge">

  <label>排序</label>
  <input type="text" name="pr" value="<?php echo (!empty($post))?$post->pr:''?>" class="input-xlarge">




    <label style="color:red;">請先選擇是影片或是圖片</label>

    

    @if($category_id==14 )
        <div class="is_video">

          影片
          <input type="radio" name="is_video" id="f_video" value="1" >

          圖片
          <input type="radio" name="is_video" id="f_image" value="2" >

        </div>

        @if(!empty($post) ? $post->video  : false)



            <video  width="100%" controls poster="">
              <source src="{{"/public/videos/".$post->video}}" type="video/mp4" >
            </video>
        @else

            <div class="_video" style="display:none;"  >
                <label style="color:blue">影片</label>
                <input type="file" name="video" value="" class="input-xlarge">
            </div>

            

        @endif
 
        @if(!empty($post) ? $post->poster  : false)         
              <button type="button" class="btn btn-danger del_poster" id="{{$post->id}}" name="button"  >刪除影片預覧圖</button>
              <img src="{{"/public/videos/".$post->poster}}" width="80%" >
        @else
              <label style="color:blue;" >影片預覧圖</label>
              <input type="file" name="poster" >
        @endif

    @else
              <input type="hidden" name="is_video" id="f_image" value="2">    
    @endif

            




  <br>
  <!--
  <label>排序</label>
  <input type="text" name="primary" value="<?php echo (!empty($post))?$post->primary:''?>" class="input-xlarge">
  -->
  


  <div class="xfile_img">


  <label   style="color:blue">圖片</label>

      <font style="color:red;">
        @if($category_id==8)
          圖片檔案為_尺寸寬300px高160px
        @elseif($category_id==10)
          圖片檔案為_尺寸寬150px高120px
        @elseif($category_id==23)
          圖片檔案為_尺寸寬925px高150px
        @elseif($category_id==14)
          圖片檔案為_尺寸寬940px高400px
        @elseif($category_id==12)
          圖片檔案為_尺寸寬940px高400px
        @elseif($category_id==20)
          圖片檔案為_尺寸寬940px高400px
        @elseif($category_id==22)
          圖片檔案為_尺寸寬940px高400px
        @elseif($category_id==25)
          圖片檔案為_尺寸寬940px高400px
        @elseif($category_id==26)
          圖片檔案為_尺寸寬940px高400px
        @elseif($category_id==10)
          圖片檔案為_尺寸寬150px高120px
        @elseif($category_id==15)
          圖片檔案為_尺寸寬553px高322px
        @elseif($category_id==16)
          圖片檔案為_尺寸寬300px高255px
        @elseif($category_id==17)
          圖片檔案為_尺寸寬300px高255px
        @elseif($category_id==18)
          圖片檔案為_尺寸寬300px高255px
        @elseif($category_id==19)
          圖片檔案為_尺寸寬300px高255px
        @endif
      </font><br>


  @if(!empty($post) AND $post->image)

  <div class="col-md-1" style="wdith:200px;">

      <a href="#myModal" id="{{$post->id}}" class="del_user" alt="{{$category_id}}" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
      {{ HTML::image( "/public".$post->image ,'',array( 'class' => 'img-thumbnail',
                                          "id"    =>  $post->id ,
                                          'style' =>  "width:200px;height:190px;" ) ) }}
  </div>

  @else
  <div class="_image">
    <input type="file" name="image" value="" class="input-xlarge xfile">
  </div>  
  @endif

</div>


  <input type="hidden" name="category_id" value="{{$category_id}}" >


  <label>網址</label>
  <input type="text" name="url" id="url" value="<?php echo ($post)?$post->url:''?>">




  @if($category_id==10)
    <label>內文</label>
    <input type="text" name="content" value="<?php echo ($post)?$post->content:''?>" class="input-xlarge">
  @else
    <input type="hidden" name="content" value="content" class="input-xlarge">
  @endif

</div>






<script type="text/javascript">
  $("document").ready(function(){


      $("#f_video").click(function(){
          $("._video").show();
          $("._image").hide();
           
      });

      $("#f_image").click(function(){
          $("._video").hide();
          $("._image").show();

      });

      $("a").click(function(){
            $('.user_id').attr('id' , $(this).attr('id'));
            $('.user_id').attr('alt' , $(this).attr('alt'));
      });

      $('#myModal').on('shown.bs.modal', function () {


          $('.user_id').attr('href',"/delThisAdImage/"+$('.user_id').attr('id')+"?category_id="+$('.user_id').attr('alt'))

          // alert( $('.user_id').attr('href') );
          // alert($('.user_id').attr('alt'));

      });

      $("button.del_poster").click(function(){

        var rate_id = $(this).attr('id');

        // alert(rate_id);

        var r = confirm("確定刪除影片預覧圖!?");

        if (r == true) {

          $.post("/del_ad_poster",
                {"id":rate_id},
                function(data){
                  // alert(data);
                  if(data==1){
                      alert("删除成功!");
                      location.reload();
                  }else{
                      alert("删除失敗!");
                  }


              });
        }

      });

  });
</script>
