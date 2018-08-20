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
                    <span>展示</span>
                    <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <span>/ 页</span>
                </div>
                <div class="goods-order">
                    <span>排列方式</span>
                    <select class="form-control">
                        <option>默认</option>
                        <option>名称A-Z</option>
                        <option>名称Z-A</option>
                    </select>
                </div>
            </div>

            <div class="designer buyer goods clearfix">
                @foreach ($products as $product)
                
                    <dl>
                        <dt>
                            <p class="ico-wrap">
                                <span class="glyphicon glyphicon-heart-empty" data-id="{{ $product->id }}"></span>
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
