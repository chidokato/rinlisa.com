@extends('layout.index')

@section('title') Giỏ hàng @endsection
@section('description') Giỏ hàng @endsection
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
                        <li>Thanh toán</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shop_area">
    <div class="container">
        <div class="row">
            <div class="col-7 dathang">
                <h2>Thông tin đặt hàng</h2>
                <div class="form-group">
                    <label>Họ & Tên</label>
                    <input name="name" value="{{Auth::User()->yourname}}" placeholder="..." type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input name="phone" value="{{Auth::User()->phone}}" placeholder="..." type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Địa chỉ Email</label>
                    <input disabled name="email" value="{{Auth::User()->email}}" placeholder="..." type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input name="address" value="{{Auth::User()->address}}" placeholder="..." type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Ghi chú</label>
                    <textarea class="form-control" rows="2" placeholder="Ghi chú của khách hàng khi đặt hàng !"></textarea>
                </div>
                <div class="form-group huongdangdathang">
                    <p>Xin cảm ơn Quý Khách đã đặt mua sản phẩm tại Hệ Thống Đồng hồ Duy Anh (Duy Anh Watch) - Đại lý Ủy Quyền Chính thức tại Việt Nam của các thương hiệu đồng hồ danh tiếng trên thế giới</p>

                    <p>Vì quyền lợi của mình, Quý Khách vui lòng đọc kỹ những thông tin dưới đây để hoàn tất thủ tục đặt hàng. Duy Anh có quyền từ chối giải quyết các yêu cầu phát sinh của quý khách phát sinh do việc không đọc kỹ các thông tin này</p>

                    <p>1. Sản phẩm</p>
                    <p>Duy Anh Watch chỉ kinh doanh các sản phẩm đồng hồ chính hãng chưa qua sử dụng (mới 100%), luôn đi kèm với một (01) Thẻ/Sổ/Giấy Bảo hành Quốc tế duy nhất do Nhà sản xuất cung cấp. Quý Khách cần cân nhắc kỹ lưỡng trước khi hoàn tất thủ tục. Duy Anh có quyền từ chối yêu cầu đổi trả sản phẩm hoặc hoàn trả tiền đặt hàng (trừ trường hợp có lỗi của nhà sản xuất – là các lỗi khiến đồng hồ không thể hoạt động bình thường với đầy đủ tính năng được thiết kế theo tiêu chuẩn của nhà sản xuất dù được sử dụng đúng cách). Nếu chưa chắc chắn về bất cứ thông tin nào (kích thước, màu sắc, kiểu máy, điều kiện sử dụng, tính năng, cách sử dụng), Quý Khách vui lòng liên hệ trực tiếp và yêu cầu được tư vấn, giải thích. Chúng tôi luôn sẵn lòng cung cấp mọi thông tin đầy đủ nhất có thể để Quý khách có được sự lựa chọn phù hợp nhất.</p>

                    <p>2. Xác nhận đơn hàng</p>
                    <p>Sau khi nhận được yêu cầu của Quý khách chúng tôi sẽ kiểm tra và xác nhận lại tình trạng tồn kho của sản phẩm mà Quý khách chọn mua sẵn hàng hay đã hết trong thời gian sớm nhất có thể. Nếu thông tin họ tên Khách hàng, địa chỉ và các thông tin khác chưa rõ ràng, chúng tôi có quyền đề nghị Quý Khách cung cấp thông tin bổ sung, làm rõ để thuận lợi cho việc giao hàng đến tay Quý Khách trong thời gian sớm nhất.</p>
                    <p>Thời gian xác nhận: Khoảng từ 2-8h làm việc (từ 9h00 cho đến 17h00 từ Thứ Hai đến Thứ Sáu và 9h00 đến 12h00 Thứ Bảy)</p>

                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" name=""> Tôi đã đọc kỹ và hoàn toàn đồng ý với quy định mua hàng ở trên
                    </label>
                </div>
                <div class="form-group">
                    <a href="{{route('checkout', ['uid' => Auth::User()->id])}}"><button class="btn btn-dark" type="button">Đăt hàng</button></a>
                </div> 
            </div>
            <div class="col-5">
                <div class="carts sticky">
                    ádasd
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection