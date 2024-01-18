@if(session()->has('cart') != null)
<div class="row">
    <div class="col-12">
        <form action="{{route('updateCart')}}" method="POST">
            @csrf
            <div class="table_desc cart" data-url="{{route('delCart')}}">
                <div class="cart_page table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="product_remove">Delete {{count($cart)}}</th>
                                <th class="product_thumb">Image</th>
                                <th class="product_name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product_quantity">Quantity</th>
                                <th class="product_total">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $id => $val)
                            <input type="hidden" name="id[]" value="{{$id}}">
                            <tr>
                                <td class="product_remove"><a href="#" data-id="{{$id}}" class="del_cart"><i class="fa fa-trash-o"></i></a></td>
                                <td class="product_thumb"><a href="#"><img src="data/news/{{$val['img']}}" alt=""></a></td>
                                <td class="product_name"><a href="#">{{$val['name']}} </a></td>
                                <td class="product-price">{{ number_format($val['price']) }} {{$val['unit']}}</td>
                                <td class="product_quantity"><label></label> <input name="quantity[]" min="1" max="100" value="{{$val['quantity']}}" type="number"></td>
                                <td class="product_total">{{ number_format( $val['price'] * $val['quantity'] ) }} {{$val['unit']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="cart_submit">
                    <button type="submit">update cart</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!--coupon code area start-->
<div class="coupon_area">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="coupon_code left">
                <h3>Coupon</h3>
                <div class="coupon_inner">
                    <p>Enter your coupon code if you have one.</p>
                    <input placeholder="Coupon code" type="text">
                    <button type="submit">Apply coupon</button>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="coupon_code right">
                <h3>Cart Totals</h3>
                <div class="coupon_inner">
                    <div class="cart_subtotal">
                        <p>Subtotal</p>
                        <p class="cart_amount">£215.00</p>
                    </div>
                    <div class="cart_subtotal ">
                        <p>Shipping</p>
                        <p class="cart_amount"><span>Flat Rate:</span> £255.00</p>
                    </div>
                    <a href="#">Calculate shipping</a>

                    <div class="cart_subtotal">
                        <p>Total</p>
                        <p class="cart_amount">£215.00</p>
                    </div>
                    <div class="checkout_btn">
                        <a href="#">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--coupon code area end-->
@else
<div class="row">
    <div class="col-lg-12 col-md-12">
        <h1>Giỏ hàng trống !</h1>
    </div>
</div>
@endif

<script type="text/javascript">
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
        $('.del_cart').on('click', delcart);
    });
</script>