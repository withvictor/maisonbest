<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<style type="text/css">
  html, body, #map-canvas { height: 100%; margin: 0; padding: 0;}
  .map {
    width: 100%;
    height:60%;
  }
</style>
<script src="/js/map_style.js"></script>
<script src="/js/jquery-2.2.0.js"></script>
<script src="/js/jquery.tinyMap-3.3.14.js"></script>

<script>
function loadMap(){
  // $('#map')
  var map =$('#map-marker-sandbox'),
      table = $('#table-sandbox');

  map.tinyMap({
    'center': ['24.8053929','120.9698654'],
    'zoom': 12,
    // 'styles':customMap, /* 自定地圖 */
    // 'markerWithLabel': true,
    // 'markerCluster': true,
    // 'infoWindowAutoClose':true,
    'marker': [
        @foreach($cases as $case)
          {
            'addr'          :'{{$case->address}}' ,

            // 'labelContent'  : '<strong><%=ce.title%></strong><div>'+
                              // '<img src="<%=ce.image.thumb%>" alt="" style="width:160px;height:40px;" />'+
                              // '</div>' ,
            // 'icon'          : 'https://code.essoduke.org/images/4.png' ,
            'icon'          : createMarkerIcon('{{$case->title}}'),
            // 'newLabel'      : '文字標籤',

            'newLabelCSS'   : 'labels',
            'ignore'        : true,
            'text'          : "{{$case->content}}"



          },
        @endforeach

    ] ,


});
}

$("document").ready(function(){
  // var map = $('#map-marker-sandbox'),
  //     table = $('#table-sandbox');
  //     // var map = $('#map');
  //     $('li').on('click', 'a', function () {

  //       // alert( $(this).attr("id") + $(this).attr("class") )
  //         if( $(this).attr('alt') == undefined) {

  //             $('#map-marker-sandbox').tinyMap('panTo', [$(this).attr("id"), $(this).attr("class") ]);
  //         }else{
  //             $('#map-marker-sandbox').tinyMap('panTo', $(this).attr('alt') );
  //         }
  //     });


      // $(function(){
        loadMap();
      // });




});

// Toggle Button
$(document)
    .on('click', '[data-sandbox-remove]', function () {
        var obj = $(this),
            id = obj.data('sandbox-remove');
        map.tinyMap('get', {'marker': [id], 'label': [id]}, function (ms) {
            var m = ms.marker, lb = ms.label, visible = true;

            if (m.length) {
                visible = m[0].getVisible();
                m[0].setVisible(!visible);
                lb[0].set('visible', !visible);
                obj.text(visible ? 'Show' : 'Hide');
            }
        });
    });
</script>
<script src="/js/cases.js"></script>





{{Form::open(array('action' => 'FrontendController@food',"method"=>"get"));}}
<div class="row">

    <div class="col-lg-6">
      <div class="form-group">
         <label for="inputEmail3" class="col-sm-2 control-label">地址</label>
         <div class="col-lg-10">
             <input type="text" class="form-control"   placeholder="address" name="address" >
         </div>
      </div>

      <div class="form-group">
         <label for="inputEmail3" class="col-sm-2 control-label">分類</label>
         <div class="col-lg-10">
             <select name="main_type" >
               <option value="">--------</option>
             <?php
             foreach($main_type as $type){
                 echo "<option value=$type->main_type>";
                 echo $type->main_type;
                 echo "</option>";
             }
             ?>
            </select>
         </div>
      </div>




        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label"> </label>
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">搜尋</button>
          </div>
        </div>
          {{Form::close();}}

    </div>

    <div class="col-lg-6">



      @foreach($cases as $case)

      <div class="col-lg-6">
        <a href="#"   >
          {{$case->title}}
        </a>
      </div>
      @endforeach
      <?php
        // print_r($_POST);
        $get_data =array();
        foreach($_GET as $key => $value){



            if($key!="_token" AND !empty($value)){
                $get_data[$key]=$value;
            }
        }

      if(isset($_GET)){

          echo $cases->appends($get_data)->links();
      }else{
          echo $cases->links();
      }

      ?>

    </div>

</div>

<div class="map" id="map-marker-sandbox"></div>

<div id="gaasd"></div>

<style media="screen">
div.form-group div{
  margin: 10px 0px  10px 0px;
}
 .control-label{
  margin: 10px 0px  10px 0px;
}
</style>
