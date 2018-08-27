@extends('layout')

@section('title', '品牌')

@section('page-content')
<div class="wrapper-page container" style="padding-bottom:50px;">
    <!--面包屑-->
    <div class="breadcrumb">
        <div class="breadcrumb_text">
            <span>
    			<a href="{{ URL::to('/') }}" title="">
    			首页
    			</a>
    		</span>
            <i>&nbsp; / &nbsp;</i> 品牌列表
        </div>
    </div>
    <!--面包屑-->
    <div class="row">
        <div class="col-sm-4 col-md-3 ">
            <div class="sidebar">
                <div class="sidebar-title">
                    <img src="{{ URL::asset('assets/img/title1.jpg') }}" />
                </div>
                <ul class="brandListText">
                    <li><a href="#">Acerbis</a>
                    </li>
                    <li><a href="#">Agape</a>
                    </li>
                    <li class="active"><a href="#">Alessi</a>
                    </li>
                    <li><a href="#">Alias</a>
                    </li>
                    <li><a href="#">Angelo Cappellini</a>
                    </li>
                    <li><a href="#">Antonangeli</a>
                    </li>
                    <li><a href="#">Antoniolupi</a>
                    </li>
                    <li><a href="#">Arflex</a>
                    </li>
                    <li><a href="#">Arketipo</a>
                    </li>
                    <li><a href="#">Armani</a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="col-sm-8 col-md-9 main main-min">
            <div class="gray-box allA">
                <a id="checkAllBrand" class="checkAllBrand active" href="{{ route('brands.index') }}">全部</a>
                <ul class="check-words clearfix">
                    @for ($i = 0; $i < 26; ++$i)
                    <li>
                        <a href="{{ URL::to('/brands/f/' . strtolower(chr($i + 65))) }}">{{ chr($i + 65) }}</a>
                    </li>
                    @endfor
                </ul>
            </div>
            @if (isset($brands) && sizeof($brands) > 0)
            <ul class="brandList clearfix row">
                @foreach ($brands as $brand)
                <li class="col-md-4">
                    <a href="/brands/{{ $brand->slug }}">
                        <img src="{{ asset('public/thumbs/brands/thumb_' . $brand->logo) }}" />
                    </a>
                </li>
                @endforeach
            </ul>
            @else
            <div class="no-data">暂无数据</div>
            @endif
        </div>
    </div>

  </div>
@stop
