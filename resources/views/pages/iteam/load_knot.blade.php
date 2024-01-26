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
            <a href="">
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
</script>