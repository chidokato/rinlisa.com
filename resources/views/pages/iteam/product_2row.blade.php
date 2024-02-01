@foreach($sphot as $key => $val)
    @if($key % 2 == 0)
    <div class="single_items">
        <div class="single_featured">
            <div class="featured_thumb">
                <a href="{{$sphot[$key]->category->slug}}/{{$sphot[$key]->slug}}"><img src="data/news/{{ $sphot[$key]->img }}" alt=""></a>
            </div>
            <div class="featured_content">
                <h3 class="product_name text-truncate-set text-truncate-set-2"><a href="{{$sphot[$key]->category->slug}}/{{$sphot[$key]->slug}}">{{ $sphot[$key]->name }}</a></h3>
                <div class="product_content">
                    <div class="product_ratings">
                        <ul>
                            <li><a href="#"><i class="ion-star"></i></a></li>
                            <li><a href="#"><i class="ion-star"></i></a></li>
                            <li><a href="#"><i class="ion-star"></i></a></li>
                            <li><a href="#"><i class="ion-star"></i></a></li>
                            <li><a href="#"><i class="ion-star"></i></a></li>
                        </ul>
                    </div>
                    <div class="price_box">
                        <span class="current_price">{{ $sphot[$key]->price ? number_format($sphot[$key]->price) .' '. $sphot[$key]->unit : 'Liên hệ' }}</span>
                        <span class="old_price">{{ $sphot[$key]->sale ? number_format($sphot[$key]->price*(1+$sphot[$key]->sale/100)) .' '. $sphot[$key]->unit : '' }}</span>
                    </div>
                    @if($sphot[$key]->genuine == 'on')
                    <p class="genuine" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="single_featured">
            <div class="featured_thumb">
                <a href="{{$sphot[$key+1]->category->slug}}/{{$sphot[$key+1]->slug}}"><img src="data/news/{{ $sphot[$key+1]->img }}" alt=""></a>
            </div>
            <div class="featured_content">
                <div>
                    <h3 class="product_name text-truncate-set text-truncate-set-2"><a href="{{$sphot[$key+1]->category->slug}}/{{$sphot[$key+1]->slug}}">{{ $sphot[$key+1]->name }}</a></h3>
                    <div class="product_content">
                        <div class="product_ratings">
                            <ul>
                                <li><a href="#"><i class="ion-star"></i></a></li>
                                <li><a href="#"><i class="ion-star"></i></a></li>
                                <li><a href="#"><i class="ion-star"></i></a></li>
                                <li><a href="#"><i class="ion-star"></i></a></li>
                                <li><a href="#"><i class="ion-star"></i></a></li>
                            </ul>
                        </div>
                        <div class="price_box">
                            <span class="current_price">{{ $sphot[$key+1]->price ? number_format($sphot[$key+1]->price) .' '. $sphot[$key+1]->unit : 'Liên hệ' }}</span>
                            <span class="old_price">{{ $sphot[$key+1]->sale ? number_format($sphot[$key+1]->price*(1+$sphot[$key+1]->sale/100)) .' '. $sphot[$key]->unit : '' }}</span>
                        </div>
                        @if($sphot[$key+1]->genuine == 'on')
                        <p class="genuine" style="font-size: 0.8rem"><span class="lnr lnr-checkmark-circle"></span> Hàng chính hãng</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach