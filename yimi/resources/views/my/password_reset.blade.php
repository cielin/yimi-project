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
        <div class="col-sm-4 col-md-3 col-xs-12 sidebarNewWrap">
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
                    <!--<a href="{{ url('my/union') }}">账号绑定</a>-->
                    <a href="{{ url('my/password_reset') }}" class="active">修改密码</a>
                    <a href="{{ url('my/addresses') }}">收货地址</a>
                </div>
            </div>

        </div>
        <div class="col-sm-8 col-md-9 col-xs-12 main mainNew">
            <div class="address-text userInfoWrap">
                <div class="form-group">
                    <label for="curentPassword">当前密码<i>*</i>
                    </label>
                    <input type="text" name="curentPassword" class="form-control" id="curentPassword" placeholder="" required>
                </div>

                <div class="form-group">
                    <label for="newPassword">新密码<i>*</i>
                    </label>
                    <input type="text" name="newPassword" class="form-control" id="newPassword" placeholder="" required>
                </div>

                <div class="form-group">
                    <label for="repeatPassword">重复新密码<i>*</i>
                    </label>
                    <input type="text" name="repeatPassword" class="form-control" id="repeatPassword" placeholder="" required>
                </div>

                <button type="submit" class="btn btn-default address-btn submit-btn">保存</button>

            </div>


        </div>
    </div>
</div>
@stop
