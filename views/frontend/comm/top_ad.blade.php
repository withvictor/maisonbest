<div id="top">
    <div class="flexslider fs2">
        <ul class="slides">
          <?php
          foreach($sql_data as $atop8){
          ?>
          @if(  !empty($atop8->image) AND File::exists( public_path().$atop8->image)  )
            <li><a href="{{$atop8->url}}" target="_new" >
                <img src="/public{{$atop8->image}}" >
              </a>
            </li>
          @endif
          <?php
          }
          ?>
        </ul>
    </div>
</div>
