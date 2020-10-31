
@extends('layout.admin')

@section('content')
<?php
print_r($_SERVER);
?>


        @include("layout.comm.head")

        <div class="container-fluid">
            <div class="row-fluid">

<div class="btn-toolbar">

  <div class="btn-group">

  </div>
</div>
<div class="well">
  <?php
  $load = sys_getloadavg();
  print_r($load);
  ?>

  愛你一萬年
    <table class="table table-striped">
      <thead>
        <tr>
            <th>日期</th>
            <th>來自</th>
            <th>人數</th>
        </tr>
      </thead>


      <tbody>

        @foreach($result as $row)
            <?php
            // echo $row->created_at;
            $dates = DB::table("explode")->where('date',$row->date)->get();
            // $forms = DB::table("explode")->where('created_at',$row->created_at)->groupBy("title")->get();
            $pc_i=0;
            $mobile_i=0;
            ?>


                <tr>
                    <th>{{$row->date}}</th>
                    <th>
                      <?php
                      foreach($dates as $d){

                        if($d->from_drvice=='pc'){
                          $pc_i=$pc_i+1;
                          if(!empty($d->content)){
                            echo $d->content;
                            echo "<br>";
                          }

                        }else{
                          $mobile_i=$mobile_i+1;
                        }

                      }
                      ?>
                      電腦 : {{$pc_i}}<br>
                      手機 : {{$mobile_i}}
                    </th>
                    <th>{{count($dates)}}</th>
                </tr>



            <?php

            ?>
        @endforeach

      </tbody>
    </table>
    <div class="pagination">
      {{ $result->links()}}
    </div>
</div>










@stop
