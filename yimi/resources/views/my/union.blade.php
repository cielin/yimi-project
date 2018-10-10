@extends('layout')

@section('title', '账号绑定')

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
            <i>&nbsp; / &nbsp;</i> 账号绑定
        </div>
    </div>
    <!--面包屑-->
    <div class="row">
        <div class="col-sm-4 col-md-3">
            <div class="sidebar">
                <div class="sidebar-title">
                    <img src="{{ URL::asset('assets/img/userCenterTitle.jpg') }}" />
                </div>
                <div class="user-center-left">
                    <a href="{{ url('my/info') }}">个人资料</a>
                    <a href="{{ url('my/orders') }}">我的订单</a>
                    <a href="{{ url('my/collections') }}">我的收藏</a>
                    <a href="{{ url('my/comments') }}">我的评论</a>
                    <a href="{{ url('my/messages') }}">我的消息</a>
                    <a href="{{ url('my/union') }}" class="active">账号绑定</a>
                    <a href="{{ url('my/changepassword') }}">修改密码</a>
                    <a href="{{ url('my/addresses') }}">收货地址</a>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-9 main">
            <div class="bind-account-box">
                <p class="bind-tip">
                    绑定第三方账号，可以直接登录网站，还可以将内容同步到以下平台， 与更多好友分享，如果当前账号在对应站点处于登录状态，需退出登录后，才能重新绑定；
                </p>
                <div class="bind-btn">
                    <div class="bindWeibo icon iconfont icon-xinlangweibo2">
                        <span>绑定微博</span>
                    </div>
                    <div class="bindWeixin active icon iconfont icon-weixin1">
                        <span>已绑定</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop