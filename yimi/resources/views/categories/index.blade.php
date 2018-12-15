@extends('layout')

@section('title', '商品')

@section('active', 'categories')

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
            <i>&nbsp; / &nbsp;</i> 商品列表
        </div>
    </div>
    <!--面包屑-->
    <div class="row">
        <div class="col-sm-3 col-md-3 col-xs-12 sidebarWrap">
            <div class=" sidebar">
                <div class="sidebar-title">
                	<img src="{{ URL::asset('assets/img/title1.jpg') }}" />
                </div>
                <!-- web start -->
                <div class="s-content s-contentWeb">
                    <a class="side-one" href="/categories/new">
                        新品
                    </a>
                    @if (isset($categories))
                    @foreach ($categories as $category)
                    <a class="side-one" href="/categories/{{ $category->slug }}">
                        {{ $category->name }}
                    </a>
                    @if (isset($selected_parent_category) && null !== $selected_parent_category && $category->slug == $selected_parent_category->slug)
                    @if (isset($category->children) && sizeof($category->children) > 0)
                    <ul class="side-sub collapse in nav-new" id="{{ $category->slug }}">
                        @foreach ($category->children as $s_category)
                        <li @if ((null !== $selected_category) && ($s_category->slug == $selected_category->slug)) class="active" @endif>
                            <span class="icon iconfont  icon-arrow-right"></span>
                            <a href="/categories/{{ $s_category->slug }}">{{ $s_category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    @endif
                    @endforeach
                    @endif
                </div>
                <!-- web end  -->
                
                <!-- mobile start -->
                <div class="s-content s-contentMobile">
                    @if (isset($categories))
                    @foreach ($categories as $category)
                    <a class="side-one" href="/categories/{{ $category->slug }}">
                        {{ $category->name }}
                    </a>
                    @if (isset($selected_parent_category) && null !== $selected_parent_category && $category->slug == $selected_parent_category->slug)
                    @if (isset($category->children) && sizeof($category->children) > 0)
                    <ul class="side-sub collapse in nav-new" id="{{ $category->slug }}">
                        @foreach ($category->children as $s_category)
                        <li @if ((null !== $selected_category) && ($s_category->slug == $selected_category->slug)) class="active" @endif>
                            <span class="icon iconfont  icon-arrow-right"></span>
                            <a href="/categories/{{ $s_category->slug }}">{{ $s_category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    @endif
                    @endforeach
                    @endif
                </div>
                <!-- mobile end  -->

                @if (isset($locations) && sizeof($locations) > 0)
                <?php 
                    $count = 1;
                    $queries = array();
                    $base = preg_replace('/\?.*/i', '', $_SERVER['REQUEST_URI']);
                    if (isset($_SERVER['QUERY_STRING'])) {
                        parse_str($_SERVER['QUERY_STRING'], $queries);
                    }
                ?>
                <div class="sidebar-title mt11">
                    <img src="{{ URL::asset('assets/img/title3.jpg') }}" />
                </div>
                <div class="sidebar-box">
                    <div class="sidebar-subtitle">选择产地</div>
                    <div class="sidebar-content ">
                        <!--带样式的checkbox需要赋值不同的id end -->
                        @foreach ($locations as $location)
                        <div class="checkboxWrap">
                            <?php
                                $remark = 0;
                                if (sizeof($queries) > 0) {
                                    $nq = $queries;
                                    if (array_key_exists("l", $nq)) {
                                        if (in_array($location, $nq['l'])) {
                                            $remark = 1;
                                            $nq['l'] = array_diff($nq['l'], array($location));
                                        } else {
                                            array_push($nq['l'], $location);
                                        }
                                    }

                                    $nqs = http_build_query($nq);
                                    $href = $base . "?" . $nqs;
                                } else {
                                    $href = $base . "?l[]=" . urlencode($location);
                                }
                            ?>
                            <input value="{{ $location }}" class="magic-checkbox" type="checkbox" name="layout" id="l{{ $count }}" @if($remark == 1) checked @endif>
                            <label for="l{{ $count }}" style="width: 100%">
                                <a style="position: absolute;left: 20px;font-size: 14px;" href="{{ $href }}">{{ $location }}</a>
                            </label>
                        </div>
                        <?php $count ++ ?>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="col-sm-9 col-md-9 col-xs-12 main">
            @if (isset($selected_category) && $selected_category->depth === 1)
            @if (isset($selected_category->children) && sizeof($selected_category->children) > 0)
            <div class="good-list-top-bg">
                 <div class="all"><a class="active" href="{{ url('categories/' . $selected_category->slug) }}">全部</a></div>
                <ul class="good-list-top uls">
                    
                    @foreach ($selected_category->children as $category)
                    <li><a href="{{ url('categories/' . $category->slug) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            @endif
            @endif

            @if (isset($selected_category) && $selected_category->depth === 2)
            @if (isset($selected_category->parent->children) && sizeof($selected_category->parent->children) > 0)
            <div class="good-list-top-bg">
                 <div class="all"><a href="{{ url('categories/' . $selected_category->slug) }}">全部</a></div>
                <ul class="good-list-top uls">
                    
                    @foreach ($selected_category->parent->children as $category)
                    <li><a href="{{ url('categories/' . $category->slug) }}" @if ($category->id === $selected_category->id) class="active" @endif>{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            @endif
            @endif
            <div class="top-option clearfix">
                <i class="glyphicon glyphicon-th"></i>
            </div>

            @if (isset($products) && sizeof($products) > 0)
            <!--瀑布流开始 -->
            <div class="col-md-12 noPadding">
                <div class="col-md-12 noPadding">
                    <div id="fh5co-main" class="waterfallNew size3">
                        <div class="col-md-12">
                            <div class="row">
                                <div id="fh5co-board" data-columns class="categories">
                                   <!--  @foreach ($products as $product)
                                    <div class="item">
                                        <div class="animate-box">
                                            @if ($product->poster !== null && $product->poster !== "")
                                            <img src="{{ asset('public/images/products/' . $product->poster) }}">
                                            @else
                                            <img src="{{ asset('public/images/products/' . $product->featured_image) }}">
                                            @endif
                                            <div class="fh5co-desc">{{ $product->name }}</div>
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
                                    @endforeach -->
                                </div>
                                <div class="lodeNext">LOAD MORE ..<i class="icon iconfont icon-shuangjiantou"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--瀑布流end -->
            
            @else
            <div class="no-data">暂无数据</div>
            @endif

        </div>
    </div>
 </div>         
@stop

@section('js')
<!-- Waypoints -->
<script type="text/javascript" src="{{ URL::asset('plugin/jquery.waypoints.min.js') }}"></script>

<!-- Magnific Popup -->
<script type="text/javascript" src="{{ URL::asset('plugin/jquery.magnific-popup.min.js') }}"></script>
<!-- Salvattore -->
<script type="text/javascript" src="{{ URL::asset('plugin/salvattore.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/myPPL.js') }}"></script>
@stop
