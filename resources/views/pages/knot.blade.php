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
                    <img class="v_arm" src="assets/knot/v_arm.png">
                    <img class="mat" src="assets/knot/cap-38svwh.png">
                    <img class="str_m" src="assets/knot/str_m.png">
                </div>
            </div>
            <div class="col-lg-5 col-md-5 knot-list">
                <ul class="nav" role="tablist" id="nav-tab">
                    <li><a class="active" data-toggle="tab" href="#mat" role="tab"><button class="btn">Mặt</button></a></li>
                    <li><a data-toggle="tab" href="#day" role="tab"><button class="btn">Dây</button></a></li>
                    <li><a data-toggle="tab" href="#khoa" role="tab"><button class="btn">Khóa</button></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="mat" role="tabpanel">
                        <div class="row">
                            @foreach($mat as $val)
                                @if($val->img_1 != null)
                                <div class="col-lg-4 col-md-4">
                                    <a href="">
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
                    <div class="tab-pane fade show" id="khoa" role="tabpanel">
                        <div class="row">
                            @foreach($khoa as $val)
                                @if($val->img_1 != null)
                                <div class="col-lg-4 col-md-4">
                                    <a href="">
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
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .knot-view .main-knot{ position:relative }
    .knot-view .v_arm{ width: 600px;}
    .knot-view .str_m{
        position: absolute;
        height: 223px;
        top: 0px;
        left: 184px;
        z-index: 1;
    }
    .knot-view .mat{
        position: absolute;
        height: 223px;
        top: 0px;
        left: 184px;
        z-index: 2;
    }
    .knot-view .iteam{ text-align:center; position:relative; padding-bottom: 20px; }
/*    .knot-view .iteam .info{ position:absolute; bottom:0px; left: 0; line-height: 18px;right: 0; }*/

    .knot-list .iteam img{ height:115px; width:100%; object-fit:cover; }
    .knot-list .nav button{ border:1px solid #ddd; padding:10px 50px }
    .knot-list ul{ justify-content: space-around; }
    .knot-list .tab-content{ margin-top:20px }
</style>

@endsection

@section('script')
@endsection