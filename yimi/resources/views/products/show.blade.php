@extends('layout')

@section('title', $product->name . '_商品')

@section('css')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/custorm.css') }}" />
<!-- Animate.css -->
<link rel="stylesheet" href="{{ URL::asset('plugin/css/animate.css') }}">
<!-- Magnific Popup -->
<link rel="stylesheet" href="{{ URL::asset('plugin/css/magnific-popup.css') }}">
<!-- Salvattore -->
<link rel="stylesheet" href="{{ URL::asset('plugin/css/salvattore.css') }}">
<!-- Theme Style -->
<link rel="stylesheet" href="{{ URL::asset('plugin/css/style.css') }}">

@stop

@section('page-content')
<div class="wrapper-page container">
    <!--面包屑-->
    <div class="breadcrumb">
        <div class="breadcrumb_text">
            <span>
                <a href="{{ URL::to('/') }}" title="">
                首页
                </a>
            </span>

            <i>&nbsp; / &nbsp;</i>
            <span>
                <a href="{{ route('categories.index') }}" title="">
                商品列表
                </a>
            </span>
            <i>&nbsp; / &nbsp;</i> {{ $product->name }}

        </div>
    </div>
    <!--面包屑-->
    <!--商品轮播图-->
    <div class="row">
        <div class="swiper-wraper webSw">
            <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('public/images/products/' . $product->featured_image) }}">
                    </div>
                    @foreach ($product->images as $image)
                    @if (strcasecmp($product->featured_image, $image->path) !== 0)
                    <div class="swiper-slide">
                        <img src="{{ asset('public/images/products/' . $image->path) }}">
                    </div>
                    @endif
                    @endforeach
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next arrow-right"></div>
                <div class="swiper-button-prev arrow-left" style="margin-left:23px;"></div>
            </div>
            <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('public/thumbs/products/thumb_' . $product->featured_image) }}">
                    </div>
                    @foreach ($product->images as $image)
                    @if (strcasecmp($product->featured_image, $image->path) !== 0)
                    <div class="swiper-slide">
                        <img src="{{ asset('public/thumbs/products/thumb_' . $image->path) }}">
                    </div>
                    @endif
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <!-- <div class="swiper-pagination"></div> -->
                <!-- Add Arrows -->
                <!-- <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div> -->

            </div>
        </div>
        <div class="sowingMap  mobileMap">
        <div class="swiper-container swiperPro">
            <div class="swiper-wrapper">
              @foreach ($product->images as $image)
                <div class="swiper-slide">
                    <img src="{{ asset('public/images/products/' . $image->path) }}">
                </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <!-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> -->
        </div>
    </div>
   
    <!--                     <h5 class="back-tit">
    <div class="back-page"><a href="goodsList.html">< 返回上一页</div>
    <div class="nextIcon">
    <span  class="glyphicon glyphicon-chevron-right"></span>
    <span  class="glyphicon glyphicon-chevron-right"></span>
    </div>
    </h5> -->
                <!--swiper-->
                <div class="detais-content-tit">
                    <h1 class="details-tit">{{ $product->name }}</h1>
                    <div class="hui-tit">
                        <a href="{{ url('brands/' . $product->brand->slug) }}">{{ $product->brand->name }}</a>
                    </div>
                    <div class="detailText">
                    @foreach ($product->product_attributes as $product_attribute)
                    @if ($product_attribute->product_attr_key->is_package_attr == 0 && $product_attribute->product_attr_key->is_sale_attr == 0 && $product_attribute->product_attr_value->value !== "")
                    <p>{{ $product_attribute->product_attr_key->name }}：{{ $product_attribute->product_attr_value->value }}</p>
                    @endif
                    @endforeach
                    </div>
                    <!-- <div class="details-bord"></div> -->
                </div>
                <!--swiper end -->
                <div>

                    <p class="mobileIco ico-wraps">
                        @if (Auth::check() && App\Http\Controllers\CustomerController::isCollected(Auth::user()->id, $product->id, 1))
                        <span class="glyphicon glyphicon-heart heart-detail" data-id="{{ $product->id }}" data-type="1"></span>
                        @else
                        <span class="glyphicon glyphicon-heart-empty heart-detail" data-id="{{ $product->id }}" data-type="1"></span>
                        @endif
                        <a href="/articles/shopping-tips"><span class="icon iconfont icon-question"></span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="details-share">
        <a href="javascript:window.open('http://twitter.com/home?status='+encodeURIComponent(document.location.href)+' '+encodeURIComponent(document.title));void(0)">
            <span class="icon iconfont icon-twitter"></span>
        </a>
        <a class="fav_facebook" rel="nofollow" href="javascript:window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(document.location.href)+'&t='+encodeURIComponent(document.title));void(0)">
            <span class="icon iconfont icon-facebook"></span>
        </a>
        <a href="http://v.t.sina.com.cn/share/share.php?url={{ htmlspecialchars('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) }}&title='{{ $product->name }}'" target="_blank">
            <span class="icon iconfont icon-weibo"></span>
        </a>
        <a href="http://connect.qq.com/widget/shareqq/index.html?title=qqhaoyou&url={{ htmlspecialchars('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) }}&desc={{ $product->name }}&pics=&site=薏米家" target="_blank">
            <span class="icon iconfont icon-qq"></span>
        </a>
        <span id="weixin2">
            <span class="icon iconfont icon-weixin"></span>
            <div class="weixin2">
                <span class="close close2">X</span>
                <div>
                    {!! QrCode::size(160)->generate(Request::url()); !!}
                    <p>扫码分享</p>
                </div>
            </div>
        </span>
    </div>
    <div class="row mTextBody">
        <ul class="col-md-3 details-tab" role="tablist">
            <li role="presentation" class="active">
                <a href="#goodsDetails" aria-controls="home" role="tab" data-toggle="tab">
                商品介绍
                </a>
            </li>
            <!-- <li role="presentation">
                <a href="#goodsInfo" aria-controls="profile" role="tab" data-toggle="tab">
                商品规格
                </a>
            </li> -->
        </ul>
        <div class="tab-content col-md-9 ditails-tab-box">
            <div role="tabpanel" class="tab-pane active" id="goodsDetails">
                {!! html_entity_decode($product->description, ENT_QUOTES, 'UTF-8') !!}
            </div>
            <!-- <div role="tabpanel" class="tab-pane" id="goodsInfo"></div> -->
        </div>
    </div>
    <!--相关商品-->
    <div class="container other-goods">
        <img src="../assets/img/index_title.jpg" alt="">

    </div>

    <div class="designer buyer">
        @if (isset($featured_products))
        @foreach ($featured_products as $featured_product)
            <a href="/products/{{ $featured_product->slug }}">
                <dl>
                    <dd>
                        <img src="{{ asset('public/images/products/' . $featured_product ->featured_image) }}">
                    </dd>
                    <div class="buyer-text"><span>{{ $featured_product->name }}</span>
                    </div>
                </dl>
            </a>

        @endforeach
        @endif
    </div>
	
