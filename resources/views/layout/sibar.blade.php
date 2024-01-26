<?php use App\Models\Category; ?>
<div class="col-lg-3 col-md-12">
    <aside class="sidebar_widget">
    	<div class="widget_inner">
            <div class="widget_list widget_categories">
                <h2>Danh mục sản phẩm</h2>
                <ul>
                    @foreach($cat_sibar as $val)
                    <?php $sub_cat = Category::where('parent', $val->id)->get(); ?>
                    <li>
                        <a href="{{$val->slug}}"><span class="lnr lnr-arrow-right"></span> {{$val->name}}</a>
                    </li>
                    @if(count($sub_cat) > 0)
                    @foreach($sub_cat as $sub)
                    <li class="sub">
                        <a href="{{$sub->slug}}">{{$sub->name}}</a>
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
        
    </aside>
</div>