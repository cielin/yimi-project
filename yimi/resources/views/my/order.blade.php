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
                <i>&nbsp; / &nbsp;</i> 我的订单
            </div>
        </div>
        <!--面包屑-->
        <div class="row">
            <div class="col-sm-4 col-md-3 sidebar">
                <div class="sidebar-title"><img src="{{ URL::asset('assets/img/userCenterTitle.jpg') }}" />
                </div>
                <div class="user-center-left">
                    <a href="{{ url('my/info') }}">个人资料</a>
                    <a href="{{ url('my/orders') }}" class="active">我的订单</a>
                    <a href="{{ url('my/collections') }}">我的收藏</a>
                    <a href="{{ url('my/comments') }}">我的评论</a>
                    <a href="{{ url('my/messages') }}">我的消息</a>
                    <a href="{{ url('my/union') }}">账号绑定</a>
                    <a href="{{ url('my/password_reset') }}">修改密码</a>
                    <a href="{{ url('my/addresses') }}">收货地址</a>
                </div>

            </div>
            <div class="col-sm-8 col-md-9 main">
                <div class="searchText">
                    <div class="order-menu col-md-6">
                        <a href="#" class="active">所有订单</a>
                        <a href="#">待付款</a>
                        <a href="#">待发货</a>
                        <a href="#">待收货</a>
                        <a href="#">待评价</a>
                    </div>

                    <input type="text" class="form-control cllectionSearch" id="cllectionSearch" placeholder="请输入商品名">
                </div>
                <div class="discuss-box">
                    <!--订单 start-->
                    <div class="row">
                        <div class="order-code">
                            <p><span class="pr20">2018-03-09 9:00</span>订单号:<span class="gray-333">18323423</span>
                            </p>

                        </div>
                        <div class="discuss-order clearfix order-pt10">
                            <div class="clearfix order-layout">
                                <div class="col-md-9  order-bord-r pt20">
                                    <div class="order-goods">
                                        <div class="col-md-4">
                                            <div class="pro-img">
                                                <img src="{{ URL::asset('assets/img/discussPro.png') }}">
                                            </div>

                                        </div>
                                        <div class="col-md-5">
                                            <!--展示文本 start-->
                                            <div class="showText">
                                                <p class="text">
                                                    Baily sailen chair
                                                </p>

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            ￥9000.00
                                        </div>
                                        <div class="col-md-1">
                                            1
                                        </div>
                                    </div>

                                    <!--展示文本 end-->
                                </div>

                                <div class="col-md-3  pt20">
                                    <div class="col-md-7">
                                        $70000.89
                                    </div>
                                    <div class="col-md-5 order-r-menu">
                                        <span>已发货</span>
                                        <a href="#">订单详情</a>
                                        <a href="#">查看物流</a>
                                        <a href="javascript:void(0)" class="evaluate">评价</a>
                                        <!--提交的表单 start-->
                                        <div class="orderEvaluate showInput clearfix">

                                            <div class="f-textarea">
                                                <textarea name="" id="" placeholder="分享体验心得，给万千想买的人一个参考~"></textarea>
                                                <div class="textarea-ext">
                                                    <em class="textarea-num">
<b>0</b> / 500
</em>
                                                    <span class="tips">
