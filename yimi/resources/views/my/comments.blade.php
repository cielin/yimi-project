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
            <div class="col-sm-4 col-md-3 col-xs-3 sidebarWrap">
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
                        <!--<a href="{{ url('my/union') }}">账号绑定</a>-->
                        <a href="{{ url('my/changepassword') }}">修改密码</a>
                        <a href="{{ url('my/addresses') }}">收货地址</a>
                    </div>
                </div>

            </div>
            <div class="col-sm-8 col-md-9 col-xs-9 main">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="discuss-box">
                    @if (isset($reviews) && sizeof($reviews) > 0)
                    @foreach ($reviews as $review)
                    <div class="row discuss-item">
                        <div class="order-code">
                            <p>订单号：<a href="/my/orders/{{ $review->order->order_code }}">{{ $review->order->order_code }}</a>
                            </p>
                            <p class="option">
                                <span class="modifyBtn">修改</span>
                                <span class="del" data-id="2">删除</span>
                            </p>
                        </div>
                        <div class="discuss-order clearfix">
                            <div class="col-md-3">
                                <div class="pro-img">
                                    <img src="{{ asset('public/images/products/' . $review->product->featured_image) }}">
                                </div>
                                <div class="pro-text">
                                    <a href="{{ url('/products/' . $review->product->slug) }}">{{ $review->product->name }}</a>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <!--展示文本 start-->
                                <div class="showText">
                                    <p class="time">{{ $review->created_at }}</p>
                                    <p class="text">{{ $review->content }}</p>
                                    @if ($review->images !== "" && $review->images !== null)
                                    <ul class="discuss-img-list clearfix">
                                        <?php $rimgs = explode(",", $review->images); ?>
                                        @foreach ($rimgs as $rimg)
                                        <li>
                                            <img src="{{ asset('public/images/comments/' . $rimg) }}">
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </div>
                                <!--展示文本 end-->
                                <!--提交的表单 start-->
                                <div class="showInput clearfix">
                                    {{ Form::open(array('route' => 'orders.savecomment', 'role' => 'form', 'class' => 'frm_order_review')) }}
                                    {{ Form::hidden('review_id', $review->id )}}
                                    {{ Form::hidden('customer_id', Auth::user()->id) }}
                                    {{ Form::hidden('product_name', $review->product->name) }}
                                    {{ Form::hidden('images', $review->images) }}
                                    <div class="f-textarea">
                                        <textarea name="content">{{ $review->content }}</textarea>
                                        <div class="textarea-ext">
                                            <em class="textarea-num">
                                                <b>{{ mb_strlen($review->content) }}</b> / 500
                                            </em>
                                        </div>
                                    </div>
                                    <div class="upload-img-wrap">
                                        <div class="img-wrap">
                                            @if ($review->images !== "" && $review->images !== null)
                                            <?php $rimgs = explode(",", $review->images); ?>
                                            @foreach ($rimgs as $rimg)
                                            <div class="img-item">
                                                <img src="{{ asset('public/thumbs/comments/thumb_' . $rimg) }}">
                                                <i class="closeImg"></i>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="fileidImg">
                                            <i class="icon iconfont icon-xiangji"></i>
                                            <span>上传照片</span>
                                        </div>
                                    </div>
                                    <div class="btns">
                                        <button class="btn_comment_submit submitText">确定</button>
                                        <button class="btn_comment_cancel cancelText">取消</button>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                                <!--提交的表单 end-->
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <nav class="clearfix" aria-label="page navigation">
                        <?php echo $reviews->links(); ?>
                    </nav>
                    @else
                    <div class="no-data">暂无数据</div>
                    @endif
                </div>
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
<!-- <script type="text/javascript" src="{{ URL::asset('assets/js/discuss.js') }}"></script> -->
<script>
$(function(){
	$(".del").each(function(){
		$(this).click(function(){
			$(this).parent().parent().parent(".discuss-item").remove();
			var id = $(this).attr("data-id");
			$("input[name=delDiscussItem]").attr("value",id);
			//$("#delDiscuss").submit();
		})
		
	})

	$(".modifyBtn").each(function(){
		$(this).click(function(){
			let $thisOrder = $(this).parent().parent().siblings(".discuss-order");
			$thisOrder.find(".showText").hide();
			$thisOrder.find(".showInput").show();
			submitText($thisOrder);
		})
	})
	
	function submitText($Order){
		let $orderBtn = $Order.find(".btn_comment_submit");//提交按钮
		let $cancelBtn = $Order.find(".btn_comment_cancel");
		let textarea = $Order.find("textarea");//表单文本
		let showTime = $Order.find(".time");//显示的时间
		let showText = $Order.find(".text");//显示的文本
		let showimgList = $Order.find(".discuss-img-list");
		let imgWrap = $Order.find(".img-wrap");
		let fileidImg = $Order.find(".fileidImg");
        let closeImg = $Order.find(".closeImg");
        let commentForm = $Order.find("form");
        let frmImages = $Order.find("input[name=images]");
		
		//调用公共方法
		uploadInit(fileidImg,imgWrap);

		$orderBtn.click(function(e){
            e.preventDefault();
			if(textarea.val().length<10){
                alert("请输入最少10个字");
                return;
			}else if(textarea.val().length>500){
                alert("评价不超过500个字");
                return;
			}else{
				showText.text(textarea.val());//显示文本;
				$("input[name=text]").attr("value",textarea.val());
			}
			var srchtml = "";
			var srcListhtml = [];
			$.each(imgWrap.find(".img-item"),function(index,item){
				let thisSrc = $(item).find("img").attr("src");
				srchtml+='<li><img src="'+thisSrc+'"></li>';
				srcListhtml.push(thisSrc);
			})
			showimgList.html(srchtml);
			$(frmImages).attr("value",srcListhtml);
			$(commentForm).submit();
		})
		$cancelBtn.click(function(e){
            e.preventDefault();
			$Order.find(".showInput").hide();
			$Order.find(".showText").show();
		})
	}

    $(document).on('click', '.closeImg', function(){
        $(this).parent().remove();
    })

	function uploadInit(domName,domPic){
		var uploadurl = "/api/upload_comment_image";//后台的api
		domName.Huploadify({
			auto:true,
			fileTypeExts:'*.*',
			multi:false,
			fileObjName:'cpimg',
			fileSizeLimit:99999999999,
			showUploadedPercent:false,
			buttonText:'',
            uploader:uploadurl,
            @if (Auth::check())
            token:"{{ Auth::user()->api_token }}",
            @endif
			onUploadSuccess:function(file,data){
				var Data=JSON.parse(data);
				if(Data.errcode == 0){
					 var html = '<div class="img-item">'
						+'<img src="/public/thumbs/comments/thumb_' + Data.path+'">'
						+'<i class="closeImg"></i>'
					    +'</div>';
						domPic.append(html);
					}else{
					 jQuery.longhz.alert(Data.resultDes);

					}
			},
			onUploadError:function(file,response){
				alert("上传失败!");
			}
		});
	}
})
</script>
@stop
