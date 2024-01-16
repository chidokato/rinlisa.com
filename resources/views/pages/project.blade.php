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
                        <li><a href="index.html">home</a></li>
                        <li><a href="shop.html">shop</a></li>
                        <li><a href="shop.html">Clothing</a></li>
                        <li>product details</li>
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

                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                            <img id="zoom1" src="data/news/{{$post->img}}" alt="big-1">
                        </a>
                    </div>

                    <div class="single-zoom-thumb">
                        <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                            
                            <li>
                                <a href="#" class="elevatezoom-gallery active" data-update="" data-image="data/news/{{$post->img}}" data-zoom-image="data/news/{{$post->img}}">
                                    <img src="data/news/{{$post->img}}" alt="zo-th-1" />
                                </a>
                            </li>
                            @foreach($images as $val)
                            <li>
                                <a href="#" class="elevatezoom-gallery active" data-update="" data-image="data/product/detail/{{$val->img}}" data-zoom-image="data/product/detail/{{$val->img}}">
                                    <img src="data/product/detail/{{$val->img}}" alt="zo-th-1" />
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">
                    <form action="#">

                        <h1>{{$post->name}}</h1>
                        
                        <div class=" product_ratting">
                            <ul>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="review"><a href="#"> (customer review ) </a></li>
                            </ul>

                        </div>
                        <div class="price_box">
                            <span class="current_price">{{ $post->price ? $post->price .' '. $post->unit : '' }}</span>
                            <span class="old_price">{{ $post->price ? $post->price*1.2 .' '. $post->unit : '' }}</span>

                        </div>
                        <div class="product_desc">
                            <p>eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in </p>
                        </div>
                        <div class="product_variant color">
                            <h3>Available Options</h3>
                            <label>color</label>
                            <ul>
                                <li class="color1"><a href="#"></a></li>
                                <li class="color2"><a href="#"></a></li>
                                <li class="color3"><a href="#"></a></li>
                                <li class="color4"><a href="#"></a></li>
                            </ul>
                        </div>

                        <div class="product_variant size">
                            <label>size</label>
                            <select class="niceselect_option" id="color2" name="produc_color2">
                                <option selected value="1"> size in option</option>
                                <option value="2">s</option>
                                <option value="3">m</option>
                                <option value="4">l</option>
                                <option value="5">xl</option>
                                <option value="6">xxl</option>
                            </select>
                        </div>
                        <div class="product_variant quantity">
                            <label>quantity</label>
                            <input min="1" max="100" value="1" type="number">
                            <button class="button" type="submit">add to cart</button>

                        </div>
                        <div class=" product_d_action">
                            <ul>
                                <li><a href="#" title="Add to wishlist">+ Add to Wishlist</a></li>
                                <li><a href="#" title="Add to wishlist">+ Compare</a></li>
                            </ul>
                        </div>

                    </form>

                    <!-- <div class="product_d_meta">
                        <span>SKU: N/A</span>
                        <span>Category: <a href="#">Clothings</a></span>
                        <span>Tags: 
                            <a href="#">Creams</a>
                            <a href="#">Lotions</a>
                        </span>
                    </div> -->
                    <!-- <div class="priduct_social">
                        <ul>
                            <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>
                            <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
                            <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>
                            <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>
                            <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>
                        </ul>
                    </div> -->
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
                                <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Specification</a>
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