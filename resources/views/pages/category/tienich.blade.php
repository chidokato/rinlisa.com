@extends('layout.index')

@section('title') {{$data->title ? $data->title : $data->name}} @endsection
@section('description') {{$data->description}} @endsection
@section('robots') index, follow @endsection
@section('url'){{asset('')}}@endsection

@section('content')

<div class="page-banner-simple bg-secondary py-0 background_black" style="background: url(data/category/{{$data->img}}) no-repeat center center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 category">
                <h3 class="banner-title text-white">{{$data->name}}</h3>
                <div class="banner-tagline font-medium text-white">Chúng tôi lập chiến lược, thiết kế & phát triển để tạo ra những sản phẩm có giá trị.</div>
            </div>
        </div>
    </div>
</div>
<div class="full-row pb-30 cat_news pt-50">
    <div class="container ">
        <div class="row">
            @foreach($post as $val)
            <div class="col-lg-5 mb-4">
                <div class="item_news">
                    <div class="img"><a href="{{$val->category->slug}}/{{$val->slug}}"><img src="data/news/{{$val->img}}"></a></div>
                </div>
            </div>
            <div class="col-lg-7 d-flex flex-center mb-4">
                <div class="item_news">
                    <div class="info p-2">
                        <a href="{{$val->category->slug}}/{{$val->slug}}"><h2>{{$val->name}}</h2></a>
                        <div class="detail text-truncate-set text-truncate-set-3">{{$val->detail}}</div>
                        <div class="info-button">
                            <div class="button mr-10"><a href="{{$val->category->slug}}/{{$val->slug}}"><button>Xem thêm >> </button></a></div>
                            <div class="button"><button>Nhận tư vấn</button></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $post->links() }}
        </div>
    </div>
</div>
<style type="text/css">
    .item_news h2{ text-align:left; }
    .item_news .img img{ height:280px; width:100%; object-fit:cover; border-radius:0px 40px 0px 40px }
</style>

@endsection

@section('script')

@endsection