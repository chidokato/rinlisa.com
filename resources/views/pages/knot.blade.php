@extends('layout.index')

@section('title') Đồng KNOT @endsection
@section('description') Đồng KNOT @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('content')

<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{asset('')}}">Trang chủ</a></li>
                        <li>Knot</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="knot-view">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 knot-view">
                <ul class="nav" role="tablist" id="nav-tab">
                    <li><a class="active" data-toggle="tab" href="#mode" role="tab">
                        <img src="assets/knot/mode.svg"></a></li>
                    <li><a data-toggle="tab" href="#mode_on" role="tab">
                        <img src="assets/knot/mode_on.svg"></a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="mode" role="tabpanel">
                        <div class="main-knot">
                            <div class="v_arm"><img class="" src="assets/knot/v_arm.png"></div>
                            <div class="mat"><img class="" src="data/product/knot/{{$body->img_1}}"></div>
                            <div class="str_m"><img class="" src="data/product/knot/{{$strap->img_3}}"></div>
                        </div>
                    </div>
                    <div class="tab-pane fade show " id="mode_on" role="tabpanel">
                        <div class="mode_on">
                            <div class="face"><img class="" src="assets/knot/cap-38svwh.png"></div>
                            <div class="flat_top"><img class="" src="data/product/knot/{{$strap->img_1}}"></div>
                            <div class="flat_bottom"><img class="" src="data/product/knot/{{$strap->img_2}}"></div>
                            <div class="rg"><img class="" src="data/product/knot/{{$buckle->img_1}}"></div>
                        </div>
                    </div>
                </div>
                <ul class="chitiet">
                    <div class="price_face_parent"><div class="price_face" data-id="54600"></div></div>
                    <div class="price_strap_parent"><div class="price_strap" data-id="5950"></div></div>
                    <div class="price_rg_parent"><div class="price_rg" data-id="850"></div></div>
                    <li class="mini_cart_wrapper"><a href="javascript:void(0)"> Chi tiết</a></li>
                    <li><a href="">Mua hàng</a> ¥ <span class="tong">61400</span> </li>
                </ul>

            </div>
            <div class="col-lg-5 col-md-5 knot-list">
                <ul class="nav" role="tablist" id="nav-tab">
                    <li><a class="active" data-toggle="tab" href="#mat" role="tab">
                        <img src="assets/knot/s_0_1.svg">
                        <div>Mặt</div></a></li>
                    <li><a data-toggle="tab" href="#day" role="tab">
                        <img src="assets/knot/s_0_2.svg">
                        <div>Dây</div></a></li>
                    <li><a data-toggle="tab" href="#khoa" role="tab">
                        <img src="assets/knot/s_0_3.svg">
                        <div>Khóa</div></a></li>
                </ul>
                <div class="tab-content" >
                    <div class="tab-pane fade show active" id="mat" role="tabpanel">
                        <div class="flex mb-2 mt-2">
                            <div class="ml-1">{{count($mat)}} sản phẩm</div>
                            <div class="mr-1">
                                <select name="arrange" id="arrange_mat" class="control">
                                    <option value="new">Mới nhất</option>
                                    <option value="asc">Giá thấp -> cao</option>
                                    <option value="desc">Giá cao -> thấp</option>
                                </select>
                            </div>
                        </div>
                        <div class="iteam-list" id="style-4">
                            <div class="row" id="list-mat">
                                @foreach($mat as $val)
                                    @if($val->img_1 != null)
                                    <div class="col-lg-4 col-md-4">
                                        <a class="clik_body" data-price="{{$val->price}}" data-url="{{route('clik_body', ['id' => $val->id])}}" href="" >
                                            <div class="iteam">
                                                <img src="data/product/knot/{{$val->img_1}}">
                                                <div class="info"><span class="text-truncate-set text-truncate-set-1">{{$val->name}}</span> <span>¥ {{number_format($val->price)}}</span></div>
                                            </div>
                                        </a>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="day" role="tabpanel">
                        <ul class="nav custom_day" role="tablist" id="nav-tab">
                            <li><a class="active" data-toggle="tab" href="#da" role="tab">
                                <img src="assets/knot/s_1_strap_1_1.svg">
                                <div>Da</div></a></li>
                            <li><a data-toggle="tab" href="#vai" role="tab">
                                <img src="assets/knot/s_1_strap_1_2.svg">
                                <div>Vải</div></a></li>
                            <li><a data-toggle="tab" href="#kimloai" role="tab">
                                <img src="assets/knot/s_1_strap_1_3.svg">
                                <div>Kim loại, other...</div></a></li>
                            <li><a data-toggle="tab" href="#Premium" role="tab">
                                <img src="assets/knot/s_1_strap_1_4.svg">
                                <div>Premium</div></a></li>
                        </ul>
                        <div class="tab-content" >
                            <div class="tab-pane fade show active" id="da" role="tabpanel">
                                <div class="flex mb-2 mt-2">
                                    <div class="ml-1">{{count($day)}} sản phẩm</div>
                                    <div class="mr-1">
                                        <select name="arrange" id="arrange_day" class="control">
                                            <option value="new">Mới nhất</option>
                                            <option value="asc">Giá thấp -> cao</option>
                                            <option value="desc">Giá cao -> thấp</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="iteam-list" id="style-4">
                                    <div class="row" id="list-day">
                                        @foreach($day as $val)
                                            @if($val->img_1 != null && $val->material == 'Da')
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
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="vai" role="tabpanel">
                                <div class="flex mb-2 mt-2">
                                    <div class="ml-1">{{count($day)}} sản phẩm</div>
                                    <div class="mr-1">
                                        <select name="arrange" id="arrange_day" class="control">
                                            <option value="new">Mới nhất</option>
                                            <option value="asc">Giá thấp -> cao</option>
                                            <option value="desc">Giá cao -> thấp</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="iteam-list" id="style-4">
                                    <div class="row" id="list-day">
                                        @foreach($day as $val)
                                            @if($val->img_1 != null && $val->material == 'Vải')
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
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="kimloai" role="tabpanel">
                                <div class="flex mb-2 mt-2">
                                    <div class="ml-1">{{count($day)}} sản phẩm</div>
                                    <div class="mr-1">
                                        <select name="arrange" id="arrange_day" class="control">
                                            <option value="new">Mới nhất</option>
                                            <option value="asc">Giá thấp -> cao</option>
                                            <option value="desc">Giá cao -> thấp</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="iteam-list" id="style-4">
                                    <div class="row" id="list-day">
                                        @foreach($day as $val)
                                            @if($val->img_1 != null && $val->material == 'Kim loại, other...')
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
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="Premium" role="tabpanel">
                                <div class="flex mb-2 mt-2">
                                    <div class="ml-1">{{count($day)}} sản phẩm</div>
                                    <div class="mr-1">
                                        <select name="arrange" id="arrange_day" class="control">
                                            <option value="new">Mới nhất</option>
                                            <option value="asc">Giá thấp -> cao</option>
                                            <option value="desc">Giá cao -> thấp</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="iteam-list" id="style-4">
                                    <div class="row" id="list-day">
                                        @foreach($day as $val)
                                            @if($val->img_1 != null && $val->material == 'Premium')
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="khoa" role="tabpanel">
                        <div class="flex mb-2 mt-2">
                            <div class="ml-1">{{count($khoa)}} sản phẩm</div>
                            <div class="mr-1">
                                <select name="arrange" id="arrange_khoa" class="control">
                                    <option value="new">Mới nhất</option>
                                    <option value="asc">Giá thấp -> cao</option>
                                    <option value="desc">Giá cao -> thấp</option>
                                </select>
                            </div>
                        </div>
                        <div class="iteam-list" id="style-4">
                            <div class="row" id="list-khoa">
                                @foreach($khoa as $val)
                                    @if($val->img_1 != null)
                                    <div class="col-lg-4 col-md-4">
                                        <a class="clik_buckle" href="" data-url="{{route('clik_buckle', ['id' => $val->id])}}">
                                            <div class="iteam">
                                                <img src="data/news/{{$val->img}}">
                                                <div class="info">{{$val->name}} <br> <span>¥ {{$val->price}}</span></div>
                                            </div>
                                        </a>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--mini cart-->
