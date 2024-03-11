function body(event){
    event.preventDefault();
    let urlbody = $(this).data('url');
    let price_face = $('.price_face').data('id');
    let price_strap = $('.price_strap').data('id');
    let price_rg = $('.price_rg').data('id');
    $.ajax({
        type: 'GET',
        url: urlbody,
        data: {price_face: price_face, price_strap: price_strap, price_rg: price_rg},
        // dataType: 'json',
        success: function (data){
            if(data.code === 200){
                $('.mat').html(data.mat_html)
                $('.load-body').html(data.body)
                $('.face').html(data.mat_html)
                $('.price_face_parent').html(data.price_face)
                $('.tong').html(data.tong)
            }
        },
        error: function(){

        }
    });
}
function strap(event){
    event.preventDefault();
    let urlstrap = $(this).data('url');
    let price_face = $('.price_face').data('id');
    let price_strap = $('.price_strap').data('id');
    let price_rg = $('.price_rg').data('id');
    $.ajax({
        type: 'GET',
        url: urlstrap,
        data: {price_face: price_face, price_strap: price_strap, price_rg: price_rg},
        // dataType: 'json',
        success: function (data){
            if(data.code === 200){
                $('.str_m').html(data.str_m)
                $('.flat_top').html(data.flat_top)
                $('.flat_bottom').html(data.flat_bottom)
                $('.price_strap_parent').html(data.price_strap)
                $('.tong').html(data.tong)
            }
        },
        error: function(){

        }
    });
}

function buckle(event){
    event.preventDefault();
    let urlbuckle = $(this).data('url');
    let price_face = $('.price_face').data('id');
    let price_strap = $('.price_strap').data('id');
    let price_rg = $('.price_rg').data('id');
    $.ajax({
        type: 'GET',
        url: urlbuckle,
        data: {price_face: price_face, price_strap: price_strap, price_rg: price_rg},
        // dataType: 'json',
        success: function (data){
            if(data.code === 200){
                $('.rg').html(data.rg)
                $('.price_rg_parent').html(data.price_rg)
                $('.tong').html(data.tong)
            }
        },
        error: function(){

        }
    });
}


$(document).ready(function(){
    $('.clik_body').on('click', body);
    $('.clik_strap').on('click', strap);
    $('.clik_buckle').on('click', buckle);
});


// function calculateSum() {
//     // Lấy giá trị của hai input
//     var input1 = parseFloat(document.getElementById('input1').value);
//     var input2 = parseFloat(document.getElementById('input2').value);

//     // Kiểm tra nếu giá trị nhập vào không phải là số
//     if (isNaN(input1) || isNaN(input2)) {
//         document.getElementById('result').textContent = 'Vui lòng nhập số hợp lệ trong cả hai ô';
//         return;
//     }

//     // Tính tổng
//     var sum = input1 + input2;

//     // Hiển thị kết quả
//     document.getElementById('result').textContent = 'Tổng của hai số là: ' + sum;
// }



function addTocart(event){
    event.preventDefault();
    let urlcart = $(this).data('url');
    $.ajax({
        type: 'GET',
        url: urlcart,
        dataType: 'json',
        success: function (data){
            if(data.code === 200){
                $('.cart_quantity').text(data.quanlity_cart)
                alertify.message('Thêm vào giỏ hàng thành công !');
            }
        },
        error: function(){

        }
    });
}

function delcart(event){
    event.preventDefault();
    let urldelcart = $('.cart').data('url');
    let id = $(this).data('id');
    $.ajax({
        type: 'GET',
        url: urldelcart,
        data: {id: id},
        success: function (data){
            if(data.code === 200){
                $('.cart_wrapper').html(data.cart_component);
                $('.cart_quantity').text(data.quanlity_cart)
                alertify.message('Xóa xản phẩm thành công !');
            }
        },
        error: function(){

        }
    });
}

$(document).ready(function(){
    $('.add_cart').on('click', addTocart);
    $('.del_cart').on('click', delcart);
});


$(document).ready(function(){
    $("#arrange_mat").change(function(){
        var id = $(this).val();
        $.get("ajax/change_arrange_mat/"+id,function(data){
            $("#list-mat").html(data);
        });
    });
    $("#arrange_day").change(function(){
        var id = $(this).val();
        // alert(id);
        $.get("ajax/change_arrange_day/"+id,function(data){
            $("#list-day").html(data);
        });
    });
    $("#arrange_khoa").change(function(){
        var id = $(this).val();
        $.get("ajax/change_arrange_khoa/"+id,function(data){
            $("#list-khoa").html(data);
        });
    });

    $("#arrange_cat").change(function(){
        var catid = $(this).parents('.flex').find('input[name="idcat"]').val();
        var id = $(this).val();
        $.get("ajax/change_arrange_cat/"+id+"/"+catid,function(data){
            $("#list_cat").html(data);
        });
    });
});