<!--瀑布流开始 -->
<!-- 		<div class="container-fluid">
		  <div class="container ">
			  <div id="fh5co-main" class="waterfallNew">
				<div class="container1">
		         <div class="row">
			        <div id="fh5co-board" data-columns>
						@if (isset($featured_products))
        				@foreach ($featured_products as $featured_product)
			        	<div class="item">
			        		<div class="animate-box">
				        		<img src="{{ asset('public/images/products/' . $featured_product ->featured_image) }}">
				        		<div class="fh5co-desc">
									{{ $featured_product->name }}
								</div>
				        		<div class="itemHover">
			        			<p class="ico-wrap">
					            	<span class="glyphicon glyphicon-heart-empty"></span>
					            	<span class="icon iconfont icon-sousuo clickico" data-toggle="modal" data-target=".myModalImg" data-src="images/img_2.jpg" data-alt="Free HTML5 Bootstrap template"></span>
					            </p>
			        		</div>
			        		</div>
			        	</div>
						 @endforeach
        				@endif
			        </div>
		        </div>
		       </div>
			</div>
		  </div>
	    </div> -->
</div>
<!--瀑布流end -->


    <!--相关商品end-->

    </div>
    @stop

    @section('js')
	<!-- Waypoints -->
	<script src="{{ URL::asset('plugin/jquery.waypoints.min.js') }}"></script>
	<!-- Magnific Popup -->
	<script src="{{ URL::asset('plugin/jquery.magnific-popup.min.js') }}"></script>
	<!-- Salvattore -->
	<script src="{{ URL::asset('plugin/salvattore.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/goodsDetail.js') }}"></script>

    @stop
