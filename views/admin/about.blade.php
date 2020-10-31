
@extends('layout.admin')

@section('content')
<script src="/ckeditor/ckeditor.js"></script>




        @include("layout.comm.head")

        <div class="container-fluid">
            <div class="row-fluid">
              {{Form::open(array('action' => 'PostController@postUpdate' ,"id"=>"tab","enctype"=>"multipart/form-data"))}}
              {{Form::hidden('id' ,$post->id ) }}
              <div class="btn-toolbar">

    <input type="submit" class="btn btn-primary"><i class="icon-save"></i> Save</button>

  <div class="btn-group">
  </div>
</div>

<div class="well">

    <div id="myTabContent" class="tab-content">

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


      <input type="hidden" name="name" value="<?php echo (!empty($post))?$post->name:''?>" class="input-xlarge">
      <input type="hidden" name="date" value="<?php echo (!empty($post))?$post->date:''?>" class="input-xlarge">



      <input type="hidden" name="prim"     value="<?php echo (!empty($post))?$post->prim:''?>" class="input-xlarge">


      <input type="hidden" name="date" id="datepicker"     value="<?php echo (!empty($post))?$post->date:''?>" class="input-xlarge">


                <label>列表圖片</label>


                @if(!empty($post) && $post->image)


                    <a  href="#myModal" id="{{$post->id}}"  class="close2"  style="float:left;" data-toggle="modal" >×</a>

                      <img src="/public{{$post->image}}" alt="" >



                @else
                  <input type="file" name="image" value="" class="input-xlarge">
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
            // alert( $('.user_id').attr("id") );
      });

      $('#myModal').on('shown.bs.modal', function () {

            $('.user_id').attr('href',"/delPostImage/"+$('.user_id').attr('id') );
      })

    })
    </script>


        {{ Form::close() }}
    </div>

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>

  <div class="modal-body">
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
  </div>
</div>





            </div>
        </div>



        <script type="text/javascript">
                 CKEDITOR.replace("content",      {            width:"auto", height:555      });
        </script>

@stop
