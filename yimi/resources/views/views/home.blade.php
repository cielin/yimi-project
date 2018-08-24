@extends('layout')

@section('title', '首页')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('plugin/swiper/css/swiper.css') }}" />
<!-- Animate.css -->
<link rel="stylesheet" href="{{ URL::asset('plugin/css/animate.css') }}">
<!-- Magnific Popup -->
<link rel="stylesheet" href="{{ URL::asset('plugin/css/magnific-popup.css') }}">
<!-- Salvattore -->
<link rel="stylesheet" href="{{ URL::asset('plugin/css/salvattore.css') }}">
<!-- Theme Style -->
<link rel="stylesheet" href="{{ URL::asset('plugin/css/style.css') }}">
<style type="text/css">
/* Navbar light 首页的头*/

.navbar-transparent.navbar-light {
    background: transparent;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}
.navbar-light {
    background: rgba(89, 89, 89, 0.8);
    -webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.05);
    -moz-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.05);
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.05);
}
.container,.container-fluid{
    padding-left:0;
    padding-right:0;
}
.waterfalls{
    margin-top:7px;
}
.waterfalls .titWater h3{
    margin-bottom: 0px;
    padding-top:26px;
}
#fh5co-main{
    padding-top: 0px!important;
    margin-top: -2px;
    padding-bottom: 50px;
}
/**************/
</style>

@stop

