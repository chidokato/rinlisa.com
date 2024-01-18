@extends('layout.index')

@section('title') {{$data->title ? $data->title : $data->name}} @endsection
@section('description') {{$data->description}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('content')

<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>Camera &amp; Video </li>
                        <li>shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shop_area shop_reverse">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <!--sidebar widget start-->
                <aside class="sidebar_widget">
                    <div class="widget_inner">
                        <div class="widget_list widget_categories">
                            <h2>categories</h2>
                            <ul>
                                <?php for($i = 1; $i <= 8; $i++){ ?>
                                <li>
                                    <input type="checkbox">
                                    <a href="#">Categories1 (6)</a>
                                    <span class="checkmark"></span>
                                </li>
                                <?php } ?>

                            </ul>
                        </div>

                        
                    </div>
                    <div class="shop_sidebar_banner">
                        <a href="#"><img src="assets/img/bg/banner9.jpg" alt=""></a>
                    </div>
                </aside>
                <!--sidebar widget end-->
            </div>
            <div class="col-lg-9 col-md-12">
                <!--shop wrapper start-->
                <!--shop toolbar start-->
                <div class="shop_banner">
                    <img src="assets/img/bg/banner8.jpg" alt="">
                </div>
                <div class="shop_title">
                    <h1>shop</h1>
                </div>
                <div class="shop_toolbar_wrapper">
                    <div class="shop_toolbar_btn">
                        <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"></button>
                        <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip" title="List"></button>
                    </div>
                    <div class="page_amount">
                        <p>Showing 1–9 of 21 results</p>
                    </div>
                </div>
                <!--shop toolbar end-->

                <div class="row shop_wrapper">
                    @foreach($post as $val)
                    <div class="col-lg-4 col-md-4 col-12 ">
                        <div class="single_product">
                            
                            <div class="product_thumb">
                                <a class="primary_img" href="{{$val->category->slug}}/{{$val->slug}}"><img src="data/news/{{$val->img}}" alt=""></a>
                                <!-- <a class="secondary_img" href=""><img src="assets/img/product/product11.jpg" alt=""></a> -->
                                <div class="label_product">
                                    <span class="label_sale">-20%</span>
                                </div>
                                <!-- <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="" title="compare"><span class="lnr lnr-cart"></span></a></li>
                                    </ul>
                                </div> -->
                            </div>

                            <div class="product_content grid_content">
                                <div class="product_name grid_name">
                                    <h3><a href="{{$val->category->slug}}/{{$val->slug}}">{{$val->name}}</a></h3>
                                    <!-- <p class="manufacture_product"><a href="#">{{$val->category->name}}</a></p> -->
                                </div>
                                <div class="content_inner">
                                    <div class="product_ratings d-flex" style="align-items: center;">
                                        <ul>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                            <li><a href="#"><i class="ion-star"></i></a></li>
                                        </ul>
                                        <div class="ml-1 font-1">Đã bán: {{rand(50, 100)}}</div>
                                    </div>
                                    <div class="product_footer d-flex align-items-center">
                                        <div class="price_box">
                                            <span class="current_price">{{ $val->price ? number_format($val->price) .' '. $val->unit : 'Liên hệ' }}</span>
                                            <span class="old_price">{{ $val->price ? number_format($val->price*1.2) .' '. $val->unit : '' }}</span>
                                        </div>
                                        <div class="add_to_cart">
                                            <a data-url="{{route('addTocart', ['id' => $val->id])}}" href="#" class="add_cart"><span class="lnr lnr-cart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product_content list_content">
                                <div class="left_caption">
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

                                    <div class="product_desc">
                                        <p>{{$val->detail}}</p>
                                    </div>
                                </div>
                                <div class="right_caption">
                                    <div class="text_available">
                                        <p>Đã bán: <span>{{rand(50, 100)}} Sản phẩm</span></p>
                                    </div>
                                    <div class="price_box">
                                        <span class="current_price">{{ $val->price ? number_format($val->price) .' '. $val->unit : 'Liên hệ' }}</span>
                                        <span class="old_price">{{ $val->price ? number_format($val->price*1.2) .' '. $val->unit : '' }}</span>
                                    </div>
                                    <div class="action_links_btn">
                                        <ul>
                                            <!-- <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li> -->
                                            <li class="compare"><a data-url="{{route('addTocart', ['id' => $val->id])}}" href="#" class="add_cart"><span class="lnr lnr-cart"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>

                <div class="shop_toolbar t_bottom">
                    <div class="pagination">
                        {{ $post->links() }}
                    </div>
                </div>
                <!--shop toolbar end-->
                <!--shop wrapper end-->
            </div>
        </div>
    </div>
</div>

@endsection
