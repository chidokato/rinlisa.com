@if(isset($mat))
    @foreach($mat as $val)
        @if($val->img_1 != null)
        <div class="col-lg-4 col-md-4">
            <a class="clik_body" data-url="{{route('clik_body', ['id' => $val->id])}}" href="">
                <div class="iteam">
                    <img src="data/product/knot/{{$val->img_1}}">
                    <div class="info"><span class="text-truncate-set text-truncate-set-1">{{$val->name}}</span> <span>¥ {{number_format($val->price)}}</span></div>
                </div>
            </a>
        </div>
        @endif
    @endforeach
@endif

@if(isset($day))
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
@endif

@if(isset($khoa))
    @foreach($khoa as $val)
        @if($val->img_1 != null)
        <div class="col-lg-4 col-md-4">
            <a class="clik_buckle" href="" data-url="{{route('clik_buckle', ['id' => $val->id])}}">
                <div class="iteam">
                    <img src="data/news/{{$val->img}}">
                    <div class="info">{{$val->name}} <br> <span>¥ {{$val->price}}</span></div>
                </div>
            </a>
        </div>
        @endif
    @endforeach
@endif

<script type="text/javascript">
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
</script>