<div class="mini_cart">
    <div class="cart_close">
        <ul class="nav" role="tablist" id="nav-tab">
            <li>
                <a class="active" data-toggle="tab" href="#mat1" role="tab">
                    <img class="icon" src="assets/knot/s_0_1.svg">
                    <div>Mặt</div>
                </a>
            </li>
            <li><a data-toggle="tab" href="#day1" role="tab">
                <img class="icon" src="assets/knot/s_0_2.svg">
                <div>Dây</div></a>
            </li>
            <li><a data-toggle="tab" href="#khoa1" role="tab">
                <img class="icon" src="assets/knot/s_0_3.svg">
                <div>Khóa</div></a>
            </li>
        </ul>
        <div class="mini_cart_close">
            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
        </div>
    </div>
    <div class="tab-content" >
        <div class="tab-pane fade show active" id="mat1" role="tabpanel">
            <div class="row">
                <div class="col-lg-6">
                    <div class="outer">
                        <div id="big" class="owl-carousel owl-theme">
                            <div class="item">
                                <img src="data/news/{{$body->img}}" alt="">
                            </div>
                            @foreach($body->images as $val)
                            <div class="item">
                                <img src="data/product/detail/{{$val->img}}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div id="thumbs" class="owl-carousel owl-theme">
                            <div class="item">
                                <img src="data/news/{{$body->img}}" alt="">
                            </div>
                            @foreach($body->images as $val)
                            <div class="item">
                                <img src="data/product/detail/{{$val->img}}" alt="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="desc">
                        <h3>{{$body->name}}</h3>
                        <hr>
                        <div class="price_box">
                            <span class="current_price">
                                <small>{{ $body->price ? $body->unit : '' }}</small> 
                                <span>{{ $body->price ? number_format($body->price) : 'Giá bán: Liên hệ' }}</span>
                            </span>
                            <span class="exchange">
                                @if($body->unit == '¥')
                                <small>(~₫&nbsp;</small>
                                <span> {{number_format($body->price * $setting->exchange)}})</span>
                                @endif
                            </span>
                            <span class="old_price">
                                @php if(isset($body->sale)){
                                    echo '<small>₫&nbsp;</small>'.number_format($body->price*(1+$body->sale/100));
                                } @endphp
                            </span>
                        </div>
                        <div>
                            {{$body->detal}}
                        </div>
                        <p class="genuine"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="day1" role="tabpanel">
            <div class="row">
                <div class="col-lg-6">
                    <div class="outer">
                        <div id="big" class="owl-carousel owl-theme">
                            <div class="item">
                                <img src="data/news/{{$strap->img}}" alt="">
                            </div>
                            @foreach($strap->images as $val)
                            <div class="item">
                                <img src="data/product/detail/{{$val->img}}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div id="thumbs" class="owl-carousel owl-theme">
                            <div class="item">
                                <img src="data/news/{{$strap->img}}" alt="">
                            </div>
                            @foreach($strap->images as $val)
                            <div class="item">
                                <img src="data/product/detail/{{$val->img}}" alt="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="desc">
                        <h3>{{$strap->name}}</h3>
                        <hr>
                        <div class="price_box">
                            <span class="current_price">
                                <small>{{ $strap->price ? $strap->unit : '' }}</small> 
                                <span>{{ $strap->price ? number_format($body->price) : 'Giá bán: Liên hệ' }}</span>
                            </span>
                            <span class="exchange">
                                @if($strap->unit == '¥')
                                <small>(~₫&nbsp;</small>
                                <span> {{number_format($body->price * $setting->exchange)}})</span>
                                @endif
                            </span>
                            <span class="old_price">
                                @php if(isset($strap->sale)){
                                    echo '<small>₫&nbsp;</small>'.number_format($strap->price*(1+$strap->sale/100));
                                } @endphp
                            </span>
                        </div>
                        <div>
                            {{$strap->detal}}
                        </div>
                        <p class="genuine"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show" id="khoa1" role="tabpanel">
            <div class="row">
                <div class="col-lg-6">
                    <div class="outer">
                        <div id="big" class="owl-carousel owl-theme">
                            <div class="item">
                                <img src="data/news/{{$buckle->img}}" alt="">
                            </div>
                            @foreach($buckle->images as $val)
                            <div class="item">
                                <img src="data/product/detail/{{$val->img}}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div id="thumbs" class="owl-carousel owl-theme">
                            <div class="item">
                                <img src="data/news/{{$buckle->img}}" alt="">
                            </div>
                            @foreach($buckle->images as $val)
                            <div class="item">
                                <img src="data/product/detail/{{$val->img}}" alt="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="desc">
                        <h3>{{$buckle->name}}</h3>
                        <hr>
                        <div class="price_box">
                            <span class="current_price">
                                <small>{{ $buckle->price ? $buckle->unit : '' }}</small> 
                                <span>{{ $buckle->price ? number_format($body->price) : 'Giá bán: Liên hệ' }}</span>
                            </span>
                            <span class="exchange">
                                @if($buckle->unit == '¥')
                                <small>(~₫&nbsp;</small>
                                <span> {{number_format($body->price * $setting->exchange)}})</span>
                                @endif
                            </span>
                            <span class="old_price">
                                @php if(isset($buckle->sale)){
                                    echo '<small>₫&nbsp;</small>'.number_format($buckle->price*(1+$buckle->sale/100));
                                } @endphp
                            </span>
                        </div>
                        <div>
                            {{$buckle->detal}}
                        </div>
                        <p class="genuine"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--mini cart end-->

