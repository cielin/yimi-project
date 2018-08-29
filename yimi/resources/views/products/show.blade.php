@extends('layout')

@section('title', $product->name . '_商品')

@section('css')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/custorm.css') }}" />

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
        <div class="swiper-wraper">
            <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                    @foreach ($product->images as $image)
                    <div class="swiper-slide">
                        <img src="{{ asset('public/images/products/' . $image ->path) }}">
                    </div>
                    @endforeach
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next arrow-right"></div>
                <div class="swiper-button-prev arrow-left" style="margin-left:23px;"></div>
            </div>
            <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">
                    @foreach ($product->images as $image)
                    <div class="swiper-slide">
                        <img src="{{ asset('public/thumbs/products/thumb_' . $image ->path) }}">
                    </div>
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <!-- <div class="swiper-pagination"></div> -->
                <!-- Add Arrows -->
                <!-- <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div> -->

            </div>
        </div>
        <div class="goods-detail-text">
            <div class="detais-content">
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
                    <div class="hui-tit">{{ $product->brand->name }}</div>
                    @foreach ($product->product_attributes as $product_attribute)
                    @if ($product_attribute->product_attr_key->is_package_attr == 0 && $product_attribute->product_attr_key->is_sale_attr == 0 && $product_attribute->product_attr_value->value !== "")
                    <p>{{ $product_attribute->product_attr_key->name }}：{{ $product_attribute->product_attr_value->value }}</p>
                    @endif
                    @endforeach
                    <div class="details-bord">
                        Fjords舒适椅，为挪威知名家具集团Hjellegjerde公司旗下之品牌，该集团自1941年成立以来，迄今已为挪威国内最大家具集团，并成为挪威 家具业发展的领导者。Hjellegjerde遍布全球的经销网络，使其确切地掌握全球市场脉动，了解不同地区顾客的需求，才能设计出最符合市场趋势，以及顾客们的在地化细微要求。拥有Hjellegjerde集团优势背景的Fjords舒适椅，为产品操刀设计的设计师皆获奖无数，设计师间的合作与创意激情，也常创作出非凡的产品。有些设计师本身为珠宝设计背景，使金属材质亦能柔软与坚硬并存。
                    </div>
                </div>
                <!--swiper end -->
                <div>

                    <p class="ico-wraps">
                        @if (Auth::check() && App\Http\Controllers\CustomerController::isCollected(Auth::user()->id, $product->id))
                        <span class="glyphicon glyphicon-heart heart-detail" data-id="{{ $product->id }}"></span>
                        @else
                        <span class="glyphicon glyphicon-heart-empty heart-detail" data-id="{{ $product->id }}"></span>
                        @endif
                        <a href="/articles/shopping-tips"><span class="icon iconfont icon-question" style="margin-left:54px;"></span></a>
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
        <a href="http://v.t.sina.com.cn/share/share.php?url=http://www.jb51.net&title='分享内容'" target="_blank">
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
                    <img src="{{ URL::asset('assets/img/foot/weixinCode.png') }}">
                    <p>扫码分享</p>
                </div>
            </div>
        </span>
    </div>
    <div class="row">
        <ul class="col-md-3 details-tab" role="tablist">
            <li role="presentation" class="active">
                <a href="#goodsDetails" aria-controls="home" role="tab" data-toggle="tab">
                商品介绍
                </a>
            </li>
            <li role="presentation">
                <a href="#goodsInfo" aria-controls="profile" role="tab" data-toggle="tab">
                商品规格
                </a>
            </li>
        </ul>
        <div class="tab-content col-md-9 ditails-tab-box">
            <div role="tabpanel" class="tab-pane active" id="goodsDetails">
                {!! html_entity_decode($product->description, ENT_QUOTES, 'UTF-8') !!}
            </div>
            <div role="tabpanel" class="tab-pane" id="goodsInfo">
                fffff2
            </div>
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

    <!--相关商品end-->

    </div>
    @stop

    @section('js')

    <script src="{{ URL::asset('assets/js/goodsDetail.js') }}"></script>

    @stop
