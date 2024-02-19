$().ready(function() {
    $("#validateForm").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            "name":{ required: true, maxlength: 100, minlength: 2 },
            "yourname":{ required: true, maxlength: 50, minlength: 2, },
            "email":{ required: true, email: true },
            "subject":{ required: true},
            "message":{ required: true},
            "password":{ required: true, },
            "passwordold":{ required: true, },
            "passwordagain":{ equalTo: "#password", },
            "sku":{ required: true, equalTo: "#sku", },
            "area":{ number: true, },
            "price":{ number: true, },
            "number":{ number: true, },
            "bedroom":{ number: true, },
            "category_id":{ required: true, },
        },
        messages: {
            "name": {
                required: "Mời nhập họ & Tên ...",
                maxlength: "Tên quá dài",
                minlength: "Tên quá ngắn",
            },
            "yourname": {
                required: "Mời nhập họ & Tên ...",
                maxlength: "Tên quá dài",
                minlength: "Tên quá ngắn",
            },
            "email": {
                required: "Mời nhập Email",
                email: "Nhập đúng định dạng email",
            },
            "subject": {
                required: "Mời nhập tiêu đề",
            },
            "message": {
                required: "Mời nhập nội dung",
            },
            "passwordold": {
                required: "Mời nhập lại mật khẩu",
            },
            "password": {
                required: "Mời nhập mật khẩu",
            },
            "passwordagain": {
                equalTo: "Mật khẩu không khớp",
            },
            "sku": {
                required: "Nhập mã xác nhận",
                equalTo: "Mã xác nhận không đúng",
            },
            "area": {
                number: "Nhập số 88 / 8.8",
            },
            "price": {
                number: "Nhập số 88 / 8.8",
            },
            "number": {
                number: "Nhập số 88 / 8.8",
            },
            "bedroom": {
                number: "Nhập số 88 / 8.8",
            },
            "category_id": {
                required: "Bắt buộc phải nhập ...",
            },
        }
    });
});