@section('page-content')
<div class="wrapper">
    <div class="sowingMap">
        <div class="swiper-container swiper1">
            <div class="swiper-wrapper">
                @if (isset($top_banners))
                @foreach ($top_banners as $top_banner)
                <div class="swiper-slide">
                	<img src="{{ asset('public/images/banners/' . $top_banner->image) }}">
                </div>
                @endforeach
                @endif
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <!-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> -->
        </div>
    </div>
    <div class="index-content">
        <div class="container">
            <article class="row litteBanner" style="padding-left:0; padding-right:0;">
                <div class="litteBannerImg col-md-6 col-sm-6 col-xs-6">
                    @if (isset($sl_banner))
                    <img src="{{ asset('public/images/banners/' . $sl_banner->image) }}">
                    @endif
                </div>
                <ul class="col-md-6 col-sm-6 col-xs-6" style="list-style: none;padding: 0;">
                    @if (isset($srt_banners))
                    @foreach ($srt_banners as $srt_banner)
                    <li class="col-md-6 col-sm-6 col-xs-6 img2018_01">
                    	<img src="{{ asset('public/images/banners/' . $srt_banner->image) }}" width="100%">
                    </li>
                    @endforeach
                    @endif
                    @if (isset($srb_banner))
                    <li class="col-md-12 col-sm-12 col-xs-12 img2018_03">
                    	<img src="{{ asset('public/images/banners/' . $srb_banner->image) }}" width="100%">
                    </li>
                    @endif
                </ul>

            </article>
            <div class="container overHide mb40">
                <span>
        			<img src="{{ URL::asset('assets/img/index_title.jpg') }}">
                <ul class="index-title-ul">
                    <li><a href="#">床品</a>
                    </li>
                    <li><a href="#">沙发</a>
                    </li>
                    <li><a href="#">床具</a>
                    </li>
                    <li><a href="#">椅子</a>
                    </li>
                    <li class="more"><i style="padding-right: 30px;color: #999;font-weight: 100;font-size: 10px;">|</i><a href="#">MORE <i class="icon iconfont icon-shuangjiantou"></i></a>
                    </li>
                </ul>
            </div>
            <div class="container overHide">
                <div class="designer buyer">
                	@if (isset($featured_products))
                	@foreach ($featured_products as $featured_product)
                    
                        <dl>
                            <dt>
                                <p class="ico-wrap">
                                    @if (Auth::check() && App\Http\Controllers\CustomerController::isCollected(Auth::user()->id, $featured_product->id))
                                    <span class="glyphicon glyphicon-heart heart-detail" data-id="{{ $featured_product->id }}"></span>
                                    @else
                                    <span class="glyphicon glyphicon-heart-empty heart-detail" data-id="{{ $featured_product->id }}"></span>
                                    @endif
                                    <span class="icon iconfont icon-yanjing1"></span>
                                </p>
                            </dt>
                            <dd>
                            	<img src="{{ asset('public/images/products/' . $featured_product->featured_image) }}">
                            </dd>
                            <div class="buyer-text"><span>{{ $featured_product->name }}</span>
                            </div>
                        </dl>
                    
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        @if (isset($designers))
        <!--设计师-->
        <div class="container">
            <div class="container overHide  mb40">
                <span>
        			<img src="{{ URL::asset('assets/img/foot/designers.png') }}">
                </span>
                <span class="more"><a href="#">MORE <i class="icon iconfont icon-shuangjiantou"></i></a></span>

            </div>
            <div class="container overHide" style="padding-bottom:14px;">
                <div class="designer designer-new-hover">
                    @foreach ($designers as $designer)
                    <a href="{{ URL::to('/designers/' . $designer->slug) }}">
                        <dl style="margin-left:.27rem">
                            <dt>
                                <p>{{ $designer->name }}</p>
                                <p>{{ substr(strip_tags($designer->description), 0, 60) }} ...</p>
                            </dt>
                            <dd>
                            	<img src="{{ asset('public/images/designers/' . $designer->avatar) }}">
                            </dd>
                        </dl>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <!--设计师 end-->
        @endif

    </div>
    <!--index-contentend -->

    <!--瀑布流开始 -->
    <div class="wrap  bg-hui-f1" style="margin-top:13px;">
        <div class="container-fluid" style="padding-left:0; padding-right:0;">
         
            <div class="waterfalls">
              <h3 class="titWater">
                <img src="{{ URL::asset('assets/img/foot/tit-water.png') }}" alt="">
              </h3>
            </div>
            <div id="fh5co-main">
                <div class="container">
                  <div class="row">
                     <div id="fh5co-board" data-columns>
                        @if (isset($waterfalled_products))
                        @foreach ($waterfalled_products as $waterfalled_product)
                        <div class="item">
                            <div class="animate-box">
                                <img src="{{ asset('public/images/products/' . $waterfalled_product->featured_image) }}" alt="{{ $waterfalled_product->name }}">
                                <div class="fh5co-desc">
                                    {{ $waterfalled_product->name }}
                                </div> 
                            </div>
                            <div class="itemHover">
                                <p class="ico-wrap">
                                    @if (Auth::check() && App\Http\Controllers\CustomerController::isCollected(Auth::user()->id, $waterfalled_product->id))
                                    <span class="glyphicon glyphicon-heart heart-detail" data-id="{{ $waterfalled_product->id }}"></span>
                                    @else
                                    <span class="glyphicon glyphicon-heart-empty heart-detail" data-id="{{ $waterfalled_product->id }}"></span>
                                    @endif
                                    <a href="/products/{{ $waterfalled_product->slug }}"><span class="icon iconfont icon-yanjing1"></span></a>
                                </p>
                            </div>
                        </div>
                        @endforeach
                @endif
                     </div>
                  </div>
                </div>
            </div>
          
        </div>
    </div>
    <!--瀑布流end -->
</div>


    @stop

@section('js')

<script type="text/javascript" src="{{ URL::asset('assets/js/index.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/global.js') }}"></script>
<!-- Waypoints -->
<script type="text/javascript" src="../plugin/jquery.waypoints.min.js"></script>
<!-- Magnific Popup -->
<script type="text/javascript" src="{{ URL::asset('plugin/jquery.magnific-popup.min.js') }}"></script>
<!-- Salvattore -->
<script type="text/javascript" src="{{ URL::asset('plugin/salvattore.min.js') }}"></script>
<!-- Main JS -->
<script type="text/javascript" src="{{ URL::asset('plugin/main.js') }}"></script>
@stop
