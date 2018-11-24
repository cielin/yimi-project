@extends('layout')

@section('title', '我的收藏')

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
            <i>&nbsp; / &nbsp;</i> 个人中心
            <i>&nbsp; / &nbsp;</i> 我的收藏
        </div>
    </div>
    <!--面包屑-->
    <div class="row">
        <div class="col-sm-3 col-md-3 col-xs-3 sidebarWrap">
            <div class="sidebar">
                <div class="sidebar-title">
                    <img src="{{ URL::asset('assets/img/userCenterTitle.jpg') }}" />
                </div>
                <div class="user-center-left">
                    <a href="{{ url('my/info') }}">个人资料</a>
                    <a href="{{ url('my/orders') }}">我的订单</a>
                    <a href="{{ url('my/collections') }}" class="active">我的收藏</a>
                    <a href="{{ url('my/comments') }}">我的评论</a>
                    <a href="{{ url('my/messages') }}">我的消息</a>
                    <!--<a href="{{ url('my/union') }}">账号绑定</a>-->
                    <a href="{{ url('my/changepassword') }}">修改密码</a>
                    <a href="{{ url('my/addresses') }}">收货地址</a>
                </div>
            </div>
        </div>
        <div class=" col-md-9 col-sm-9 col-xs-9 main">

            <div class="searchText">
                <a href="#" id="seachAllPro">所有商品</a>
                <a href="#" id="">已失效</a>

                <input type="text" class="form-control cllectionSearch" id="cllectionSearch" placeholder="请输入商品名">

            </div>
            @if (isset($collection) && sizeof($collection) > 0)
            <div class="designer buyer goods clearfix">
                @foreach ($collection as $collect)
               
                    <dl>
                        <dt>
                            <p class="ico-wrap">
                                @if (Auth::check() && App\Http\Controllers\CustomerController::isCollected(Auth::user()->id, $collect->product_id, 1))
                                <span class="glyphicon glyphicon-heart heart-detail" data-id="{{ $collect->product_id }}" data-type="1"></span>
                                @else
                                <span class="glyphicon glyphicon-heart-empty heart-detail" data-id="{{ $collect->product_id }}" data-type="1"></span>
                                @endif
                                 <a href="/products/{{ $collect->product->slug }}"><span class="icon iconfont icon-yanjing1"></span></a>
                            </p>
                        </dt>
                        <dd>
                            <img src="{{ asset('public/images/products/' . $collect->product_featured_image) }}">
                        </dd>
                        <div class="buyer-text"><span>{{ $collect->product_title }}</span>
                        </div>
                    </dl>
                
                @endforeach
            </div>
            <nav class="clearfix" aria-label="page navigation">
                <?php echo $collection->links(); ?>
            </nav>
            @else
            <div class="no-data">暂无数据</div>
            @endif
        </div>
    </div>
</div>
@stop
