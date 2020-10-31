<div id="top">
    <div class="cycle-slideshow" data-cycle-timeout=3500 data-cycle-manual-speed="200">
      <?php
      foreach($ad_8 as $a8){
      ?>
      <a href="{{$a8->url}}"  target="_new" >
        <img src="/public{{$a8->image}}" style="wdith:940;height:370px;">
         </a>
      <?php
      }
      ?>

    </div>
</div>
