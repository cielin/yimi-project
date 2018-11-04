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
            <article class="row litteBanner">
                <div class="litteBannerImg col-md-6 col-sm-6 col-xs-6">
                    @if (isset($sl_banner))
                    <img src="{{ asset('public/images/banners/' . $sl_banner->image) }}" width="100%">
                    @endif
                </div>
                <ul class="col-md-6 col-sm-6 col-xs-6" style="list-style: none;padding: 0;">
                    @if (isset($srt_banners))
                    @foreach ($srt_banners as $srt_banner)
                    <li class="col-md-6 col-sm-6 col-xs-6 img2018_01"><img src="{{ asset('public/images/banners/' . $srt_banner->image) }}" width="100%"></li>
                    @endforeach
                    @endif
                    @if (isset($srb_banner))
                    <li class="col-md-12 col-sm-12 col-xs-12  img2018_03"><img src="{{ asset('public/images/banners/' . $srb_banner->image) }}" width="100%"></li>
                    @endif
                </ul>
                
            </article>
            <div class="container overHide mb40 subTitles">
        		<span><img style="padding: 0px;" src="{{ URL::asset('assets/img/index_title.jpg') }}"></span>
                @if (isset($categories) && sizeof($categories) > 0)
                 <ul class="index-title-ul" role="tablist">
                    <!-- @foreach ($categories as $category)
                    <li role="presentation" class="active">
                        <a href="{{ url('/categories/' . $category->slug) }}"  href="#home"  aria-controls="home" role="tab" data-toggle="tab">{{ $category->name }}</a>
                    </li>
                    @endforeach -->
                     <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                    <li class="more"><i>|</i><a href="{{ url('categories') }}">MORE <i class="icon iconfont icon-shuangjiantou"></i></a>
                    </li> 
                </ul>
                @endif
            </div>
            <div class="container overHide tab-content">
                <div  role="tabpanel" class="designer buyer tab-pane active row" id="home">
                	@if (isset($featured_products))
                	@foreach ($featured_products as $featured_product)
                        
                        <dl class="col-md-3 col-sm-3 col-xs-6">
                            <dt>
                                <p class="ico-wrap">
                                    @if (Auth::check() && App\Http\Controllers\CustomerController::isCollected(Auth::user()->id, $featured_product->id))
                                    <span class="glyphicon glyphicon-heart heart-detail" data-id="{{ $featured_product->id }}"></span>
                                    @else
                                    <span class="glyphicon glyphicon-heart-empty heart-detail" data-id="{{ $featured_product->id }}"></span>
                                    @endif
                                    <a href="/products/{{ $featured_product->slug }}"><span class="icon iconfont icon-yanjing1"></span></a>
                                </p>
                            </dt>
                            <dd>
                            	<img src="{{ asset('public/images/products/' . $featured_product->featured_image) }}">
                            </dd>
                            <div class="buyer-text">
                                <a href="/products/{{ $featured_product->slug }}"><span>{{ $featured_product->name }}</span></a>
                            </div>
                        </dl>
                    
                    @endforeach
                    @endif
                </div>
                <div role="tabpanel" class="designer buyer tab-pane" id="profile">
                <a href="#">
                    <dl>
                      <dt>
                        <p class="ico-wrap">
                            <span class="glyphicon glyphicon-heart-empty"></span>
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </p>
                      </dt>
                      <dd>
                       <img src="../assets/img/picture/img04.jpg">
                      </dd>
                      <div class="buyer-text"><span>profile</span></div>
                    </dl>
                  </a>
                </div>
                <div role="tabpanel" class="designer buyer tab-pane" id="messages">
                  <a href="#">
                    <dl>
                      <dt>
                        <p class="ico-wrap">
                            <span class="glyphicon glyphicon-heart-empty"></span>
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </p>
                      </dt>
                      <dd>
                       <img src="../assets/img/picture/img04.jpg">
                      </dd>
                      <div class="buyer-text"><span>messages</span></div>
                    </dl>
                  </a>

                </div>
                <div role="tabpanel" class="designer buyer tab-pane" id="settings">
                    <a href="#">
                    <dl>
                      <dt>
                        <p class="ico-wrap">
                            <span class="glyphicon glyphicon-heart-empty"></span>
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </p>
                      </dt>
                      <dd>
                       <img src="../assets/img/picture/img04.jpg">
                      </dd>
                      <div class="buyer-text"><span>settings</span></div>
                    </dl>
                  </a>
                </div>
            </div>
        </div>
        @if (isset($designers))
        <!--设计师-->
        <div class="container designers-mobile">
            <div class="container overHide mb40  subTitles">
                <span>
        			<img style="padding: 0px;" src="{{ URL::asset('assets/img/foot/designers.png') }}">
                </span>
                <span class="more"><a href="{{ url('designers') }}">MORE <i class="icon iconfont icon-shuangjiantou"></i></a></span>

            </div>
            <div class="container overHide" style="padding-bottom:14px;">
                <div class="designer designer-new-hover">
                    @foreach ($designers as $designer)
                    <a href="{{ url('designers/' . $designer->slug) }}"  class="col-md-3 col-sm-3 col-xs-6">
                        <dl>
                            <dt>
                                <p>{{ $designer->name }}</p><br/>
                                @if ($designer->description !== null || $designer->description !== '')
                                <p>{{ mb_substr(strip_tags($designer->description), 0, 60) }} ...</p>
                                @endif
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
    <div class="wrap  bg-hui-f1" style="margin-top:-10px;">
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
                        @if (isset($spotlights))
                        @foreach ($spotlights as $spotlight)
                        <div class="item">
                            <div class="animate-box">
                                @if ($spotlight['type'] == 'product')
                                <img src="{{ asset('public/images/products/' . $spotlight['image']) }}" alt="{{ $spotlight['title'] }}">
                                @else
                                <img src="{{ asset('public/images/spotlights/' . $spotlight['image']) }}" alt="{{ $spotlight['title'] }}">
                                @endif
                                <div class="fh5co-desc">
                                    {{ $spotlight['title'] }}
                                </div> 
                            </div>
                            <div class="itemHover">
                                <p class="ico-wrap">
                                @if ($spotlight['type'] == 'product')
                                    @if (Auth::check() && App\Http\Controllers\CustomerController::isCollected(Auth::user()->id, $spotlight['id']))
                                    <span class="glyphicon glyphicon-heart heart-detail" data-id="{{ $spotlight['id'] }}"></span>
                                    @else
                                    <span class="glyphicon glyphicon-heart-empty heart-detail" data-id="{{ $spotlight['id'] }}"></span>
                                    @endif
                                    <a href="/products/{{ $spotlight['link'] }}"><span class="icon iconfont icon-yanjing1"></span></a>
                                @else
                                    <span class="glyphicon glyphicon-heart-empty" data-id="{{ $spotlight['id'] }}"></span>
                                    <span class="icon iconfont icon-sousuo clickico"  data-toggle="modal" data-target=".myModalImg"  data-src="{{ asset('public/images/spotlights/' . $spotlight['image']) }}" data-alt="{{ $spotlight['title'] }}"></span>
                                @endif
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
<!--展示瀑布流大图位置 start-->
<div class="modal fade myModalImg" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><img src="../assets/img/close.png"></button>
      <div class="modal-body">
        <img id="bigImg"/>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--展示瀑布流大图位置 end-->
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
