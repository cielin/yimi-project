@extends('layout')

@section('title', '订单详情')

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
                <i>&nbsp; / &nbsp;</i>
                个人中心
                <i>&nbsp; / &nbsp;</i>
                订单详情
            </div>
        </div>
        <!--面包屑-->
        <div class="row">
            <div class="col-sm-4 col-md-12 sidebarNewWrap">
                <div class="sidebar">
                    <div class="sidebar-title"><img src="{{ URL::asset('assets/img/userCenterTitle.jpg') }}" /></div>
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
            <div class="col-sm-8 col-md-12 mainNew">
                <!--start-->
                <div class="order-detail clearfix">

                    <div class="order-bord-bd">
                        <span class="pr20">
                            {{ $order->created_at }}
                        </span>
                        订单号:
                        <span class="gray-333">
                            {{ $order->order_code }}
                        </span>
                    </div>
                    <div class="order-detail-item clearfix">
                        <div class="col-md-5 order-bord-r">
                            @foreach ($order->items as $item)
                            <!--商品 start-->
                            <div class="order-goods">
                                <div class="col-md-6  det-img">
                                    <img src="{{ asset('public/images/products/' . $item->featured_image) }}">
                                </div>
                                <div class="col-md-6 showText">
                                    <!--展示文本 start-->
                                    {{ $item->name }}
                                </div>
                            </div>
                            <!--商品 end-->
                            @endforeach
                        </div>

                        <div class="col-md-7">
                            @if (sizeof($order->order_status_histories) == 0)
                            暂无信息
                            @else
                            <ul class="time-axis">
                                <?php $i_histories = 0; $count_histories = sizeof($order->order_status_histories); ?>
                                <?php $ORDER_STATUS_ENUM = array('pending_payment' => '等待付款', 'processing' => '处理中', 'pending_ship' => '等待发货', 'shipped' => '已发货', 'on_hold' => '已冻结', 'cancelled' => '已取消', 'completed' => '已完成'); ?>
                                @foreach ($order->order_status_histories as $history)
                                <li class="time-axis-item">
                                    <div class="time-axis-date">
                                        @if ($i_histories == $count_histories - 1)
                                        {{ date_format($history->created_at, 'Y年m月d日') }}<span></span>
                                        @else
                                        <span></span>{{ date_format($history->created_at, 'Y年m月d日') }}
                                        @endif
                                    </div>
                                    <div class="time-axis-title">{{ $ORDER_STATUS_ENUM[$history->state] }}</div>
                                </li>
                                <?php $i_histories = $i_histories + 1; ?>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
                <!--end -->
                <div class="order-detail-text clearfix">
                    <dl class="col-md-6">
                        <dt>收货信息</dt>
                        <dd class="row">
                            <span class="col-md-12">{{ $order->shipping_address }}</span>
                        </dd>
                    </dl>
                    <dl class="col-md-6">
                        <dt>配送信息</dt>
                        <dd class="row">
                            <span class="col-md-5">运费：</span>
                            <span class="col-md-7">免费</span>
                        </dd>
                        <dd class="row">
                            <span class="col-md-5">预计送达日期：</span>
                            <span class="col-md-7">@if ($order->shipped_at == "")无@else{{ $order->shipped_at }}@endif</span>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
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