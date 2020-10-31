<section id="ad">
    <div class="clearfix">
        <div class="L60">
            <div class="flexslider fs2">
                <ul class="slides">
                  @foreach($ad_15 as $ad15)
                    @if(  !empty($ad15->image) AND File::exists( public_path().$ad15->image)  )
                      <li><a href="{{$ad15->url}}"   target="_new" >
                            <img src="/public{{$ad15->image}}" >
                          </a>
                      </li>
                    @else
                    <li>
                          <img src="/images/557x320.jpg">
                    </li>
                    @endif
                  @endforeach
                </ul>
            </div>
        </div>
        <div class="L20">
            <div class="flexslider fs2">
                <ul class="slides">
                    @foreach($ad_16 as $ad16)
                          @if(  !empty($ad16->image) AND File::exists( public_path().$ad16->image)  )
                          <li><a href="{{$ad16->url}}"   target="_new" ><img src="/public{{$ad16->image}}"></a></li>
                          @else
                          <li>
                              <img src="/images/173x144.jpg">
                          </li>
                          @endif
                    @endforeach

                </ul>
            </div>
        </div>
        <div class="L20">
            <div class="flexslider fs2">
                <ul class="slides">
                    @foreach($ad_17 as $ad17)

                      @if(  !empty($ad17->image) AND File::exists( public_path().$ad17->image)  )
                        <li><a href="{{$ad17->url}}"   target="_new" ><img src="/public{{$ad17->image}}"></a></li>
                      @else
                        <li><img src="/images/173x144.jpg"></li>
                      @endif

                    @endforeach

                </ul>
            </div>
        </div>
        <div class="L20">
            <div class="flexslider fs2">
                <ul class="slides">
                    @foreach($ad_18 as $ad18)
                        @if(  !empty($ad18->image) AND File::exists( public_path().$ad18->image)  )
                          <li><a href="{{$ad18->url}}"  target="_new" ><img src="/public{{$ad18->image}}"></a></li>
                        @else
                          <li><img src="/images/173x144.jpg"></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="L20">
            <div class="flexslider fs2">
                <ul class="slides">
                    @foreach($ad_19 as $ad19)
                          @if(  !empty($ad19->image) AND File::exists( public_path().$ad19->image)  )
                            <li>
                                <a href="{{$ad19->url}}"  target="_new" >
                                  <img src="/public{{$ad19->image}}">
                                </a>
                            </li>
                          @else
                            <li><img src="/images/173x144.jpg"></li>
                          @endif
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</section>
