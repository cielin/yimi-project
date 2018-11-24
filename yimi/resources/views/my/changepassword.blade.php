@extends('layout')

@section('title', '修改密码')

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
            <i>&nbsp; / &nbsp;</i> 修改密码
        </div>
    </div>
    <!--面包屑-->
    <div class="row">
        <div class="col-sm-4 col-md-12 sidebarNewWrap">
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
                    <a href="{{ url('my/union') }}">账号绑定</a>
                    <a href="{{ url('my/changepassword') }}" class="active">修改密码</a>
                    <a href="{{ url('my/addresses') }}">收货地址</a>
                </div>
            </div>

        </div>
        <div class="col-sm-8 col-md-12 main mainNew">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="address-text userInfoWrap">
            {{ Form::open(array('route' => 'changepassword.save', 'role' => 'form')) }}
                <div class="form-group">
                    <label for="current-password">当前密码<i>*</i>
                    </label>
                    <input type="password" name="current-password" class="form-control" id="curentPassword" placeholder="" required>
                </div>

                <div class="form-group">
                    <label for="new-password">新密码<i>*</i>
                    </label>
                    <input type="password" name="new-password" class="form-control" id="newPassword" placeholder="" required>
                </div>

                <div class="form-group">
                    <label for="new-password-confirm">重复新密码<i>*</i>
                    </label>
                    <input type="password" name="new-password-confirm" class="form-control" id="repeatPassword" placeholder="" required>
                </div>

                <button type="submit" class="btn btn-default address-btn submit-btn">保存</button>
            {{ Form::close() }}
            </div>


        </div>
    </div>
</div>
@stop