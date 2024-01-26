function body(event){
    event.preventDefault();
    let urlbody = $(this).data('url');
    $.ajax({
        type: 'GET',
        url: urlbody,
        dataType: 'json',
        success: function (data){
            if(data.code === 200){
                $('.mat').html(data.mat_html)
                $('.face').html(data.mat_html)
            }
        },
        error: function(){

        }
    });
}
function strap(event){
    event.preventDefault();
    let urlstrap = $(this).data('url');
    $.ajax({
        type: 'GET',
        url: urlstrap,
        dataType: 'json',
        success: function (data){
            if(data.code === 200){
                $('.str_m').html(data.str_m)
                $('.flat_top').html(data.flat_top)
                $('.flat_bottom').html(data.flat_bottom)
            }
        },
        error: function(){

        }
    });
}


$(document).ready(function(){
    $('.clik_body').on('click', body);
    $('.clik_strap').on('click', strap);
});


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