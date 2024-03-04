@extends('layout.index')

@section('title') Người dùng @endsection
@section('description') Người dùng @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('content')

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{asset('')}}">Trang chủ</a></li>
                        <li>Đơn hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- my account start  -->
    <section class="main_content_area">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard sticky">
                            <button onclick="location.href='{{route('account')}}';" class="btn " type="button"><i class="fa fa-user" aria-hidden="true"></i> &nbsp; Thông tin cá nhân</button>
                            <button onclick="location.href='{{route('account_cart')}}';" class="btn acti" type="button"><i class="fa fa-cart-plus" aria-hidden="true"></i> &nbsp; Đơn hàng</button>
                            <button onclick="location.href='{{route('logout')}}';" class="btn" type="button"><i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp; Đăng xuất</button>
                        </div>
                        
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <h3 class="title1">Thông tin đơn hàng</h3>
                        <div class="accoutcarts">
                            @if(count($carts) > 0)
                            <table>
                                <tr>
                                    <th>Mã Đơn hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Người đặt hàng</th>
                                    <th>Tình trạng</th>
                                </tr>
                                @foreach($carts as $val)
                                <tr>
                                    <td><a href="{{route('account_order_dital', [$val->id])}}">ĐH00{{10+$val->id}}</a></td>
                                    <td>{{ number_format($val->all_price) }}đ</td>
                                    <td>{{$val->created_at}}</td>
                                    <td>{{$val->name}}</td>
                                    <td class="red">{{$val->status}}</td>
                                </tr>
                                @endforeach
                            </table>
                            @else
                            <p>Bạn chưa có đơn hàng nào !</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my account end   -->

@endsection

@section('script')
@endsection