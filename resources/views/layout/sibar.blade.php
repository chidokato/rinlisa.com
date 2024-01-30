<?php use App\Models\Category; ?>
<div class="col-lg-3 col-md-12">
    <aside class="sidebar_widget">
    	<div class="widget_inner">
            <div class="widget_list widget_categories">
                <h3>Danh mục sản phẩm</h3>
                <ul>
                    @foreach($cat_sibar as $val)
                    <?php $sub_cat = Category::where('parent', $val->id)->get(); ?>
                    <li>
                        <a href="{{$val->slug}}">
                            <div>{{$val->name}}</div>
                            @if(count($sub_cat) == 0)<div>({{count($val->Post)}})</div>@endif
                        </a>
                    </li>
                    @if(count($sub_cat) > 0)
                    @foreach($sub_cat as $sub)
                    <li class="sub">
                        <a href="{{$sub->slug}}">
                            <div><span class="lnr lnr-chevron-right"></span> {{$sub->name}}</div>
                            <div>({{count($sub->Post)}})</div>
                        </a>
                    </li>
                    @endforeach
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>

    	<div class="shop_sidebar_banner">
            <a href="#"><img src="assets/img/bg/banner9.jpg" alt=""></a>
        </div>

        <div class="widget_list widget_post pro_news">
            <h3>Sản phẩm mới nhất</h3>
            @foreach($post_news as $val)
            <div class="iteam">
                <div class="row">
                    <div class="col-5">
                        <a class="name" href="blog-details.html"><img src="data/news/{{$val->img}}" alt=""></a>
                    </div>
                    <div class="post_info col-7">
                        <h3 class="text-truncate-set text-truncate-set-2"><a href="">{{$val->name}}</a></h3>
                        <span>March 16, 2018 </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
    </aside>
</div>