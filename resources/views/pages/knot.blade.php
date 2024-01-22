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
            <div class="col-lg-5 col-md-5">
                <div class="flex">
                    <button class="btn">Mặt</button>
                    <button class="btn">Dây</button>
                </div>
                <div class="row iteam-list">
                    @foreach($mat as $val)
                    <div class="col-lg-4 col-md-4 iteam">
                        <a href="">
                            <img src="data/news/{{$val->img}}">
                            <div class="info">{{$val->name}} <br> <span>¥ {{$val->price}}</span></div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .knot-view .iteam-list{ height:500px; overflow:auto; }
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
    .knot-view .flex{ justify-content: flex-start; }
    .knot-view .flex button{ border:1px solid #ddd; border-radius:0px; padding:10px 35px; width:50% }
    .knot-view .iteam{ text-align:center; position:relative; padding-bottom: 20px; }
    .knot-view .iteam .info{ position:absolute; bottom:0px; left: 0; line-height: 18px;
    right: 0; }
</style>

@endsection

@section('script')
@endsection