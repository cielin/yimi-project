@extends('layout')

@section('title', '个人资料')

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
            <i>&nbsp; / &nbsp;</i> 个人资料
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
                    <a href="{{ url('my/info') }}" class="active">个人资料</a>
                    <a href="{{ url('my/orders') }}">我的订单</a>
                    <a href="{{ url('my/collections') }}">我的收藏</a>
                    <a href="{{ url('my/comments') }}">我的评论</a>
                    <a href="{{ url('my/messages') }}">我的消息</a>
                    <a href="{{ url('my/union') }}">账号绑定</a>
                    <a href="{{ url('my/changepassword') }}">修改密码</a>
                    <a href="{{ url('my/addresses') }}">收货地址</a>
                </div>
            </div>

        </div>
        <div class="col-sm-8 col-md-9 main">
            <div class="address-text userInfoWrap">
                {{ Form::open(array('route' => 'info.save', 'role' => 'form', 'id' => 'commentForm')) }}
                {{ Form::hidden('uid', $user->id) }}
                <div class="form-group">
                    <label for="userImg" style="display: block;">当前头像<i>*</i>
                    </label>
                    <div class="clearfix" style="margin-top: 20px;">
                        <div class="infoImg">
                            @if (isset($user->avatar) && $user->avatar !== "")
                            <img src="/public/thumbs/avatars/thumb_{{ $user->avatar }}" id="imgid">
                            @else
                            <img src="{{ URL::asset('assets/img/userNew.png') }}" id="imgid"><!--预览图片-->
                            @endif
                            <input type="hidden" name="avatar" id="img_avatar">
                        </div>
                        <div class="userImgWrap"  id="fileid"><!--图片上传按钮-->
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nickname">昵称</label>
                    <input type="text" class="form-control" id="nickname" placeholder="" name="nickname" value="{{ $user->nickname }}">
                </div>

                <div class="form-group">
                    <label for="email">电子邮箱<i>*</i>
                    </label>
                    <input type="email" class="form-control" id="email" placeholder="" name="email" required value="{{ $user->email }}" disabled="disabled">
                </div>
                <div class="form-group">
                    <label>性别<i>*</i>
                    </label>
                    <div class="gender">
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="1" @if ($user->sex == 1) checked="checked" @endif> 男
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="2" @if ($user->sex == 2) checked="checked" @endif> 女
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" value="0" @if ($user->sex == 0) checked="checked" @endif> 保密
                        </label>
                    </div>
                </div>
                <div class="form-group birthday">
                    <label style="display: block;">生日<i>*</i>
                    </label>
                    <input type="text" class="form-control myDay" name="birthday" placeholder="" data-date-format="yyyy-mm-dd" required value="{{ $user->birthday }}">
                    
                </div>
                <button type="submit" class="address-btn">保存</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script type="text/javascript" src="{{ URL::asset('assets/js/userinfo.js') }}"></script>
@stop