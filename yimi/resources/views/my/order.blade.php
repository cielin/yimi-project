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
            <div class="col-sm-4 col-md-3 col-xs-12 sidebarNewWrap">
                <div class="sidebar">
                    <div class="sidebar-title">
                        <img src="{{ URL::asset('assets/img/userCenterTitle.jpg') }}" />
                    </div>
                    <div class="user-center-left">
                        <a href="{{ url('my/info') }}">个人资料</a>
                        <a href="{{ url('my/orders') }}" class="active">我的订单</a>
                        <a href="{{ url('my/collections') }}">我的收藏</a>
                        <a href="{{ url('my/comments') }}">我的评论</a>
                        <a href="{{ url('my/messages') }}">我的消息</a>
                        <a href="{{ url('my/union') }}">账号绑定</a>
                        <a href="{{ url('my/changepassword') }}">修改密码</a>
                        <a href="{{ url('my/addresses') }}">收货地址</a>
                    </div>
                </div>

            </div>
            <div class="col-sm-8 col-md-9 col-xs-12 main">
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
                <!--订单 start-->
                <div class="discuss-box">
                    <?php $ORDER_STATUS_ENUM = array('pending_payment' => '等待付款', 'processing' => '处理中', 'pending_ship' => '等待发货', 'shipped' => '已发货', 'on_hold' => '已冻结', 'cancelled' => '已取消', 'completed' => '已完成'); ?>
                    @if (isset($orders) && sizeof($orders) > 0)
                    @foreach ($orders as $order)
                    <div class="order-item">
                        <div class="order-title">
                            <span class="pr20">{{ $order->created_at }}</span>订单号：<span class="gray-333">{{ $order->order_code }}</span>
                        </div>
                        <table class="table">
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($order->items as $item)
                                <tr>
                                    <td class="order-img">
                                        <img src="{{ asset('public/images/products/' . $item->featured_image) }}" alt="{{ $item->name }}">
                                    </td>
                                    <td class="order-text">
                                        {{ $item->name }}
                                    </td>
                                    <td class="order-price">
                                        {{ $item->price }}
                                    </td>
                                    <td class="order-num">
                                        {{ $item->quantity }}
                                    </td> 
                                    <td class="order-total-price">
                                        @if ($i == 0)
                                        {{ $order->total_price }}
                                        @endif
                                    </td>
                                    <td class="order-option">
                                        @if ($i == 0)
                                        <div class="order-status">{{ $ORDER_STATUS_ENUM[$order->status] }}</div>
                                        <a href="{{ url('my/orders/' . $order->order_code) }}" class="order-detial">订单详情</a>
                                        @endif
                                        <a href="javascript:void(0)" class="evaluate">评价</a>
                                        <!--提交的表单 start-->
                                        <div class="orderEvaluate showInput clearfix">
                                            {{ Form::open(array('role' => 'form', 'class' => 'frm_order_review')) }}
                                            <div class="f-textarea">
                                                <textarea name="content" placeholder="分享体验心得，给万千想买的人一个参考~"></textarea>
                                                <div class="textarea-ext">
                                                    <em class="textarea-num">
                                                        <b>0</b> / 500
                                                    </em>
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
                                                <button class="btn btn-sm btn-default btn_order_submit">确定</button>
                                                <button class="btn btn-sm btn-default">取消</button>
                                            </div>
                                            {{ Form::close() }}
                                        </div>
                                        <!--提交的表单 end-->
                                    </td>
                                </tr>
                                <?php $i = $i + 1; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                    <nav class="clearfix" aria-label="page navigation">
                        <?php echo $orders->links(); ?>
                    </nav>
                    @else
                    <div class="no-data">暂无数据</div>
                    @endif
                    <!-- <div class="order-item">
                        <div class="order-title">
                            <span class="pr20">2018-03-09 9:00</span>订单号:<span class="gray-333">18323423</span>
                        </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="order-img">
                                        <img src="../assets/img/discussPro.png">
                                    </td>
                                    <td class="order-text">
                                        Baily sailen chair
                                        Baily sailen chair
                                        Baily sailen chair
                                        Baily sailen chair
                                    </td>
                                    <td class="order-price">
                                        ￥9000.00
                                    </td>
                                    <td class="order-num">
                                        1
                                    </td>
                                    <td class="order-total-price">
                                        $70000.89
                                    </td>
                                    <td class="order-option">
                                        <div class="order-status">已发货</div>
                                        <a href="#" class="order-detial">订单详情</a>
                                        <a href="#" class="check-logistics">查看物流</a>
                                        <a href="javascript:void(0)" class="evaluate">评价</a>
                                        <div class="orderEvaluate showInput clearfix">
                                            <div class="f-textarea">
                                                <textarea name="" id="" placeholder="分享体验心得，给万千想买的人一个参考~"></textarea>
                                                <div class="textarea-ext">
                                                    <em class="textarea-num">
                                                        <b>0</b> / 500
                                                    </em>
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
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                    <div class="order-item">
                        <div class="order-title">
                            <span class="pr20">2018-03-09 9:00</span>订单号:<span class="gray-333">18323423</span>
                        </div>
                        <table class="table table-btm-boder">
                            <thead>
                                <tr>
                                    <td colspan="6">
                                        <span class="pr20">2018-03-09 9:00</span>订单号:<span class="gray-333">18323423</span>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="order-img">
                                        <img src="../assets/img/discussPro.png">
                                    </td>
                                    <td class="order-text">
                                        Baily sailen chair
                                        Baily sailen chair
                                        Baily sailen chair
                                        Baily sailen chair
                                    </td>
                                    <td class="order-price">
                                        ￥9000.00
                                    </td>
                                    <td class="order-num">
                                        1
                                    </td>
                                    <td class="order-total-price">
                                        $70000.89
                                    </td>
                                    <td class="order-option">
                                        <div class="order-status">已发货</div>
                                        <a href="#" class="order-detial">订单详情</a>
                                        <a href="#" class="check-logistics">查看物流</a>
                                        <a href="javascript:void(0)" class="evaluate">评价</a>
                                        <div class="orderEvaluate showInput clearfix">
                                            <div class="f-textarea">
                                                <textarea name="" id="" placeholder="分享体验心得，给万千想买的人一个参考~"></textarea>
                                                <div class="textarea-ext">
                                                    <em class="textarea-num">
                                                        <b>0</b> / 500
                                                    </em>
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
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-img">
                                        <img src="../assets/img/discussPro.png">
                                    </td>
                                    <td class="order-text">
                                        Baily sailen chair
                                        Baily sailen chair
                                        Baily sailen chair
                                        Baily sailen chair
                                    </td>
                                    <td class="order-price">
                                        ￥9000.00
                                    </td>
                                    <td class="order-num">
                                        1
                                    </td>
                                    <td class="order-total-price">
                                        $70000.89
                                    </td>
                                    <td class="order-option">
                                        <div class="order-status">已发货</div>
                                        <a href="#" class="order-detial">订单详情</a>
                                        <a href="#" class="check-logistics">查看物流</a>
                                        <a href="javascript:void(0)" class="evaluate">评价</a>
                                        <div class="orderEvaluate showInput clearfix">
                                            <div class="f-textarea">
                                                <textarea name="" id="" placeholder="分享体验心得，给万千想买的人一个参考~"></textarea>
                                                <div class="textarea-ext">
                                                    <em class="textarea-num">
                                                        <b>0</b> / 500
                                                    </em>
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
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td colspan="6">
                                        <span class="pr20">2018-03-09 9:00</span>订单号:<span class="gray-333">18323423</span>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="order-img">
                                        <img src="../assets/img/discussPro.png">
                                    </td>
                                    <td class="order-text">
                                        Baily sailen chair
                                        Baily sailen chair
                                        Baily sailen chair
                                        Baily sailen chair
                                    </td>
                                    <td class="order-price">
                                        ￥9000.00
                                    </td>
                                    <td class="order-num">
                                        1
                                    </td>
                                    <td class="order-total-price">
                                        $70000.89
                                    </td>
                                    <td class="order-option">
                                        <div class="order-status">已发货</div>
                                        <a href="#" class="order-detial">订单详情</a>
                                        <a href="#" class="check-logistics">查看物流</a>
                                        <a href="javascript:void(0)" class="evaluate">评价</a>
                                        <div class="orderEvaluate showInput clearfix">
                                            <div class="f-textarea">
                                                <textarea name="" id="" placeholder="分享体验心得，给万千想买的人一个参考~"></textarea>
                                                <div class="textarea-ext">
                                                    <em class="textarea-num">
                                                        <b>0</b> / 500
                                                    </em>
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
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> -->
                    
                </div>
                <!--订单 end-->


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
<script type="text/javascript" src="{{ URL::asset('assets/js/order.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.btn_order_submit').on('click', function(e) {
            e.preventDefault();

            var form = $(this).parent().parent();
            $.ajax({
                type: 'post',
                url: '{{ route("orders.savecomment") }}',
                data: $(form).serialize(),
                cache: false,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                }
            })
        })
    })
</script>
@stop