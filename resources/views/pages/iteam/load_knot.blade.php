@if(isset($mat))
    @foreach($mat as $val)
        @if($val->img_1 != null)
        <div class="col-lg-4 col-md-4">
            <a class="clik_body" data-url="{{route('clik_body', ['id' => $val->id])}}" href="">
                <div class="iteam">
                    <img src="data/product/knot/{{$val->img_1}}">
                    <div class="info"><span class="text-truncate-set text-truncate-set-1">{{$val->name}}</span> <span>¥ {{number_format($val->price)}}</span></div>
                </div>
            </a>
        </div>
        @endif
    @endforeach
@endif

@if(isset($day))
    @foreach($day as $val)
        @if($val->img_1 != null)
        <div class="col-lg-4 col-md-4">
            <a class="clik_strap" data-url="{{route('clik_strap', ['id' => $val->id])}}" href="">
                <div class="iteam">
                    <img src="data/news/{{$val->img}}">
                    <div class="info">{{$val->name}} <br> <span>¥ {{$val->price}}</span></div>
                </div>
            </a>
        </div>
        @endif
    @endforeach
@endif

@if(isset($khoa))
    @foreach($khoa as $val)
        @if($val->img_1 != null)
        <div class="col-lg-4 col-md-4">
            <a href="">
                <div class="iteam">
                    <img src="data/news/{{$val->img}}">
                    <div class="info">{{$val->name}} <br> <span>¥ {{$val->price}}</span></div>
                </div>
            </a>
        </div>
        @endif
    @endforeach
@endif