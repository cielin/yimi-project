@extends('layout')

@section('title', '收货地址')

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
            <i>&nbsp; / &nbsp;</i> 收货地址
        </div>
    </div>
    <!--面包屑-->
    <div class="row">
        <div class="col-sm-4 col-md-3 sidebar">
            <div class="sidebar-title"><img src="{{ URL::asset('assets/img/userCenterTitle.jpg') }}" />
            </div>
            <div class="user-center-left">
                <a href="{{ url('my/info') }}">个人资料</a>
                <a href="{{ url('my/orders') }}">我的订单</a>
                <a href="{{ url('my/collections') }}">我的收藏</a>
                <a href="{{ url('my/comments') }}">我的评论</a>
                <a href="{{ url('my/messages') }}">我的消息</a>
                <a href="{{ url('my/union') }}">账号绑定</a>
                <a href="{{ url('my/password_reset') }}">修改密码</a>
                <a href="{{ url('my/addresses') }}" class="active">收货地址</a>
            </div>

        </div>
        <div class="col-sm-8 col-md-9 main">
            <div class="address-text">
                <form id="commentForm" method="post" action="">
                    <div class="form-group">
                        <label for="addressInfo" style="display: block;">地址信息<i>*</i>
                        </label>
                        <select name="province" id="province" class="citySelect" required>
                            <option value="请选择">请选择</option>
                        </select>
                        <select name="city" id="city" class="citySelect">
                            <option value="请选择">请选择</option>
                        </select>
                        <select name="town" id="town" class="citySelect">
                            <option value="请选择">请选择</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="adDetailInfo">详细地址<i>*</i>
                        </label>
                        <input type="text" name="adDetailInfo" class="form-control" id="adDetailInfo" placeholder="请输入详细地址" required>
                    </div>

                    <div class="form-group">
                        <label for="postalCode">邮政编码<i>*</i>
                        </label>
                        <input type="text" name="zipCode" class="form-control" id="postalCode" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="addressUserName">收货人姓名<i>*</i>
                        </label>
                        <input type="text" name="addressUserName" class="form-control" id="addressUserName" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="telPhone">手机号<i>*</i>
                        </label>
                        <input type="text" name="phone" class="form-control" id="telPhone" placeholder="" required>
                    </div>
                    <button type="submit" class="address-btn">保存</button>
                </form>
            </div>
            <div class="table-wrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>收货人</td>
                            <td>所在地区</td>
                            <td>详细地址</td>
                            <td>邮编</td>
                            <td>电话</td>
                            <td>操作</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@stop

@section('js')
<script src="{{ URL::asset('plugin/city.js') }}"></script>
<script src="{{ URL::asset('assets/js/address.js') }}"></script>
@stop

