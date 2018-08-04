@extends('layout')

@section('title', '首页')

@section('css')

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
/**************/
</style>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('plugin/swiper/css/swiper.css') }}" />
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
<div class="wrapper">
    <div class="sowingMap">
        <div class="swiper-container swiper1">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                	<img src="{{ URL::asset('assets/img/picture/sowingmap1.jpg') }}">
                </div>
                <div class="swiper-slide">
                	<img src="{{ URL::asset('assets/img/picture/sowingmap2.jpg') }}">
                </div>
                <div class="swiper-slide">
                	<img src="{{ URL::asset('assets/img/picture/sowingmap1.jpg') }}">
                </div>
                <div class="swiper-slide">
                	<img src="{{ URL::asset('assets/img/picture/sowingmap2.jpg') }}">
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <!-- <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div> -->
        </div>
    </div>
    <div class="index-content">
        <div class="container-fluid" style="padding-left:0; padding-right:0;">
            <article class="row litteBanner">


                <div class="litteBannerImg col-md-6 col-sm-6 col-xs-6">
                	<img src="{{ URL::asset('assets/img/picture/img01.jpg') }}">
                </div>
                <ul class="col-md-6 col-sm-6 col-xs-6" style="list-style: none;padding: 0;">
                    <li class="col-md-6 col-sm-6 col-xs-6">
                    	<img src="{{ URL::asset('assets/img/picture/img02.jpg') }}" width="100%">
                    </li>
                    <li class=" col-md-6 col-sm-6 col-xs-6">
                    	<img src="{{ URL::asset('assets/img/picture/img03.jpg') }}" width="100%">
                    </li>
                    <li class="col-md-12 col-sm-12 col-xs-12">
                    	<img src="{{ URL::asset('assets/img/picture/img06.jpg') }}" width="100%">
                    </li>
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
                    <li class="more"><a href="#">MORE >></a>
                    </li>
                </ul>
            </div>
            <div class="container overHide">
                <div class="designer buyer">
                	@if (isset($featured_products))
                	@foreach ($featured_products as $featured_product)
                    <a href="/products/{{ $featured_product->slug }}">
                        <dl>
                            <dt>
                                <p class="ico-wrap">
                                    <span class="glyphicon glyphicon-heart-empty"></span>
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </p>
                            </dt>
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
            </div>
        </div>
        <!--设计师-->
        <div class="container-fluid">
            <div class="container overHide  mb40">
                <span>
        			<img src="{{ URL::asset('assets/img/foot/designers.png') }}">
                </span>
                <span class="more"><a href="#">MORE >></a></span>

            </div>
            <div class="container overHide">
                <div class="designer">
                    <a href="#">
                        <dl>
                            <dt>
                                <p>RM Aarchitects设计创始人</p>
                                <p>RICCARDO Minervini</p>
                                <p>RM Architect...</p>
                            </dt>
                            <dd>
                            	<img src="{{ URL::asset('assets/img/foot/pp.jpg') }}">
                            </dd>
                        </dl>
                    </a>
                    <a href="#">
                        <dl>
                            <dt>
                                <p>RM Aarchitects设计创始人</p>
                                <p>RICCARDO Minervini</p>
                                <p>RM Architect...</p>
                            </dt>
                            <dd>
                                <img src="{{ URL::asset('assets/img/foot/pp.jpg') }}">
                            </dd>
                        </dl>
                    </a>
                    <a href="#">
                        <dl>
                            <dt>
                                <p>RM Aarchitects设计创始人</p>
                                <p>RICCARDO Minervini</p>
                                <p>RM Architect...</p>
                            </dt>
                            <dd>
                                <img src="{{ URL::asset('assets/img/foot/pp.jpg') }}">
                            </dd>
                        </dl>
                    </a>
                    <a href="#">
                        <dl>
                            <dt>
                                <p>RM Aarchitects设计创始人</p>
                                <p>RICCARDO Minervini</p>
                                <p>RM Architect...</p>
                            </dt>
                            <dd>
                                <img src="{{ URL::asset('assets/img/foot/pp.jpg') }}">
                            </dd>
                        </dl>
                    </a>
                    <a href="#">
                        <dl>
                            <dt>
                                <p>RM Aarchitects设计创始人</p>
                                <p>RICCARDO Minervini</p>
                                <p>RM Architect...</p>
                            </dt>
                            <dd>
                                <img src="{{ URL::asset('assets/img/foot/pp.jpg') }}">
                            </dd>
                        </dl>
                    </a>
                    <a href="#">
                        <dl>
                            <dt>
                                <p>RM Aarchitects设计创始人</p>
                                <p>RICCARDO Minervini</p>
                                <p>RM Architect...</p>
                            </dt>
                            <dd>
                                <img src="{{ URL::asset('assets/img/foot/pp.jpg') }}">
                            </dd>
                        </dl>
                    </a>
                    <a href="#">
                        <dl>
                            <dt>
                                <p>RM Aarchitects设计创始人</p>
                                <p>RICCARDO Minervini</p>
                                <p>RM Architect...</p>
                            </dt>
                            <dd>
                                <img src="{{ URL::asset('assets/img/foot/pp.jpg') }}">
                            </dd>
                        </dl>
                    </a>
                    <a href="#">
                        <dl>
                            <dt>
                                <p>RM Aarchitects设计创始人</p>
                                <p>RICCARDO Minervini</p>
                                <p>RM Architect...</p>
                            </dt>
                            <dd>
                                <img src="{{ URL::asset('assets/img/foot/pp.jpg') }}">
                            </dd>
                        </dl>
                    </a>

                </div>
            </div>
        </div>
        <!--设计师 end-->
        <!--瀑布流开始 -->
        <div class="container-fluid">
          <div class="container">
            <div class="waterfalls  bg-hui-f1">
              <h3 style="margin-bottom: 0px;">
                <img src="../assets/img/foot/tit-water.png" alt="">
              </h3>
            </div>
            <div id="fh5co-main" class="bg-hui-f1">
                <div class="container">
                  <div class="row">
                     <div id="fh5co-board" data-columns>
                        <div class="item">
                            <div class="animate-box">
                                <img src="{{ asset('public/images/products/' . $waterfalled_product ->featured_image) }}" alt="{{ $waterfalled_product->name }}">
                                <div class="fh5co-desc">
                                    {{ $waterfalled_product->name }}
                                </div>
                                <div class="itemHover">
                                    <p class="ico-wrap">
                                        <span class="glyphicon glyphicon-heart-empty"></span>
                                        <a href="/products/{{ $waterfalled_product->slug }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                     </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!--瀑布流end -->
    </div><!--index-contentend -->


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