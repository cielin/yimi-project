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
        <div class="col-sm-4 col-md-3 col-xs-3 sidebarWrap">
            <div class="sidebar">
                <div class="sidebar-title">
                    <img src="{{ URL::asset('assets/img/title1.jpg') }}" />
                </div>
<<<<<<< HEAD
                @if (isset($all_brands) && sizeof($all_brands) > 0)
                <ul class="brandListText y-auto">
                    @foreach ($all_brands as $all_brand)
                    <li><a href="{{ url('brands/' . $all_brand->slug) }}">{{ $all_brand->name }}</a>
                    </li>
                    @endforeach
                </ul>
                @endif
=======
                <div class="y-auto"> 
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
>>>>>>> origin/chen2
            </div>

        </div>
        <div class="col-sm-8 col-md-9 col-xs-9 main main-min">
            <div class="gray-box allA">
                <a id="checkAllBrand" class="checkAllBrand @if (!isset($first)) active @endif" href="{{ route('brands.index') }}">全部</a>
                <ul class="check-words clearfix">
                    @for ($i = 0; $i < 26; ++$i)
                    <li>
                        <a @if (isset($first) && $first === strtolower(chr($i + 65))) class="active" @endif href="{{ URL::to('/brands/f/' . strtolower(chr($i + 65))) }}">{{ chr($i + 65) }}</a>
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
            <nav class="clearfix" aria-label="page navigation">
                <?php echo $brands->links(); ?>
            </nav>
            @else
            <div class="no-data">暂无数据</div>
            @endif
        </div>
    </div>

  </div>
@stop
