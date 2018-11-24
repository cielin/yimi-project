@extends('layout')

@section('title', $brand->name . '_品牌')
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
            <i>&nbsp; / &nbsp;</i>
            <span>
                <a href="{{ route('brands.index') }}" title="">
                品牌列表
                </a>
            </span>
            <i>&nbsp; / &nbsp;</i> {{ $brand->name }}
        </div>
    </div>
    <!--面包屑-->
    <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3 sidebarWrap brandsSideBar">
            <div class=" sidebar" style="padding-right:30px;">
                <div class="brandBigImg">
                    <a href="#"><img src="{{ asset('public/images/brands/' . $brand->logo) }}">
                    </a>
                </div>
                <div class="brandText">
                    {!! html_entity_decode($brand->description, ENT_QUOTES, 'UTF-8') !!}
                </div>
            </div>
        </div>
        <div class=" col-md-9 col-sm-8 col-xs-12  main">
            <div class="top-option clearfix">
                <i class="glyphicon glyphicon-th"></i>
            </div>
            
            <div class="container-fluid noPadding">
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
                                                    <span class="glyphicon glyphicon-heart heart-detail" data-id="{{ $product->id }}" data-type="1"></span>
                                                    @else
                                                    <span class="glyphicon glyphicon-heart-empty heart-detail" data-id="{{ $product->id }}" data-type="1"></span>
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
        </div>
    </div>
</div>

@stop

@section('js')
<!-- Waypoints -->
<script src="{{ URL::asset('plugin/jquery.waypoints.min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ URL::asset('plugin/jquery.magnific-popup.min.js') }}"></script>
<!-- Salvattore -->
<script src="{{ URL::asset('plugin/salvattore.min.js') }}"></script>
@stop
