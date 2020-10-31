
@extends('layout.admin')

@section('content')



        @include("layout.comm.head")

        <div class="container-fluid">
            <div class="row-fluid">

  <div class="btn-toolbar">
    
      <button class="btn"> <a href="/applyExcel/{{$rate->id}}">匯出EXCEL</a></button>
    
  <div class="btn-group">
  </div>
</div>
<div class="well">
 
    <table class="table table-striped">
      <thead>
        <tr>

          <th>案名</th>
          <th>姓名</th>
          <th>手機</th>
          <th>E-mail</th>
          <th>看屋人數</th>
          <th>備註</th>

          <th style="width: 26px;"></th>
        </tr>
      </thead>

      <tbody>
        @foreach($rate_applies as $row)

        <tr>

          <td>
            {{$rate->title}}
          </td>

          <td>
            {{$row->name}}            
          </td>

          <td>
              {{$row->phone}}
          </td>

          <td>
            {{$row->email}}
          </td>

          <td>
            {{$row->people}}
          </td>

          <td>
            {{$row->note}}
          </td>          
        </tr>
        @endforeach

      </tbody>
    </table>
</div>


<div class="pagination">
  <?php echo with(new CustomPresenter($rate_applies))->render(); ?>

</div>

 





            </div>
        </div>
 

@stop
