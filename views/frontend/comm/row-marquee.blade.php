<?php
  $i_p=9;
  $run_pic =$i_p-$c_sql->count();
?>
    @if ($run_pic > 1)
      <div class="row-marquee">
    @else
      <div class="row-marquee" style="display: none;">
    @endif

    <img src="/images/row.png">
    <div class="marquee" id="{{$m}}">
        @foreach($c_sql as $ad8)
            @if(  !empty($ad8->image) AND File::exists( public_path().$ad8->image)  )
                <a href="{{$ad8->url}}" target="_new">
                  <img src="/public{{$ad8->image}}">
                </a>
            @endif
        @endforeach
    </div>
    <img src="/images/row.png">
</div>


<script type="text/javascript">
  $("document").ready(function(){

  });
</script>
