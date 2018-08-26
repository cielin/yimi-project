@extends('layout')

@section('title', '我的评论')

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
                <i>&nbsp; / &nbsp;</i> 我的评论
            </div>
        </div>
        <!--面包屑-->
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <div class="sidebar">
                    <div class="sidebar-title">
                        <img src="../assets/img/userCenterTitle.jpg" />
                    </div>
                    <div class="user-center-left">
                        <a href="{{ url('my/info') }}">个人资料</a>
                        <a href="{{ url('my/orders') }}">我的订单</a>
                        <a href="{{ url('my/collections') }}">我的收藏</a>
                        <a href="{{ url('my/comments') }}" class="active">我的评论</a>
                        <a href="{{ url('my/messages') }}">我的消息</a>
                        <a href="{{ url('my/union') }}">账号绑定</a>
                        <a href="{{ url('my/password_reset') }}">修改密码</a>
                        <a href="{{ url('my/addresses') }}">收货地址</a>
                    </div>
                </div>

            </div>
            <div class="col-sm-8 col-md-9 main">
                <div class="discuss-box">
                    <!--一条评论 start-->
                    <div class="row discuss-item">
                        <div class="order-code">
                            <p>订单号:<span>18323423</span>
                            </p>
                            <p class="option">
                                <span class="modifyBtn">修改</span>
                                <span class="del" data-id="2">删除</span>
                            </p>
                        </div>
                        <div class="discuss-order clearfix">
                            <div class="col-md-3">
                                <div class="pro-img">
                                    <img src="../assets/img/discussPro.png">
                                </div>
                                <div class="pro-text">
                                    Baily sailen chair
                                </div>
                            </div>
                            <div class="col-md-9">
                                <!--展示文本 start-->
                                <div class="showText">
                                    <p class="time">2018-02-18 20:20:00</p>
                                    <p class="text">整体做工可以，没什么异味，上门安装的师傅也很迅速安装的很快，就是中间有个螺丝打偏了，联系客服给补件，也没有推脱，服务不错，顺便提点意见，补件第一次补错零件，然后补第二次，希望发货前检查一下</p>
                                    <ul class="discuss-img-list clearfix">
                                        <li><img src="../assets/img/dd-04.jpg">
                                        </li>
                                        <li><img src="../assets/img/dd-04.jpg">
                                        </li>
                                    </ul>
                                </div>
                                <!--展示文本 end-->
                                <!--提交的表单 start-->
                                <div class="showInput clearfix">

                                    <div class="f-textarea">
                                        <textarea name="" id="" placeholder="分享体验心得，给万千想买的人一个参考~"></textarea>
                                        <div class="textarea-ext">
                                            <em class="textarea-num">
<b>0</b> / 500
</em>
                                            <!-- <span class="tips">
（更多评价）
</span> -->
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
                                            <span>上传照片</span>
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
                    <!--一条评论 end-->
                    <!--一条评论 start-->
                    <div class="row discuss-item">
                        <div class="order-code">
                            <p>订单号:<span>18323423</span>
                            </p>
                            <p class="option">
                                <span class="modifyBtn">修改</span>
                                <span class="del" data-id="1">删除</span>
                            </p>
                        </div>
                        <div class="discuss-order clearfix">
                            <div class="col-md-3">
                                <div class="pro-img">
                                    <img src="../assets/img/discussPro.png">
                                </div>
                                <div class="pro-text">
                                    Baily sailen chair
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="showText">
                                    <p class="time">2018-02-18 20:20:00</p>
                                    <p class="text">整体做工可以，没什么异味，上门安装的师傅也很迅速安装的很快，就是中间有个螺丝打偏了，联系客服给补件，也没有推脱，服务不错，顺便提点意见，补件第一次补错零件，然后补第二次，希望发货前检查一下</p>
                                    <ul class="discuss-img-list clearfix">
                                        <li><img src="../assets/img/dd-04.jpg">
                                        </li>
                                        <li><img src="../assets/img/dd-04.jpg">
                                        </li>
                                    </ul>
                                </div>
                                <!--提交的表单 start-->
                                <div class="showInput clearfix">

                                    <div class="f-textarea">
                                        <textarea name="" id="" placeholder="分享体验心得，给万千想买的人一个参考~"></textarea>
                                        <div class="textarea-ext">
                                            <em class="textarea-num">
<b>0</b> / 500
</em>
                                            <span class="tips">
（请输入超过10个字的评价）
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
                                            <span>上传照片</span>
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
                <!--一条评论 end-->

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
@stop

@section('js')
<script type="text/javascript" src="{{ URL::asset('assets/js/discuss.js') }}"></script>
@stop