  <div class="tab-pane active in" id="home">
        @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
        @endif

  <?php
  // print_r($cates);
  $cate_array = array();
  foreach($cates as $cate){
      $cate_array[$cate['id']]=$cate['name'];
  }
  ?>

  <link href="/jqueryui/jquery-ui.css" rel="stylesheet">
  <script src="/jqueryui/external/jquery/jquery.js"></script>
  <script src="/jqueryui/jquery-ui.js"></script>


  <div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 id="myModalLabel">刪除</h3>
      </div>
      <div class="modal-body">
          <p class="error-text"><i class="icon-warning-sign modal-icon"></i>確定要刪除!?</p>
      </div>
      <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
          <a  class="btn btn-danger user_id" alt="">Delete</a>
      </div>
  </div>

  <div class="modal small hide fade" id="myModal_facebook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 id="myModalLabel">刪除</h3>
      </div>
      <div class="modal-body">
          <p class="error-text"><i class="icon-warning-sign modal-icon"></i>確定要刪除facebook分享圖!?</p>
      </div>
      <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
          <a  class="btn btn-danger user_id" alt="">Delete</a>
      </div>
  </div>

  <label>標題</label>
  <input type="text" name="name" value="<?php echo (!empty($post))?$post->name:''?>" class="input-xlarge">

  <label>FB標題</label>
  <input type="text" name="fb_title" value="<?php echo (!empty($post))?$post->fb_title:''?>" class="input-xlarge">


  <label >排序</label>
  <input type="text" name="prim"     value="<?php echo (!empty($post))?$post->prim:''?>" class="input-xlarge">

  <label >分類</label>
  <input type="text" name="cate"     value="<?php echo (!empty($post))?$post->cate:''?>" class="input-xlarge">

  <label >日期</label>
  <input type="text" name="date" id="datepicker"     value="<?php echo (!empty($post))?$post->date:''?>" class="input-xlarge">


            <label>列表圖片</label>

            <font style="color:red;">圖片檔案為_尺寸寬451px高251px</font>
            <br>
            @if(!empty($post) && $post->image)
              <a  href="#myModal" id="{{$post->id}}"  class="close2"  style="float:left;" data-toggle="modal" >×</a>
              <img src="/public{{$post->image}}" alt="" >



            @else
              <input type="file" name="image" value="" class="input-xlarge">
            @endif

            <label>Facebook分享圖片</label>

            <font style="color:red;"> </font>
            <br>
            @if(!empty($post) && $post->image_facebook)


                <a  href="#myModal_facebook" id="{{$post->id}}"  class="close3"  style="float:left;" data-toggle="modal" >×</a>

                  <img src="/public{{$post->image_facebook}}" alt="" >



            @else
              <input type="file" name="image_facebook" value="" class="input-xlarge">
            @endif

  <input type="hidden" name="category_id" value="4" >




  <label>內容</label>
  <textarea name="content"  style="width:800px;" id="ckeditor" class="ckeditor" ><?php echo ($post)?$post->content:''?></textarea>

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

  $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});

  $("a.close2").click(function(){
        $('.user_id').attr('id' , $(this).attr('id'));
  });

  $("a.close3").click(function(){
        $('.user_id').attr('id' , $(this).attr('id'));
  });

  $('#myModal').on('shown.bs.modal', function () {
        $('.user_id').attr('href',"/delPostImage/"+$('.user_id').attr('id') );
  })

  $('#myModal_facebook').on('shown.bs.modal', function () {
        $('.user_id').attr('href',"/delPostImage_facebook/"+$('.user_id').attr('id') );
  })

})
</script>
