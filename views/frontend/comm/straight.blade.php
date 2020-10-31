<aside>
    @foreach( $ad_10 as $a10)
        <div class="ad">
            <a href="{{$a10->url}}"   target="_new" >
              @if(  !empty($a10->image) AND File::exists( public_path().$a10->image)  )
                  <img src="public/{{$a10->image}}">
                  <p>{{$a10->title}}
                  </p>
                  <span>{{$a10->content}}</span>
              @endif
            </a>
        </div>
    @endforeach
</aside>
