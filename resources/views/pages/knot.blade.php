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
                <div class="main-knot">
                    <div class="v_arm"><img class="" src="assets/knot/v_arm.png"></div>
                    <div class="mat"><img class="" src="assets/knot/cap-38svwh.png"></div>
                    <div class="str_m"><img class="" src="assets/knot/str_m.png"></div>
                </div>
                <!-- <div class="info">
                    <div class="price">¥ 1.566</div>
                    <button class="button">Thêm giỏ hàng</button>
                </div> -->
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
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="mat" role="tabpanel">
                        <div class="row">
                            @foreach($mat as $val)
                                @if($val->img_1 != null)
                                <div class="col-lg-4 col-md-4">
                                    <a class="clik_body" data-url="{{route('clik_body', ['id' => $val->id])}}" href="">
                                        <div class="iteam">
                                            <img src="data/product/knot/{{$val->img_1}}">
                                            <div class="info">{{$val->name}} <br> <span>¥ {{$val->price}}</span></div>
                                        </div>
                                    </a>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="day" role="tabpanel">
                        <div class="row">
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
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="khoa" role="tabpanel">
                        <div class="row">
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