（更多评价）
</span>
                                                </div>
                                            </div>
                                            <div class="upload-img-wrap">
                                                <div class="img-wrap">
                                                    <div class="img-item">
                                                        <img src="../assets/img/dd-2.jpg">
                                                        <i class="closeImg"></i>
                                                    </div>
                                                    <div class="img-item">
                                                        <img src="../assets/img/dd-2.jpg">
                                                        <i class="closeImg"></i>
                                                    </div>
                                                </div>
                                                <div class="fileidImg">
                                                    <i class="icon iconfont icon-xiangji"></i>
                                                    <span class="fileText">上传照片</span>
                                                </div>
                                            </div>
                                            <div class="btns">
                                                <button type="submit" class="submitText">确定</button>
                                                <button class="cancelText">取消</button>
                                            </div>

                                        </div>
                                        <!--提交的表单 end-->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="order-code">
                            <p><span class="pr20">2018-03-09 9:00</span>订单号:<span class="gray-333">18323423</span>
                            </p>

                        </div>
                        <div class="discuss-order clearfix order-pt10">
                            <div class="clearfix order-layout">
                                <div class="order-bord-bd">
                                    <span class="pr20">2018-03-09 9:00</span>订单号:<span class="gray-333">18323423</span>
                                </div>
                                <div class="col-md-9  order-bord-r pt20">
                                    <div class="order-goods">
                                        <div class="col-md-4">
                                            <div class="pro-img">
                                                <img src="../assets/img/discussPro.png">
                                            </div>

                                        </div>
                                        <div class="col-md-5">
                                            <!--展示文本 start-->
                                            <div class="showText">
                                                <p class="text">
                                                    Baily sailen chair
                                                </p>

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            ￥9000.00
                                        </div>
                                        <div class="col-md-1">
                                            1
                                        </div>
                                    </div>
                                    <div class="order-goods">
                                        <div class="col-md-4">
                                            <div class="pro-img">
                                                <img src="../assets/img/discussPro.png">
                                            </div>

                                        </div>
                                        <div class="col-md-5">
                                            <!--展示文本 start-->
                                            <div class="showText">
                                                <p class="text">
                                                    Baily sailen chair
                                                </p>

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            ￥9000.00
                                        </div>
                                        <div class="col-md-1">
                                            1
                                        </div>
                                    </div>
                                    <!--展示文本 end-->
                                </div>

                                <div class="col-md-3  pt20">
                                    <div class="col-md-7">
                                        $70000.89
                                    </div>
                                    <div class="col-md-5 order-r-menu">
                                        <span>已发货</span>
                                        <a href="#">订单详情</a>
                                        <a href="#">查看物流</a>

                                    </div>
                                </div>
                            </div>
                            <div class="clearfix order-bord-bm-hui order-layout">
                                <div class="order-bord-bd">
                                    <span class="pr20">2018-03-09 9:00</span>订单号:<span class="gray-333">18323423</span>
                                </div>
                                <div class="col-md-9  order-bord-r pt20">
                                    <div class="order-goods">
                                        <div class="col-md-4">
                                            <div class="pro-img">
                                                <img src="../assets/img/discussPro.png">
                                            </div>

                                        </div>
                                        <div class="col-md-5">
                                            <!--展示文本 start-->
                                            <div class="showText">
                                                <p class="text">
                                                    Baily sailen chair
                                                </p>

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            ￥9000.00
                                        </div>
                                        <div class="col-md-1">
                                            1
                                        </div>
                                    </div>
                                    <div class="order-goods">
                                        <div class="col-md-4">
                                            <div class="pro-img">
                                                <img src="../assets/img/discussPro.png">
                                            </div>

                                        </div>
                                        <div class="col-md-5">
                                            <!--展示文本 start-->
                                            <div class="showText">
                                                <p class="text">
                                                    Baily sailen chair
                                                </p>

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            ￥9000.00
                                        </div>
                                        <div class="col-md-1">
                                            1
                                        </div>
                                    </div>
                                    <!--展示文本 end-->
                                </div>

                                <div class="col-md-3  pt20">
                                    <div class="col-md-7">
                                        $70000.89
                                    </div>
                                    <div class="col-md-5 order-r-menu">
                                        <a href="#">已发货</a>
                                        <a href="#">订单详情</a>
                                        <a href="#">查看物流</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--订单 end-->


                </div>


            </div>
        </div>
        <!--评论表单提交 start-->
        <form id="commentForm" method="post" action="" style="display: none">
            <input name="time" value="">
            <input name="text" value="">
            <input name="imgList" value="">
            <input name="imgClose" value="">
        </form>
        <!--评论表单提交 end-->
        <!--删除评论 start-->
        <form id="delDiscuss" method="post" action="" style="display: none">
            <input name="delDiscussItem" value="">
        </form>
        <!--删除评论 end-->
    </div>
    <script type="text/javascript" src="{{ URL::asset('plugin/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/order.js') }}"></script>
@stop