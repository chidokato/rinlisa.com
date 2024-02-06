@extends('layout.index')

@section('title') {{$post->title ? $post->title : $post->name}} @endsection
@section('description') {{$post->description ? $post->description : $post->name.$post->name}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('css')

@endsection

@section('content')

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{asset('')}}">Trang chủ</a></li>
                        <li><a href="{{$post->category->slug}}">{{$post->category->name}}</a></li>
                        <li>{{$post->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--product details start-->
<div class="product_details variable_product mt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">
                    <div class="outer">
                        <div id="big" class="owl-carousel owl-theme">
                            <div class="item" >
                                <img src="data/news/{{$post->img}}">
                            </div>
                            @foreach($images as $val)
                            <div class="item">
                                <img src="data/product/detail/{{$val->img}}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div id="thumbs" class="owl-carousel owl-theme">
                            <div class="item">
                                <img src="data/news/{{$post->img}}" alt="">
                            </div>
                            @foreach($images as $val)
                            <div class="item">
                                <img src="data/product/detail/{{$val->img}}" alt="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">
                    <h1>{{$post->name}}</h1>
                    <div class="product_ratings d-flex" style="align-items: center;">
                        <ul>
                            <li><a href="#"><i class="ion-star"></i></a></li>
                            <li><a href="#"><i class="ion-star"></i></a></li>
                            <li><a href="#"><i class="ion-star"></i></a></li>
                            <li><a href="#"><i class="ion-star"></i></a></li>
                            <li><a href="#"><i class="ion-star"></i></a></li>
                        </ul>
                        <!-- <div class="ml-1 font-1">Đã bán: {{rand(50, 100)}} sản phẩm</div> -->
                    </div>
                    
                    <div class="price_box">
                        <span class="current_price">
                            <small>{{ $post->price ? $post->unit : '' }}</small> 
                            <span>{{ $post->price ? number_format($post->price) : 'Giá bán: Liên hệ' }}</span>
                        </span>
                        <span class="exchange">
                            @if($post->unit == '¥')
                            <small>(~₫&nbsp;</small>
                            <span> {{number_format($post->price*$setting->exchange)}})</span>
                            @endif
                        </span>
                        <span class="old_price">
                            @php if(isset($post->sale)){
                                echo '<small>₫&nbsp;</small>'.number_format($post->price*(1+$post->sale/100));
                            } @endphp
                        </span>
                    </div>
                    <div class="product_desc">
                        <p>{{$post->detail}}</p>
                        @if($post->genuine == 'on')
                        <p class="genuine"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
                        @endif
                    </div>
                    <!-- <div class="product_variant color">
                        <h3>Available Options</h3>
                        <label>color</label>
                        <ul>
                            <li class="color1"><a href="#"></a></li>
                            <li class="color2"><a href="#"></a></li>
                            <li class="color3"><a href="#"></a></li>
                            <li class="color4"><a href="#"></a></li>
                        </ul>
                    </div> -->

                    <!-- <div class="product_variant size">
                        <label>size</label>
                        <select class="niceselect_option" id="color2" name="produc_color2">
                            <option selected value="1"> size in option</option>
                            <option value="2">s</option>
                            <option value="3">m</option>
                            <option value="4">l</option>
                            <option value="5">xl</option>
                            <option value="6">xxl</option>
                        </select>
                    </div> -->
                    <div class="product_variant quantity">
                        <a data-url="{{route('addTocart', ['id' => $post->id])}}" href="#" class="add_cart"><button class="button" type="button"><span class="lnr lnr-cart"></span> Thêm vào giỏ hàng</button></a>
                    </div>
                    <div class=" product_d_action">
                        <ul>
                            <li><span class="lnr lnr-phone"></span> Gọi đặt mua: 1900.6868 (24/7)</li>
                        </ul>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
</div>
<!--product details end-->

<!--product info start-->
<div class="product_d_info">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist" id="nav-tab">
                            <li>
                                <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Giới thiệu chi tiết</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Thông số</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="product_info_content">
                                {!! $post->content !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sheet" role="tabpanel">
                            <div class="product_info_content">
                                {!! $post->parameter !!}
                            </div>
                        </div>

                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="reviews_wrapper">
                                <h2>1 review for Donec eu furniture</h2>
                                <div class="reviews_comment_box">
                                    <div class="comment_thmb">
                                        <img src="assets/img/blog/comment2.jpg" alt="">
                                    </div>
                                    <div class="comment_text">
                                        <div class="reviews_meta">
                                            <div class="star_rating">
                                                <ul>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <p><strong>admin </strong>- September 12, 2018</p>
                                            <span>roadthemes</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="comment_title">
                                    <h2>Add a review </h2>
                                    <p>Your email address will not be published. Required fields are marked </p>
                                </div>
                                <div class="product_ratting mb-10">
                                    <h3>Your rating</h3>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_review_form">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="review_comment">Your review </label>
                                                <textarea name="comment" id="review_comment"></textarea>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="author">Name</label>
                                                <input id="author" type="text">

                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="email">Email </label>
                                                <input id="email" type="text">
                                            </div>
                                        </div>
                                        <button type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product info end-->

<!--product area start-->
<section class="product_area mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2><span> <strong>Related</strong>Products</span></h2>
                </div>
                <div class="product_carousel product_column5 owl-carousel">
                    
                    <div class="single_product">
                        <div class="product_name">
                            <h3><a href="product-details.html">Variable with soldout product for title</a></h3>
                            <p class="manufacture_product"><a href="#">Accessories</a></p>
                        </div>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img src="assets/img/product/SWFA206.png" alt=""></a>
                            <!-- <a class="secondary_img" href="product-details.html"><img src="assets/img/product/SWFA206_bac.png" alt=""></a> -->
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
                    
                </div>
            </div>
        </div>

    </div>
</section>
<!--product area end-->

@endsection

@section('js')

@endsection