@extends('layout.index')

@section('title') {{$setting->title ? $setting->title : $setting->name}} @endsection
@section('description') {{$setting->description}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('css')

@endsection

@section('content')
<!--slider area start-->
    <section class="slider_section mt-20 mb-42">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="slider_area slider_three owl-carousel">
                        @foreach($slider as $key => $val)
                        <div class="single_slider d-flex align-items-center" data-bgimg="data/home/{{$val->img}}" style="background-size: cover;">
                            <!-- <div class="slider_content">
                                <p class="title">{{$val->name}}</p>
                                <p class="sub">{{$val->content}}</p>
                            </div> -->
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 offset-md-4 offset-lg-0">
                    <div class="sidebar_banner">
                        <div class="banner_thumb">
                            <a href=""><img src="assets/img/bg/banner6.jpg" alt=""></a>
                            <div class="banner_text">
                                <h4>Jegs Oil</h4>
                                <h3>Engine</h3>
                                <h2>50% Off</h2>
                                <a href="shop.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--slider area end-->


    <!--featured categories area start-->
    <section class="featured_categories featured_c_three mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2><span> <strong>Sản phẩm</strong>Nổi bật</span></h2>
                    </div>
                    @if(count($sphot)>=6)
                    <div class="featured_container">
                        <div class="featured_carousel featured_column3 owl-carousel">
                            @include('pages.iteam.product_2row')
                        </div>
                    </div>
                    @else
                    <p style="color: red">Phải ít nhất <strong>6 sản phẩm</strong> để hiển thị !!</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--featured categories area end-->

    <!--product area start-->
    <section class="new_product_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_tab_button tab_button2">
                        <ul class=" nav" role="tablist" id="nav-tab">
                            <li>
                                <a class="active" data-toggle="tab" href="#mat" role="tab" aria-controls="featured" aria-selected="true"><span>Đồng hồ </span> SEIKO nam</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#day" role="tab" aria-controls="view" aria-selected="false"><span>Đồng hồ </span> SEIKO nữ</a>
                            </li>
                            
                        </ul>
                    </div>

                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="mat" role="tabpanel">
                    <div class="new_product_container">
                        @foreach($seikonam as $key => $val)
                        @if($key == 0)
                        <div class="sample_product">
                            <div class="product_name">
                                <h3><a href="{{$val->category->slug}}/{{$val->slug}}">{{$val->name}}</a></h3>
                                <div class="manufacture_product">
                                    <p><a href="{{$val->category->slug}}">{{$val->category->name}}</a></p>
                                </div>
                            </div>
                            <div class="product_thumb">
                                <a href="{{$val->category->slug}}/{{$val->slug}}"><img src="data/news/{{$val->img}}" alt=""></a>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="price_box">
                                    <span class="current_price">{{ $val->price ? number_format($val->price) .' '. $val->unit : 'Liên hệ' }}</span>
                                    <span class="old_price">{{ $val->sale ? number_format($val->price*(1+$val->sale/100)) .' '. $val->unit : '' }}</span>
                                </div>
                                @if($val->genuine == 'on')
                                <p class="genuine" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
                                @endif
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="product_carousel product_bg  product_column2 owl-carousel">
                            @foreach($seikonam as $key => $val)
                                @include('pages.iteam.seikonam')
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="day" role="tabpanel">
                    <div class="new_product_container">
                        @foreach($seikonu as $key => $val)
                        @if($key == 0)
                        <div class="sample_product">
                            <div class="product_name">
                                <h3><a href="{{$val->category->slug}}/{{$val->slug}}">{{$val->name}}</a></h3>
                                <div class="manufacture_product">
                                    <p><a href="{{$val->category->slug}}">{{$val->category->name}}</a></p>
                                </div>
                            </div>
                            <div class="product_thumb">
                                <a href="{{$val->category->slug}}/{{$val->slug}}"><img src="data/news/{{$val->img}}" alt=""></a>
                            </div>
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="price_box">
                                    <span class="current_price">{{ $val->price ? number_format($val->price) .' '. $val->unit : 'Liên hệ' }}</span>
                                    <span class="old_price">{{ $val->sale ? number_format($val->price*(1+$val->sale/100)) .' '. $val->unit : '' }}</span>
                                </div>
                                @if($val->genuine == 'on')
                                <p class="genuine" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
                                @endif
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="product_carousel product_bg  product_column2 owl-carousel">
                            @foreach($seikonu as $key => $val)
                                @include('pages.iteam.seikonu')
                            @endforeach
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!--product area end-->

    <!--banner area start-->
    <section class="banner_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner_container">
                        <div class="single_banner">
                            <div class="banner_thumb">
                                <a href="#"><img src="assets/img/bg/banner3.jpg" alt=""></a>
                                <div class="banner_text">
                                    <h3>Car Audio</h3>
                                    <h2>Super Natural Sound</h2>
                                    <a href="shop.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="single_banner">
                            <div class="banner_thumb">
                                <a href="#"><img src="assets/img/bg/banner4.jpg" alt=""></a>
                                <div class="banner_text">
                                    <h3>All - New</h3>
                                    <h2>Perfomance Parts</h2>
                                    <a href="shop.html">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--banner area end-->

    <!--product area start-->
    <section class="product_area mb-50 category">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2><span> <strong>Cafe</strong></span></h2>
                    </div>
                    <div class="product_carousel product_column4 owl-carousel">
                        @foreach($cafe as $val)
                        @include('pages.iteam.product')
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--product area end-->

    <!--banner area start-->
    <section class="banner_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single_banner banner_fullwidth">
                        <div class="banner_thumb">
                            <a href="#"><img src="assets/img/bg/banner5.jpg" alt=""></a>
                            <div class="banner_text">
                                <h2>Win the cost of your</h2>
                                <h3>Tyres back</h3>
                                <p>Chance to win when you buy 2 + Pirell Tyres in March</p>
                                <a href="shop.html">Discover Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--banner area end-->

    <!--product area start-->
    <section class="product_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2><span> <strong>Sản phẩm</strong>mới nhất</span></h2>
                        <ul class="product_tab_button nav" role="tablist" id="nav-tab2">
                            <li>
                                <a class="active" data-toggle="tab" href="#mypham" role="tab" aria-controls="brake" aria-selected="true">Mỹ phẩm</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#thucpham" role="tab" aria-controls="wheels" aria-selected="false">Thực phẩm làm đẹp</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#traicay" role="tab" aria-controls="wheels" aria-selected="false">Trái cây</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="tab-content category">
                <div class="tab-pane fade show active" id="mypham" role="tabpanel">
                    <div class="row">
                        @foreach($mypham as $val)
                        <div class="col-lg-3 col-md-3 col-12 mb-3">
                            @include('pages.iteam.product')
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="thucpham" role="tabpanel">
                    <div class="row">
                        @foreach($thucpham as $val)
                        <div class="col-lg-3 col-md-3 col-12 mb-3">
                            @include('pages.iteam.product')
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="traicay" role="tabpanel">
                    <div class="row">
                        @foreach($traicay as $val)
                        <div class="col-lg-3 col-md-3 col-12 mb-3">
                            @include('pages.iteam.product')
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--product area end-->
    

    <!--brand area start-->
    <!-- <div class="brand_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand_container owl-carousel">
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand1.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand2.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand3.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand4.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand2.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--brand area end-->

@endsection

@section('js')



@endsection
