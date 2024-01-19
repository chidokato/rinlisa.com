@extends('layout.index')

@section('title') {{$setting->title ? $setting->title : $setting->name}} @endsection
@section('description') {{$setting->description}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('css')

@endsection

@section('content')
<!--slider area start-->
    <section class="slider_section  mb-42">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="slider_area slider_three owl-carousel">
                        @foreach($slider as $key => $val)
                        <div class="single_slider d-flex align-items-center" data-bgimg="data/home/{{$val->img}}" style="background-size: cover;">
                            <div class="slider_content">
                                <h2>GM 10 & 12</h2>
                                <h1>Bolt Rear Disc Brake Conversions</h1>
                                <a class="button" href="shop.html">shopping now</a>
                            </div>
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
                            @foreach($sphot as $key => $val)
                            @if($key % 2 == 0)
                            <div class="single_items">
                                <div class="single_featured">
                                    <div class="featured_thumb">
                                        <a href="{{$sphot[$key]->category->slug}}/{{$sphot[$key]->slug}}"><img src="data/news/{{ $sphot[$key]->img }}" alt=""></a>
                                    </div>
                                    <div class="featured_content">
                                        <h3 class="product_name text-truncate-set text-truncate-set-2"><a href="{{$sphot[$key]->category->slug}}/{{$sphot[$key]->slug}}">{{ $sphot[$key]->name }}</a></h3>
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
                                                <span class="current_price">{{ $sphot[$key]->price ? number_format($sphot[$key]->price) .' '. $sphot[$key]->unit : 'Liên hệ' }}</span>
                                                <span class="old_price">{{ $sphot[$key]->price ? number_format($sphot[$key]->price*1.2) .' '. $sphot[$key]->unit : '' }}</span>
                                            </div>
                                            @if($sphot[$key]->genuine == 'on')
                                            <p class="genuine" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
                                            @endif
                                            <!-- <div class="quantity_progress">
                                                <p class="product_sold">đã bán: <span>{{rand(50, 100)}} </span> sản phẩm</p>
                                            </div> -->
                                        </div>
                                        <!-- <div class="sub_featured">
                                            <ul>
                                                <li><a href="#">{{ $sphot[$key]->shape ? 'Hình dạng: '.$sphot[$key]->shape:'' }}</a></li>
                                                <li><a href="#">{{ $sphot[$key]->color ? 'Màu sắc: '.$sphot[$key]->color:'' }}</a></li>
                                                <li>
                                                    <div class="price_box">
                                                        <span class="current_price">
                                                            
                                                        </span>
                                                        <span class="old_price">$180.00</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div> -->
                                        <!-- <a data-url="{{route('addTocart', ['id' => $sphot[$key]->id])}}" class="add_cart" href="#">Thêm giỏ hàng</a> -->
                                    </div>
                                </div>
                                <div class="single_featured">
                                    <div class="featured_thumb">
                                        <a href="{{$sphot[$key+1]->category->slug}}/{{$sphot[$key+1]->slug}}"><img src="data/news/{{ $sphot[$key+1]->img }}" alt=""></a>
                                    </div>
                                    <div class="featured_content">
                                        <div>
                                            <h3 class="product_name text-truncate-set text-truncate-set-2"><a href="{{$sphot[$key+1]->category->slug}}/{{$sphot[$key+1]->slug}}">{{ $sphot[$key+1]->name }}</a></h3>
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
                                                    <span class="current_price">{{ $sphot[$key+1]->price ? number_format($sphot[$key+1]->price) .' '. $sphot[$key+1]->unit : 'Liên hệ' }}</span>
                                                    <span class="old_price">{{ $sphot[$key+1]->price ? number_format($sphot[$key+1]->price*1.2) .' '. $sphot[$key+1]->unit : '' }}</span>
                                                </div>
                                                <!-- <div class="quantity_progress">
                                                    <p class="product_sold">đã bán: <span>{{rand(50, 100)}} </span> sản phẩm</p>
                                                </div> -->
                                                @if($sphot[$key+1]->genuine == 'on')
                                                <p class="genuine" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
                                                @endif
                                            </div>
                                            <!-- <div class="sub_featured">
                                                <ul>
                                                    <li><a href="#">{{ $sphot[$key]->shape ? 'Hình dạng: '.$sphot[$key]->shape:'' }}</a></li>
                                                    <li><a href="#">{{ $sphot[$key]->color ? 'Màu sắc: '.$sphot[$key]->color:'' }}</a></li>
                                                    <li>
                                                        <div class="price_box">
                                                            <span class="current_price">
                                                                
                                                            </span>
                                                            <span class="old_price">$180.00</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div> -->
                                        </div>
                                        <!-- <a data-url="{{route('addTocart', ['id' => $sphot[$key]->id])}}" class="add_cart" href="#">Thêm giỏ hàng</a> -->
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
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
                                    <span class="old_price">{{ $val->price ? number_format($val->price*1.2) .' '. $val->unit : '' }}</span>
                                </div>
                                <!-- <div class="quantity_progress">
                                    <p class="product_sold">Sold: <span>199</span></p>
                                    <p class="product_available">Availabe: <span>9800</span></p>
                                </div> -->
                                <!-- <div class="bar_percent">
                                </div> -->
                                @if($val->genuine == 'on')
                                <p class="genuine" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
                                @endif
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="product_carousel product_bg  product_column2 owl-carousel">
                            @foreach($seikonam as $key => $val)
                            @if($key > 0 && $key % 3 == 0)
                            <div class="small_product">
                                <div class="single_product">
                                    <div class="product_content">
                                        <h3><a href="{{ $seikonam[$key]->category->slug }}/{{ $seikonam[$key]->slug }}" class="text-truncate-set text-truncate-set-2">{{ $seikonam[$key]->name }}</a></h3>
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
                                            <span class="current_price">{{ $seikonam[$key+1]->price ? number_format($seikonam[$key+1]->price) .' '. $seikonam[$key+1]->unit : 'Liên hệ' }}</span>
                                            <span class="old_price">{{ $seikonam[$key+1]->price ? number_format($seikonam[$key+1]->price*1.2) .' '. $seikonam[$key+1]->unit : '' }}</span>
                                        </div>
                                        @if($seikonam[$key]->genuine == 'on')
                                        <p class="genuine" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
                                        @endif
                                    </div>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{ $seikonam[$key]->category->slug }}/{{ $seikonam[$key]->slug }}"><img src="data/news/{{ $seikonam[$key]->img }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="single_product">
                                    <div class="product_content">
                                        <h3><a href="{{ $seikonam[$key+1]->category->slug }}/{{ $seikonam[$key+1]->slug }}" class="text-truncate-set text-truncate-set-2">{{ $seikonam[$key+1]->name }}</a></h3>
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
                                            <span class="current_price">{{ $seikonam[$key+1]->price ? number_format($seikonam[$key+1]->price) .' '. $seikonam[$key+1]->unit : 'Liên hệ' }}</span>
                                            <span class="old_price">{{ $seikonam[$key+1]->price ? number_format($seikonam[$key+1]->price*1.2) .' '. $seikonam[$key+1]->unit : '' }}</span>
                                        </div>
                                        @if($seikonam[$key+1]->genuine == 'on')
                                        <p class="genuine" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
                                        @endif
                                    </div>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{ $seikonam[$key+1]->category->slug }}/{{ $seikonam[$key+1]->slug }}"><img src="data/news/{{ $seikonam[$key+1]->img }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="single_product">
                                    <div class="product_content">
                                        <h3><a href="{{ $seikonam[$key+2]->category->slug }}/{{ $seikonam[$key+2]->slug }}" class="text-truncate-set text-truncate-set-2">{{ $seikonam[$key+2]->name }}</a></h3>
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
                                            <span class="current_price">{{ $seikonam[$key+2]->price ? number_format($seikonam[$key+2]->price) .' '. $seikonam[$key+2]->unit : 'Liên hệ' }}</span>
                                            <span class="old_price">{{ $seikonam[$key+2]->price ? number_format($seikonam[$key+2]->price*1.2) .' '. $seikonam[$key+2]->unit : '' }}</span>
                                        </div>
                                        @if($seikonam[$key+2]->genuine == 'on')
                                        <p class="genuine" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
                                        @endif
                                    </div>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{ $seikonam[$key+2]->category->slug }}/{{ $seikonam[$key+2]->slug }}"><img src="data/news/{{ $seikonam[$key+2]->img }}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            @endif
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
                                    <span class="old_price">{{ $val->price ? number_format($val->price*1.2) .' '. $val->unit : '' }}</span>
                                </div>
                                <!-- <div class="quantity_progress">
                                    <p class="product_sold">Sold: <span>199</span></p>
                                    <p class="product_available">Availabe: <span>9800</span></p>
                                </div> -->
                                <!-- <div class="bar_percent">
                                </div> -->
                                @if($val->genuine == 'on')
                                <p class="genuine" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
                                @endif
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="product_carousel product_bg  product_column2 owl-carousel">
                            @foreach($seikonu as $key => $val)
                            @if($key % 3 == 0)
                            <div class="small_product">
                                <div class="single_product">
                                    <div class="product_content">
                                        <h3><a href="{{ $seikonu[$key]->category->slug }}/{{ $seikonu[$key]->slug }}" class="text-truncate-set text-truncate-set-2">{{ $seikonu[$key]->name }}</a></h3>
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
                                            <span class="current_price">{{ $seikonu[$key]->price ? number_format($seikonu[$key]->price) .' '. $seikonu[$key]->unit : 'Liên hệ' }}</span>
                                            <span class="old_price">{{ $seikonu[$key]->price ? number_format($seikonu[$key]->price*1.2) .' '. $seikonu[$key]->unit : '' }}</span>
                                        </div>
                                        @if($seikonu[$key]->genuine == 'on')
                                        <p class="genuine" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
                                        @endif
                                    </div>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{ $seikonu[$key]->category->slug }}/{{ $seikonu[$key]->slug }}"><img src="data/news/{{ $seikonu[$key]->img }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="single_product">
                                    <div class="product_content">
                                        <h3><a href="{{ $seikonu[$key+1]->category->slug }}/{{ $seikonu[$key+1]->slug }}" class="text-truncate-set text-truncate-set-2">{{ $seikonu[$key+1]->name }}</a></h3>
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
                                            <span class="current_price">{{ $seikonu[$key+1]->price ? number_format($seikonu[$key+1]->price) .' '. $seikonu[$key+1]->unit : 'Liên hệ' }}</span>
                                            <span class="old_price">{{ $seikonu[$key+1]->price ? number_format($seikonu[$key+1]->price*1.2) .' '. $seikonu[$key+1]->unit : '' }}</span>
                                        </div>
                                        @if($seikonu[$key+1]->genuine == 'on')
                                        <p class="genuine" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
                                        @endif
                                    </div>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{ $seikonu[$key+1]->category->slug }}/{{ $seikonu[$key+1]->slug }}"><img src="data/news/{{ $seikonu[$key+1]->img }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="single_product">
                                    <div class="product_content">
                                        <h3><a href="{{ $seikonu[$key+2]->category->slug }}/{{ $seikonu[$key+2]->slug }}" class="text-truncate-set text-truncate-set-2">{{ $seikonu[$key+2]->name }}</a></h3>
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
                                            <span class="current_price">{{ $seikonu[$key+2]->price ? number_format($seikonu[$key+2]->price) .' '. $seikonu[$key+2]->unit : 'Liên hệ' }}</span>
                                            <span class="old_price">{{ $seikonu[$key+2]->price ? number_format($seikonu[$key+2]->price*1.2) .' '. $seikonu[$key+2]->unit : '' }}</span>
                                        </div>
                                        @if($seikonu[$key+2]->genuine == 'on')
                                        <p class="genuine" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
                                        @endif
                                    </div>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{ $seikonu[$key+2]->category->slug }}/{{ $seikonu[$key+2]->slug }}"><img src="data/news/{{ $seikonu[$key+2]->img }}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            @endif
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
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="{{$val->category->slug}}/{{$val->slug}}"><img src="data/news/{{$val->img}}" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-20%</span>
                                </div>

                                <!-- <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                        <li class="cart"><a href="" title="compare"><span class="lnr lnr-cart"></span></a></li>
                                    </ul>
                                </div> -->
                            </div>
                            <div class="product_content">
                                <div class="product_name">
                                    <h3><a href="{{$val->category->slug}}/{{$val->slug}}">{{$val->name}}</a></h3>
                                </div>
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">{{ $val->price ? number_format($val->price) .' '. $val->unit : '' }}</span>
                                        <span class="old_price">{{ $val->price ? number_format($val->price*1.2) .' '. $val->unit : '' }}</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a data-url="{{route('addTocart', ['id' => $val->id])}}" href="#" class="add_cart"><span class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <h2><span> <strong>Our</strong>Products</span></h2>
                        <ul class="product_tab_button nav" role="tablist" id="nav-tab2">
                            <li>
                                <a class="active" data-toggle="tab" href="#brake" role="tab" aria-controls="brake" aria-selected="true">Brake Parts</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#wheels" role="tab" aria-controls="wheels" aria-selected="false">Wheels & Tires</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="brake" role="tabpanel">
                    <div class="product_carousel product_column5 owl-carousel">
                        <?php for($j = 1; $j <= 6; $j++){ ?>
                        <div class="single_product_list">
                            <?php for($i = 1; $i <= 2; $i++){ ?>
                            <?php include('layout/single_product.php') ?>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="wheels" role="tabpanel">
                    <div class="product_carousel product_column5 owl-carousel">
                        <?php for($j = 1; $j <= 6; $j++){ ?>
                        <div class="single_product_list">
                            <?php for($i = 1; $i <= 2; $i++){ ?>
                            <?php include('layout/single_product.php') ?>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="turbo" role="tabpanel">
                    <div class="product_carousel product_column5 owl-carousel">
                        <div class="single_product_list">
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="product-details.html">JBL Flip 3 Splasroof Portable Bluetooth 2</a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="assets/img/product/product10.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product11.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-57%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
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
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="regular_price">$180.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="product-details.html">Bose SoundLink Bluetooth Speaker</a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="assets/img/product/product12.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product11.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-47%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
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
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="current_price">$160.00</span>
                                            <span class="old_price">$3200.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product_list">
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="product-details.html">Variable with soldout product for title</a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="assets/img/product/product13.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product14.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-57%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
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
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="regular_price">$150.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="product-details.html">Lorem ipsum dolor sit amet, consectetur</a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="assets/img/product/product15.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product16.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-57%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
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
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="regular_price">$175.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product_list">
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="product-details.html">JBL Flip 3 Splasroof Portable Bluetooth 2</a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="assets/img/product/product17.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product18.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-07%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
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
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="current_price">$180.00</span>
                                            <span class="old_price">$420.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="product-details.html">Accusantium dolorem Security Camera</a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="assets/img/product/product1.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product2.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-57%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
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
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="current_price">$140.00</span>
                                            <span class="old_price">$320.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product_list">
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="product-details.html">nulla sapiente, aperiam et blanditiis repudiandae.</a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="assets/img/product/product3.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product4.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-57%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
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
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="regular_price">$160.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="assets/img/product/product5.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product6.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-57%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
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
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="regular_price">$160.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product_list">
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="product-details.html">nulla sapiente, aperiam et blanditiis repudiandae.</a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="assets/img/product/product7.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product8.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-57%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
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
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="regular_price">$160.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="assets/img/product/product9.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product10.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-57%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
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
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="regular_price">$160.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product_list">
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="product-details.html">nulla sapiente, aperiam et blanditiis repudiandae.</a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="assets/img/product/product11.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product12.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-57%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
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
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="regular_price">$160.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="assets/img/product/product13.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product14.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-57%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
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
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="regular_price">$160.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_product_list">
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="product-details.html">nulla sapiente, aperiam et blanditiis repudiandae.</a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="assets/img/product/product15.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product16.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-57%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
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
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="regular_price">$160.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_name">
                                    <h3><a href="product-details.html">Koss Porta Pro On Ear Headphones </a></h3>
                                    <p class="manufacture_product"><a href="#">Accessories</a></p>
                                </div>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="assets/img/product/product17.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img src="assets/img/product/product18.jpg" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">-57%</span>
                                    </div>

                                    <div class="action_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                            <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                        </ul>
                                    </div>
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
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="regular_price">$160.00</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--product area end-->
    

    <!--brand area start-->
    <div class="brand_area mb-50">
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
    </div>
    <!--brand area end-->

@endsection

@section('js')



@endsection
