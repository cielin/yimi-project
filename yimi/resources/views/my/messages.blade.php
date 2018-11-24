@extends('layout')

@section('title', '我的订单')

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
                        <a href="{{ url('my/messages') }}" class="active">我的消息</a>
                        <!--<a href="{{ url('my/union') }}">账号绑定</a>-->
                        <a href="{{ url('my/changepassword') }}">修改密码</a>
                        <a href="{{ url('my/addresses') }}">收货地址</a>
                    </div>
                </div>

            </div>
            <div class="col-sm-8 col-md-9 col-xs-12 main mainNew">
                <div class="msg-box">
                    <!--一条消息 start-->
                    <div class="msg-item row">
                        <div class="col-md-3">
                            2018-02-19 19:44:00
                        </div>
                        <div class="col-md-9">
                            <h5>订单状态变化</h5>
                            <p>整体做工可以，没什么异味，上门安装的师傅也很迅速安装的很快，就是中间有个螺丝打偏了，联系客服给补件，也没有推脱，服务不错，顺便提点意见，补件第一次补错零件，然后补第二次，希望发货前检查一下</p>
                        </div>
                    </div>
                    <!--一条消息 end-->
                    <!--一条消息 start-->
                    <div class="msg-item row">
                        <div class="col-md-3">
                            2018-02-19 19:44:00
                        </div>
                        <div class="col-md-9">
                            <h5>订单状态变化</h5>
                            <p>整体做工可以，没什么异味，上门安装的师傅也很迅速安装的很快，就是中间有个螺丝打偏了，联系客服给补件，也没有推脱，服务不错，顺便提点意见，补件第一次补错零件，然后补第二次，希望发货前检查一下</p>
                        </div>
                    </div>
                    <!--一条消息 end-->
                </div>


            </div>
        </div>
    </div>
@stop
