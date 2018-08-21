@extends('layout')

@section('title', $brand->name . '_品牌')

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
        <div class="col-md-3 col-sm-3 col-xm-3">
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
        <div class=" col-md-9 col-sm-8 col-xs-8  main">
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
                        <option>默认</option>
                        <option>名称A-Z</option>
                        <option>名称Z-A</option>
                    </select> -->
                    <!--模拟select框 start-->
                    <div class="model-select-box" style="margin-right:10px;">
                      <div class="model-select-text" data-value="">1</div>
                      <i class="sanjiao glyphicon glyphicon-triangle-bottom" style="left:83%;"></i>
                      <ul class="model-select-option">
                        <li data-option="a">默认</li>
                        <li data-option="b">名称A-Z</li>
                        <li data-option="c">名称Z-A</li>
                      </ul>
                    </div>
                    <!--模拟select框 end-->
                </div>
            </div>

            <div class="designer buyer goods clearfix">
                @foreach ($products as $product)
                
                    <dl>
                        <dt>
                            <p class="ico-wrap">
                                @if (Auth::check() && App\Http\Controllers\CustomerController::isCollected(Auth::user()->id, $product->id))
                                <span class="glyphicon glyphicon-heart heart-detail" data-id="{{ $product->id }}"></span>
                                @else
                                <span class="glyphicon glyphicon-heart-empty heart-detail" data-id="{{ $product->id }}"></span>
                                @endif
                                <a href="/products/{{ $product->slug }}"><span class="icon iconfont icon-yanjing1"></span></a>
                            </p>
                        </dt>
                        <dd>
                            <img src="{{ asset('public/images/products/' . $product ->featured_image) }}">
                        </dd>
                        <div class="buyer-text"><span>{{ $product->name }}</span>
                        </div>
                    </dl>
               
                @endforeach
            </div>
            <nav class="clearfix" aria-label="page navigation">
                <?php echo $products->links(); ?>
            </nav>
        </div>
    </div>
</div>

@stop
