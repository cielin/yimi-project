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
        <div class="col-md-3 col-sm-3 col-xm-3 sidebar">
            <div class="sidebar-title"><img src="{{ URL::asset('assets/img/userCenterTitle.jpg') }}" />
            </div>
            <div class="user-center-left">
                <a href="{{ url('my/info') }}">个人资料</a>
                <a href="{{ url('my/orders') }}">我的订单</a>
                <a href="{{ url('my/collections') }}" class="active">我的收藏</a>
                <a href="{{ url('my/comments') }}">我的评论</a>
                <a href="{{ url('my/messages') }}">我的消息</a>
                <a href="{{ url('my/union') }}">账号绑定</a>
                <a href="{{ url('my/password_reset') }}">修改密码</a>
                <a href="{{ url('my/addresses') }}">收货地址</a>
            </div>
        </div>
        <div class=" col-md-9 col-sm-8 col-xs-8  main">

            <div class="searchText">
                <a href="#" id="seachAllPro">所有商品</a>
                <a href="#" id="">已失效</a>

                <input type="text" class="form-control cllectionSearch" id="cllectionSearch" placeholder="请输入商品名">

            </div>
            <div class="designer buyer goods clearfix">
                <a href="goodsDetail.html">
                    <dl>
                        <dt>
                            <p class="ico-wrap">
                                <span class="glyphicon glyphicon-heart-empty"></span>
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </p>
                        </dt>
                        <dd>
                            <img src="../assets/img/picture/img04.jpg">
                        </dd>
                        <div class="buyer-text"><span>BAILEY SAILEN CHAI</span>
                        </div>
                    </dl>
                </a>
                <a href="#">
                    <dl>
                        <dt>
                            <p class="ico-wrap">
                                <span class="glyphicon glyphicon-heart-empty"></span>
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </p>
                        </dt>
                        <dd>
                            <img src="../assets/img/picture/img04.jpg">
                        </dd>
                        <div class="buyer-text"><span>BAILEY SAILEN CHAI</span>
                        </div>
                    </dl>
                </a>
                <a href="#">
                    <dl>
                        <dt>
                            <p class="ico-wrap">
                                <span class="glyphicon glyphicon-heart-empty"></span>
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </p>
                        </dt>
                        <dd>
                            <img src="../assets/img/picture/img04.jpg">
                        </dd>
                        <div class="buyer-text"><span>BAILEY SAILEN CHAI</span>
                        </div>
                    </dl>
                </a>
                <a href="#">
                    <dl>
                        <dt>
                            <p class="ico-wrap">
                                <span class="glyphicon glyphicon-heart-empty"></span>
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </p>
                        </dt>
                        <dd>
                            <img src="../assets/img/picture/img04.jpg">
                        </dd>
                        <div class="buyer-text"><span>BAILEY SAILEN CHAI</span>
                        </div>
                    </dl>
                </a>
                <a href="#">
                    <dl>
                        <dt>
                            <p class="ico-wrap">
                                <span class="glyphicon glyphicon-heart-empty"></span>
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </p>
                        </dt>
                        <dd>
                            <img src="../assets/img/picture/img04.jpg">
                        </dd>
                        <div class="buyer-text"><span>BAILEY SAILEN CHAI</span>
                        </div>
                    </dl>
                </a>
                <a href="#">
                    <dl>
                        <dt>
                            <p class="ico-wrap">
                                <span class="glyphicon glyphicon-heart-empty"></span>
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </p>
                        </dt>
                        <dd>
                            <img src="../assets/img/picture/img04.jpg">
                        </dd>
                        <div class="buyer-text"><span>BAILEY SAILEN CHAI</span>
                        </div>
                    </dl>
                </a>
                <a href="#">
                    <dl>
                        <dt>
                            <p class="ico-wrap">
                                <span class="glyphicon glyphicon-heart-empty"></span>
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </p>
                        </dt>
                        <dd>
                            <img src="../assets/img/picture/img04.jpg">
                        </dd>
                        <div class="buyer-text"><span>BAILEY SAILEN CHAI</span>
                        </div>
                    </dl>
                </a>
                <a href="#">
                    <dl>
                        <dt>
                            <p class="ico-wrap">
                                <span class="glyphicon glyphicon-heart-empty"></span>
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </p>
                        </dt>
                        <dd>
                            <img src="../assets/img/picture/img04.jpg">
                        </dd>
                        <div class="buyer-text"><span>BAILEY SAILEN CHAI</span>
                        </div>
                    </dl>

                </a>

            </div>
            <nav class="clearfix" aria-label="page navigation">
                <ul class="pagination">
                    <li class="previous">
                        <a href="#" aria-label="previous">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        </a>
                    </li>
                    <li class="active"><a href="#">1</a>
                    </li>
                    <li><a href="#">2</a>
                    </li>
                    <li><a href="#">3</a>
                    </li>
                    <li><a href="#">4</a>
                    </li>
                    <li><a href="#">5</a>
                    </li>
                    <li class="next">
                        <a href="#" aria-label="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@stop