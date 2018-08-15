@extends('layout')

@section('title', '设计师')

@section('page-content')
<div class="wrapper-page container" style="margin-bottom: 100px;">
    <!--面包屑-->
    <div class="breadcrumb">
        <div class="breadcrumb_text">
            <span>
                <a href="{{ URL::to('/') }}" title="">
                首页
                </a>
            </span>
            <i>&nbsp; / &nbsp;</i> 设计师列表

        </div>
    </div>
    <!--面包屑-->
    @foreach ($designers as $designer)
    <div class="row designer-item">
        <div class="col-md-6">
            <div class="designer-bg clearfix">
                <div class="designer-user col-md-5">
                    <a href="{{ URL::to('/designers/' . $designer->slug) }}"><img src="{{ asset('public/thumbs/designers/thumb_' . $designer->avatar) }}"></a>
                </div>
                <div class="designer-text col-md-7">
                    <h5><a href="{{ URL::to('/designers/' . $designer->slug) }}"><span>{{ $designer->name }}</span></a></h5>
                    <p><a href="{{ URL::to('/designers/' . $designer->slug) }}">{{ substr(strip_tags($designer->description), 0, 90) }}</a></p>
                    <div class="more"><a href="{{ URL::to('/designers/' . $designer->slug) }}">MORE <i class="icon iconfont icon-shuangjiantou"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @if (count($designer->products) > 1)
        <?php $i = 0; ?>
        @foreach ($designer->products as $product)
        <div class="col-md-3 designer-img">
            <img src="{{ asset('public/thumbs/products/thumb_' . $product->featured_image) }}">
        </div>
        @if ($i++ == 1)
            @break
        @endif
        @endforeach
        @endif
    </div>
    @endforeach
    
    </div>
    @stop
