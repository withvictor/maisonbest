
@extends('layout.admin')

@section('content')



        @include("layout.comm.head")

        <div class="container-fluid">
            <div class="row-fluid">

<div class="btn-toolbar">
     <a href="/post/create" class="btn btn-primary" >新增</a>

  <form action="/posts" method="post" >
    <div class="btn-group" style="float:right;display:none;">
      <input type="text" name="name">
      <input type="submit" value="submit">
    </div>
  </form>
</div>
<div class="well">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>名稱</th>
          <th>分類</th>
          <th>排序</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>

      <tbody>
        <?php
        $i_count=1;
        ?>
        @foreach($result as $row)

        <tr>

          <td>{{$i_count++}} </td>
          <td>{{$row->name}}</td>
          <td>{{$row->cate}}</td>
          <td>{{$row->prim}}</td>

          <td>
              <a href="/post/{{$row->id}}"><i class="icon-pencil"></i></a>
              <a href="#myModal" id="{{$row->id}}" class="del_user" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>

        </tr>
        @endforeach

      </tbody>
    </table>
</div>


<div class="pagination">

  <p id="page">

    <?php echo with(new CustomPresenter($result))->render(); ?>

  </p>

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">刪除地產新聞</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>確定要刪除!?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <a  class="btn btn-danger user_id" alt="">Delete</a>
    </div>
</div>





            </div>
        </div>
<script type="text/javascript">
$("document").ready(function(){

  $("a").click(function(){
        $('.user_id').attr('id' , $(this).attr('id'));
        $('.user_id').attr('alt' , $(this).attr('alt'));
  });

  $('#myModal').on('shown.bs.modal', function () {

      $('.user_id').attr('href',"/delPost/"+$('.user_id').attr('id')+"?category_id="+$('.user_id').attr('alt'))


  })

})
</script>

@stop
