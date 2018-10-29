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
        <div class="col-sm-3 col-md-3 col-xs-3 sidebarWrap">
            <div class=" sidebar">
                <div class="sidebar-title">
                	<img src="{{ URL::asset('assets/img/title1.jpg') }}" />
                </div>
                <div class="s-content">
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

                @if (isset($materials) && sizeof($materials) > 0)
                <?php $count = 1; ?>
                <div class="sidebar-title mt11">
                    <img src="{{ URL::asset('assets/img/title2.jpg') }}" />
                </div>
                <div class="sidebar-box">
                    <div class="sidebar-subtitle">选择材质</div>
                    
                    <div class="sidebar-content">
                        <!--带样式的checkbox需要赋值不同的id start-->
                        <div class="checkboxWrap">
                            <input value="2" class="magic-checkbox allAndNotAll" type="checkbox" name="layout" id="m0">
                            <label for="m0">
                                <i style="position: absolute;left: 20px;font-size: 14px;">全部</i>
                            </label>
                        </div>
                        <!--带样式的checkbox需要赋值不同的id end -->
                        @foreach ($materials as $material)
                        <div class="checkboxWrap">
                            <input value="{{ $material }}" class="magic-checkbox" type="checkbox" name="layout" id="m{{ $count }}">
                            <label for="m{{ $count }}">
                                <a href="@if (url()->full() === url()->current()) {{ url()->full() . '?m[]=' . $material }} @else {{ url()->full() . '&m[]=' . $material }} @endif"><i>{{ $material }}</i></a>
                            </label>
                        </div>
                        <?php $count ++ ?>
                        @endforeach
                    </div>
                </div>
                @endif

                @if (isset($locations) && sizeof($locations) > 0)
                <?php $count = 1; ?>
                <div class="sidebar-title mt11">
                    <img src="{{ URL::asset('assets/img/title3.jpg') }}" />
                </div>
                <div class="sidebar-box">
                    <div class="sidebar-subtitle">选择产地</div>
                    <div class="sidebar-content ">
                        <!--带样式的checkbox需要赋值不同的id start-->
                        <div class="checkboxWrap">
                            <input value="2" class="magic-checkbox allAndNotAll" type="checkbox" name="layout" id="l0">
                            <label for="l0">
                                <i style="position: absolute;left: 20px;font-size: 14px;">全部</i>
                            </label>
                        </div>
                        <!--带样式的checkbox需要赋值不同的id end -->
                        @foreach ($locations as $location)
                        <div class="checkboxWrap">
                            <input value="{{ $location }}" class="magic-checkbox" type="checkbox" name="layout" id="l{{ $count }}">
                            <label for="l{{ $count }}">
                                <i style="position: absolute;left: 20px;font-size: 14px;">{{ $location }}</i>
                            </label>
                        </div>
                        <?php $count ++ ?>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="col-sm-9 col-md-9 col-xs-9 main">
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
                <div class="center-num">
                    <span class="pull-left">展示</span>
                    <!-- <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select> -->
                    <!--模拟select框 start-->
                    <div class="model-select-box">
                      <div class="model-select-text" data-value="">1</div>
                      <i class="sanjiao glyphicon glyphicon-triangle-bottom"></i>
                      <ul class="model-select-option">
                        <li data-option="1">1</li>
                        <li data-option="2">2</li>
                        <li data-option="3">3</li>
                        <li data-option="4">4</li>
                        <li data-option="5">5</li>
                        <li data-option="6">6</li>
                        <li data-option="7">7</li>
                      </ul>
                    </div>
                    <!--模拟select框 end-->
                    <span class="pull-left">/ 页</span>
                </div>
                <div class="goods-order">
                    <span class="pull-left">排列方式</span>
                    <!-- <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select> -->
                    <!--模拟select框 start-->
                    <div class="model-select-box" style="width:130px; margin-right:10px;">
                      <div class="model-select-text" data-value="">默认</div>
                      <i class="sanjiao glyphicon glyphicon-triangle-bottom" style="left:83%!important;"></i>
                      <ul class="model-select-option">
                        <li data-option="a">默认</li>
                        <li data-option="b">发布时间升序</li>
                        <li data-option="c">发布时间倒序</li>
                      </ul>
                    </div>
                    <!--模拟select框 end-->
                </div>
            </div>

<!--             @if (isset($products) && sizeof($products) > 0)
            <div class="designer buyer goods clearfix">
                @foreach ($products as $product)
               
                    <dl>
                        <dt>
                            <p class="ico-wrap">
                                @if (Auth::check() && App\Http\Controllers\CustomerController::isCollected(Auth::user()->id, $product->id, 1))
                                <span class="glyphicon glyphicon-heart heart-detail" data-id="{{ $product->id }}" data-type="1"></span>
                                @else
                                <span class="glyphicon glyphicon-heart-empty heart-detail" data-id="{{ $product->id }}" data-type="1"></span>
                                @endif
                                <a href="/products/{{ $product->slug }}"><span class="icon iconfont icon-yanjing1"></span></a>
                            </p>
                        </dt>
                        <dd>
                            <img src="{{ asset('public/images/products/' . $product->featured_image) }}">
                        </dd>
                        <div class="buyer-text"><span>{{ $product->name }}</span>
                        </div>
                    </dl>
                
                @endforeach
            </div>

            <nav class="clearfix" aria-label="page navigation">
                <?php echo $products->links(); ?>
            </nav> -->
 <!-- @if (isset($products) && sizeof($products) > 0) -->
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
                               <img src="{{ asset('public/images/products/' . $product->featured_image) }}">
                                <div class="fh5co-desc">
                                    {{ $product->name }}
                                </div>
                                <div class="itemHover">
                                    <p class="ico-wrap">
                                        @if (Auth::check() && App\Http\Controllers\CustomerController::isCollected(Auth::user()->id, $product->id, 1))
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
    <!--瀑布流end -->
            <!-- @else
            <div class="no-data">暂无数据</div>
            @endif -->
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