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
                        <li>Người dùng</li>
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
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav flex-column dashboard-list" id="nav-tab">
                                <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Thông tin</a></li>
                                <li> <a href="#orders" data-toggle="tab" class="nav-link">Đơn hàng</a></li>
                                <li></li>
                            </ul>
                        </div>
                        <a href="{{route('logout')}}" class="nav-link">logout</a>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade show active" id="dashboard">
                                <h3>Thông tin người dùng </h3>
                                <div class="login">
                                    <div class="login_form_container">
                                        <div class="account_login_form">
                                            <form action="#">
                                                <div class="input-radio">
                                                	<label><span class="custom-radio"><input type="radio" value="1" name="id_gender"> Nam</span></label>
                                                    <label><span class="custom-radio"><input type="radio" value="1" name="id_gender"> Nữ</span></label>
                                                </div> <br>
                                                <label>Họ và Tên</label>
                                                <input value="{{$user->yourname}}" type="text" name="first-name">

                                                <label>Số điện thoại</label>
                                                <input value="{{$user->phone}}" type="text" name="first-name">

                                                <label>Email</label>
                                                <input value="{{$user->email}}" type="mail" name="email-name">

                                                <label>Địa chỉ</label>
                                                <input value="{{$user->address}}" type="text" name="first-name">

                                                <label>Birthdate</label>
                                                <input type="text" placeholder="MM/DD/YYYY" value="" name="birthday">

                                                <div class="input-radio">
                                                	<label><span class="custom-radio"><input type="radio" value="1" name="id_gender"> Đổi mật khẩu</span></label>
                                                </div>

                                                <label>Password</label>
                                                <input type="password" disabled name="user-password">
                                                
                                                <div class="save_button primary_btn default_button">
                                                    <button type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="orders">
                                <h3>Orders</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Mã đơn hàng</th>
                                                <th>Thời gian đặt hàng</th>
                                                <th>Tổng tiền</th>
                                                <th>Tình trạng</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order as $val)
                                            <tr>
                                                <td>{{$val->sku}}</td>
                                                <td>{{date_format($val->created_at,"d/m/Y - h:i")}}</td>
                                                <td></td>
                                                <td><span class="success">Chờ xác nhận</span></td>
                                                <td>$25.00 for 1 item </td>
                                                <td><a href="cart.html" class="view">view</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
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