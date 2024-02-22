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
                            <div class="mat"><img class="" src="assets/knot/cap-38svwh.png"></div>
                            <div class="str_m"><img class="" src="assets/knot/str_m.png"></div>
                        </div>
                    </div>
                    <div class="tab-pane fade show " id="mode_on" role="tabpanel">
                        <div class="mode_on">
                            <div class="face"><img class="" src="assets/knot/cap-38svwh.png"></div>
                            <div class="flat_top"><img class="" src="assets/knot/flat_top.png"></div>
                            <div class="flat_bottom"><img class="" src="assets/knot/flat_bottom.png"></div>
                            <div class="rg"><img class="" src="assets/knot/rg.png"></div>
                        </div>
                    </div>
                </div>
                <ul class="chitiet">
                    <div class="price_face_parent"><div class="price_face" data-id="54600"></div></div>
                    <div class="price_strap_parent"><div class="price_strap" data-id="5950"></div></div>
                    <div class="price_rg_parent"><div class="price_rg" data-id="850"></div></div>

                    <li><a href="">Chi tiết</a></li>
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

<style type="text/css">
    
</style>


@endsection

@section('script')
@endsection