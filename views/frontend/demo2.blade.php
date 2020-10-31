/*<style type="text/css">
  html, body, #map-canvas { height: 100%; margin: 0; padding: 0;}
  .WtfMap {
    width: 50%;
    height:40%;
  }
</style>*/

<script src="/js/jquery.js"></script>
<script src="/js/jquery.tinyMap.js"></script>
<script>
function loadMap(){
  var map 	=  $('.googlemap');

  map.tinyMap({
    'center': ['{{$case->latitude}}','{{$case->longitude}}'],
    'zoom': 13,
    'marker': [
          {
            'addr'          :

                [ '{{$case->latitude}}' , '{{$case->longitude}}' ]
            ,

            'icon'          : createMarkerIcon('{{$case->title}}'),
            'newLabelCSS'   : 'labels',
            'ignore'        : true,
            'text'          :   '<a href=/showCase/{{$case->id}} >'+
                                "地址：{{$case->address}}<br>"+
                                "總價：{{$case->total_price}}<br>"+
                                '</a>'
          },
    ] ,
});
}

$("document").ready(function(){
        loadMap();
});



</script>


<script src="/js/cases.js"></script>
