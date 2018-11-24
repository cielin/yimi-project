@extends('layout')

@section('title', '空间')

@section('active', 'spaces')

@section('css')
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
            <i>&nbsp; / &nbsp;</i> 空间
        </div>
    </div>
    <!--面包屑-->
    <div class="row">
        <div class="col-sm-3 col-md-3 col-xs-3 sidebarWrap">
            <div class=" sidebar">
                <div class="sidebar-title">
                	<img src="{{ URL::asset('assets/img/title1.jpg') }}" />
                </div>
                <div class="s-content">
                    <ul class="side-sub collapse in nav-new">
                        <li @if (!isset($sel_space)) class="active" @endif>
                            <span class="icon iconfont  icon-arrow-right"></span>
                            <a href="/spaces">全部</a>
                        </li>
                        @if (isset($spaces) && sizeof($spaces) > 0)
                        @foreach ($spaces as $space)
                        <li @if (isset($sel_space) && $sel_space == $space) class="active" @endif>
                            <span class="icon iconfont  icon-arrow-right"></span>
                            <a href="/spaces/{{ $space }}">{{ $space }}</a>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-9 col-md-9 col-xs-9 main">
            <div class="top-option clearfix">
                <i class="glyphicon glyphicon-th"></i>
                <!--
                <div class="goods-order">
                    <span class="pull-left">排列方式</span>
                    <div class="model-select-box" style="width:130px; margin-right:10px;">
                      <div class="model-select-text" data-value="">默认</div>
                      <i class="sanjiao glyphicon glyphicon-triangle-bottom" style="left:83%!important;"></i>
                      <ul class="model-select-option">
                        <li data-option="a">默认</li>
                        <li data-option="b">发布时间升序</li>
                        <li data-option="c">发布时间倒序</li>
                      </ul>
                    </div>
		</div>
                -->
            </div>

            @if (isset($products) && sizeof($products) > 0)
            <!--瀑布流开始 -->
            <div class="container-fluid">
                <div class="container ">
                    <div id="fh5co-main" class="waterfallNew">
                        <div class="container1">
                            <div class="row">
                                <div id="fh5co-board" data-columns>
                                    @foreach ($products as $product)
                                    <div class="item">
                                        <div class="animate-box">
                                            @if ($product->poster !== null && $product->poster !== "")
                                            <img src="{{ asset('public/images/products/' . $product->poster) }}">
                                            @else					
                                            <img src="{{ asset('public/images/products/' . $product->featured_image) }}">
                                            @endif
                                            <div class="fh5co-desc">
                                                {{ $product->name }}
                                            </div>
                                            <div class="itemHover">
                                                <p class="ico-wrap">
                                                    @if (Auth::check() &&
                                                    App\Http\Controllers\CustomerController::isCollected(Auth::user()->id,
                                                    $product->id, 1))
                                                    <span class="glyphicon glyphicon-heart heart-detail" data-id="{{ $product->id }}"
                                                        data-type="1"></span>
                                                    @else
                                                    <span class="glyphicon glyphicon-heart-empty heart-detail" data-id="{{ $product->id }}"
                                                        data-type="1"></span>
                                                    @endif
                                                    <a href="/products/{{ $product->slug }}"><span class="icon iconfont icon-yanjing1"></span></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--瀑布流end -->

            <!-- <nav class="clearfix" aria-label="page navigation">
                <?php // echo $products->links(); ?>
            </nav> -->
            @else
            <div class="no-data">暂无数据</div>
            @endif
        </div>
    </div>
 </div> 
@stop

@section('js')
<!-- Waypoints -->
<script type="text/javascript" src="{{ URL::asset('../plugin/jquery.waypoints.min.js') }}"></script>

<!-- Magnific Popup -->
<script type="text/javascript" src="{{ URL::asset('../plugin/jquery.magnific-popup.min.js') }}"></script>
<!-- Salvattore -->
<script type="text/javascript" src="{{ URL::asset('../plugin/salvattore.min.js') }}"></script>
@stop