@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
  var bigimage = $("#big");
  var thumbs = $("#thumbs");
  //var totalslides = 10;
  var syncedSecondary = false;

  bigimage
    .owlCarousel({
    items: 1,
    slideSpeed: 2000,
    nav: false,
    autoplay: false,
    dots: false,
    loop: false,
    responsiveRefreshRate: 200,
    navText: [
      '<span class="lnr lnr-chevron-left"></span>',
      '<span class="lnr lnr-chevron-right"></span>'
    ]
  })
    .on("changed.owl.carousel", syncPosition);

  thumbs
    .on("initialized.owl.carousel", function() {
    thumbs
      .find(".owl-item")
      .eq(0)
      .addClass("current");
  })
    .owlCarousel({
    items: 5,
    dots: false,
    nav: false,
    // navText: [
    //   '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
    //   '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
    // ],
    smartSpeed: 200,
    slideSpeed: 500,
    slideBy: 4,
    responsiveRefreshRate: 100
  })
    .on("changed.owl.carousel", syncPosition2);

  function syncPosition(el) {
    //if loop is set to false, then you have to uncomment the next line
    //var current = el.item.index;

    //to disable loop, comment this block
    var count = el.item.count - 1;
    var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

    if (current < 0) {
      current = count;
    }
    if (current > count) {
      current = 0;
    }
    //to this
    thumbs
      .find(".owl-item")
      .removeClass("current")
      .eq(current)
      .addClass("current");
    var onscreen = thumbs.find(".owl-item.active").length - 1;
    var start = thumbs
    .find(".owl-item.active")
    .first()
    .index();
    var end = thumbs
    .find(".owl-item.active")
    .last()
    .index();

    if (current > end) {
      thumbs.data("owl.carousel").to(current, 100, true);
    }
    if (current < start) {
      thumbs.data("owl.carousel").to(current - onscreen, 100, true);
    }
  }

  function syncPosition2(el) {
    if (syncedSecondary) {
      var number = el.item.index;
      bigimage.data("owl.carousel").to(number, 100, true);
    }
  }

  thumbs.on("click", ".owl-item", function(e) {
    e.preventDefault();
    var number = $(this).index();
    bigimage.data("owl.carousel").to(number, 300, true);
  });
});
</script>
@endsection