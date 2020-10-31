<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Off Canvas Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/plugin/bootstrap4/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/plugin/bootstrap4/docs/examples/offcanvas/offcanvas.css" rel="stylesheet">
  </head>
    @include("ba")
  <body>
    @include("ga_code")
    <nav class="navbar navbar-fixed-top navbar-dark bg-inverse">
      <div class="container">
        <a class="navbar-brand" href="#">{{$case[0]->title}}</a>
        <ul class="nav navbar-nav">
          <li class="nav-item active"><a class="nav-link" href="#">{{$case[0]->total_price}}萬</a></li>
          <li class="nav-item active"><a class="nav-link" href="#">地址：{{$case[0]->address}}</a></li>


        </ul>
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">

          <p class="pull-xs-right hidden-sm-up">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Toggle nav</button>
          </p>

          <div class="jumbotron">
            <h1>

                  附近的總數：{{$betweens->count()}}
            </h1>
            <p>
              {{$case[0]->content}}
            </p>
          </div>


          <div class="row">
              <div class="col-xs-12 sidebar-offcanvas" id="sidebar" style="color:blue;">
                <h1>比對資料</h1>
              </div>
          </div>


          <div class="row">

          <?php
          $total_fooler_price = 0;
          $all_total_price = 0;
          ?>
          @foreach($betweens as $tcase)
            <div class="col-xs-6 col-lg-4">
              <h2>{{$tcase->title}}</h2>
              <p>
              地址：{{$tcase->address}}<br>
              格局：{{$tcase->room}}<br>
              <font color="red">總價：{{$tcase->total_price}}</font><br>
              <?php
                $total_fooler_price +=  $tcase->floor_number_price;
                $all_total_price    +=  $tcase->total_price;
              ?>
              坪／價：{{$tcase->floor_number_price}}<br>
              坪數：{{$tcase->floor_number}}<br>
              地區：{{$tcase->area}}<br>
              網址：<a href="{{$tcase->url}}">{{$tcase->title}}</a><br>
              </p>

            </div><!--/span-->
          @endforeach



          </div><!--/row-->
        </div><!--/span-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">

            <a href="#" class="list-group-item">附近({{$betweens->count()}})平均價格{{$all_total_price/$betweens->count() }}</a>
            <a href="#" class="list-group-item">附近({{$betweens->count()}})平均坪數價格{{$total_fooler_price/$betweens->count() }}</a>
            <a href="#" class="list-group-item">該案-總價{{$case[0]->total_price}}</a>
            <a href="#" class="list-group-item">該案-單坪數單價{{$case[0]->floor_number_price }}</a>
            <a href="{{$case[0]->url }}" class="list-group-item">原網址</a>


          </div>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>

    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" integrity="sha384-8gBf6Y4YYq7Jx97PIqmTwLPin4hxIzQw5aDmUg/DDhul9fFpbbLcLh3nTIIDJKhx" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="/plugin/bootstrap4/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/plugin/bootstrap4//assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="/plugin/bootstrap4/docs/examples/offcanvas/offcanvas.js"></script>
  </body>
</html>
