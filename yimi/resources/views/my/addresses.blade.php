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
        <div class="col-sm-3 col-md-3">
            <div class=" sidebar">
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
                    <a href="{{ url('my/password_reset') }}">修改密码</a>
                    <a href="{{ url('my/addresses') }}" class="active">收货地址</a>
                </div>
            </div>

        </div>
        <div class="col-sm-9 col-md-9 main">
            <div class="address-text">
                {{ Form::open(array('route' => 'addresses.save', 'id' => 'commentForm', 'role' => 'form')) }}
                    <div class="form-group" style="width:70%;">
                        <label for="addressInfo" style="display: block;">地址信息<i>*</i>
                        </label>
                        <select name="province" id="province" class="citySelect" required>
                            <option value="请选择">请选择</option>
                        </select>
                        <select name="city" id="city" class="citySelect">
                            <option value="请选择">请选择</option>
                        </select>
                        <select name="district" id="town" class="citySelect">
                            <option value="请选择">请选择</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="adDetailInfo">详细地址<i>*</i>
                        </label>
                        <input type="text" name="address" class="form-control" id="adDetailInfo" placeholder="请输入详细地址" required>
                    </div>

                    <div class="form-group">
                        <label for="postalCode">邮政编码<i>*</i>
                        </label>
                        <input type="text" name="postcode" class="form-control" id="postalCode" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="addressUserName">收货人姓名<i>*</i>
                        </label>
                        <input type="text" name="consignee" class="form-control" id="addressUserName" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="telPhone">手机号<i>*</i>
                        </label>
                        <input type="text" name="mobile" class="form-control" id="telPhone" placeholder="" required>
                    </div>
                    {{ Form::submit('保存', array('class' => 'address-btn')) }}
                {{ Form::close() }}
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
                    @if (isset($addresses) && sizeof($addresses) > 0)
                        @foreach ($addresses as $address)
                        <tr>
                            <th>{{ $address->consignee }}</th>
                            <td>{{ $address->province . " " . $address->city . " " . $address->district}}</td>
                            <td>{{ $address->address }}</td>
                            <td>{{ $address->postcode }}</td>
                            <td>{{ $address->mobile }}</td>
                            <td>
                                <a href="javascript:void(0);" class="btn btn-primary btn-sm addr-edit" role="button" data-id="{{ $address->id }}">编辑</a>
                                <a class="btn btn-danger btn-sm remove-record" href="javascript:void(0);" data-toggle="modal" data-url="{{ route('addresses.destroy', $address) }}" data-id="{{ $address->id }}" data-target="#custom-width-modal">删除</a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">暂无数据</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- Delete Model -->
<form action="" method="POST" class="remove-record-model">
    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
					<span class="modal-title" id="custom-width-modalLabel">删除记录</span>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>确认删除该条记录吗？</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default remove-data-from-delete-form" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-danger">删除</button>
                </div>
            </div>
        </div>
    </div>
</form>
@stop

@section('js')
<script type="text/javascript" src="{{ URL::asset('plugin/city.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/address.js') }}"></script>
<script>
	$(document).ready(function() {
		$('.remove-record').click(function() {
			var id = $(this).attr('data-id');
			var url = $(this).attr('data-url');
			var token = "{{ csrf_token() }}";
			$(".remove-record-model").attr("action",url);
			$('body').find('.remove-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
			$('body').find('.remove-record-model').append('<input name="_method" type="hidden" value="DELETE">');
			$('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
		});

		$('.remove-record-model').on('hide.bs.modal', function (event) {
			var modal = $(this);
			modal.find( "input" ).remove();
		});
	});
</script>
@stop

