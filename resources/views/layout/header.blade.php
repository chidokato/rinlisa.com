<?php use App\Models\Menu; ?>
<div class="header_middle middle_two">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-3 parent_logo">
                <div class="Offcanvas_menu">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
                </div>
                <div class="logo">
                    <a href="{{asset('')}}">
                        <!-- <img src="data/home/{{$setting->img}}" alt=""> -->
                        <img src="https://rinlisa.com/data/home/logo3.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="middel_right">
                    <div class="search-container search_two">
                        <form action="search" method="GET">
                            <div class="search_box">
                                <input name="key" placeholder="Search entire store here ..." type="text">
                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="middel_right_info">
                        <div class="header_wishlist">
                            <a href="{{route('account')}}"><span class="lnr lnr-user"></span> Account </a>
                            <!-- <span class="wishlist_quantity">3</span> -->
                        </div>
                        
                        <div class="mini_cart_wrapper_1">
                            <a href="{{route('showCart')}}"><span class="lnr lnr-cart"></span>My Cart </a>
                            <span class="cart_quantity"> {{ session()->has('cart') ? count(session()->get('cart')) : '0' }} </span>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<header class="header_area header_padding">
    <!--header bottom satrt-->
    <div class="header_bottom header_b_three sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="main_menu header_position">
                        <nav>
                            <ul>
                                <li><a href="{{asset('')}}">Trang chủ</a></li>
                                @foreach($menu as $val)
                                <?php $subs = Menu::where('parent', $val->id)->get(); ?>
                                @if(count($subs) > 0)
                                <li><a href="{{$val->slug}}">{{$val->name}}<i class="fa fa-angle-down"></i></a>
                                    <ul class="sub_menu pages">
                                        @foreach($subs as $sub)
                                        <li><a href="{{$sub->slug}}">{{$sub->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @else
                                <li><a href="{{$val->slug}}">{{$val->name}}</a></li>
                                @endif
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--header bottom end-->

</header>
<!--header area end-->


<!--Offcanvas menu area start-->
<div class="off_canvars_overlay"></div>
<div class="Offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                
                <div class="Offcanvas_menu_wrapper">

                    <div class="canvas_close">
                        <a href="#"><i class="ion-android-close"></i></a>
                    </div>

                    <div class="top_right text-end">
                        <ul class="a1234">
                            <li><a href="{{route('account')}}"><span class="lnr lnr-user"></span> Account</a></li>
                            <li>
                                <a href="{{route('showCart')}}"><span class="lnr lnr-cart"></span> My Cart</a>
                                <span class="cart_quantity"> ({{ session()->has('cart') ? count(session()->get('cart')) : '0' }}) </span>
                            </li>
                        </ul>
                    </div>
                    <div class="search-container">
                        <form action="#">
                            <div class="search_box">
                                <input placeholder="Search entire store here ..." type="text">
                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                            </div>
                        </form>
                    </div>
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children">
                                <a href="{{asset('')}}">Trang chủ</a>
                            </li>
                            @foreach($menu as $val)
                            <?php $subs = Menu::where('parent', $val->id)->get(); ?>
                            @if(count($subs) > 0)
                            <li class="menu-item-has-children">
                                <a href="{{$val->slug}}">{{$val->name}}</a>
                                <ul class="sub-menu">
                                    @foreach($subs as $sub)
                                    <li><a href="{{$sub->slug}}">{{$sub->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @else
                            <li class="menu-item-has-children">
                                <a href="{{$val->slug}}">{{$val->name}}</a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--Offcanvas menu area end-->