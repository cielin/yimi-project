var headerHtml = '<header class="clearfix">'
		+'<div class="logo col-md-3">logo</div>'
		+'<div class="col-md-5">'
			+'<div class="inputWrap">'
			+'<input type="" name="" class="form-control searchInput">'
			+'</div>'
			+'<nav>'
				+'<a href="">首页</a>'
				+'<a href="">商品</a>'
				+'<a href="">品牌专区</a>'
				+'<a href="">设计师</a>'
				+'<a href="">首页</a>'
				+'<a href=""  class="hui-eee">如何选购</a>'
				+'<a href=""  class="hui-eee">最新文章</a>'
			+'</nav>'
		+'</div>'
		+'<div class="col-md-3">'
			+'<button class="">登录</button>'
		+'</div>'
	+'</header>';

var leftbar = '<div class="leftbar box-show" id="leftbar"><ul>'
		+'<li><a class="active" href="javascript:void(0);">民主生活会</a></li>'
		+'<li><a href="javascript:void(0);">民主生活会</a></li>'
		+'<li><a href="javascript:void(0);">民主生活会</a></li>'
		+'<li><a href="javascript:void(0);">民主生活会</a></li>'
	+'</ul></div>';

var Table = '<table class="table"><thead><tr></tr></thead><tbody><tr></tr></tbody></table>';
var Page = '<ul class="table-page">'
		  +'<li><a id="upPage">&lt;上一页</a></li>'
    	  +'<li>第<input id="pageNum" type="text" value="0"/>页</li><li><a id="nextPage">下一页&gt;</a></li>'
    	  +'<li id="dataAll"></li>'
		  +'<li>每页<select id="pageSize">'
		  	+'<option>10</option><option>20</option><option>30</option><option>50</option></select>条'
		  +'</li></ul>';
var TipPage = '<ul class="table-page tip-page">'
				 +'<li><a id="upTipPage">&lt;上一页</a></li>'
				 +'<li>第<input id="pageTipNum" type="text" value="1">页</li>'
				 +'<li><a id="nextTipPage">下一页&gt;</a></li>'
				 +'<li id="dataTipAll">共 <span data-all="0">1</span> 页</li>'
			 +'</ul>';
var Download = '<div class="clearfix">'
			+'<h3>所有附件<span>10</span></h3>'
        	+'<p><span ><a>删除</a>|</span><a id="selectDownBtn">下载选中文件</a>|<a id="downAllBtn">全部下载</a></p>'
        	+'<ul class="downlist clearfix"></ul>'
        	+'</div>';
var Upload = '<div class="upload"></div>';
var LiNoData = '<li class="no-data">暂无数据</li>';

var dialogHTML = '<div class="modal fade">'
 + '<div class="modal-dialog">'
     +'<div class="modal-content">'
	     + '<div class="modal-header">'
		     + '<button type="button" class="close icon i-remove" data-dismiss="modal" aria-label="Close"></button>'
	     + '</div>'
	     + '<div class="modal-body">'
		 + '</div>'
	     + '<div class="modal-footer">'
	     + '</div>'
     + '</div>'
  + '</div>'
+'</div>';

var modalForm = '<form class="form-inline">'
	        +'<div class="form-group">'
	          +'<label for="name">姓名</label>'
	          +'<input type="text" class="form-control myInput" value="" id="name" placeholder="请输入姓名">'
	        +'</div>'
	        +'<div class="form-group">'
	          +'<label for="useId">员工号</label>'
	          +'<input type="text" class="form-control myInput" value="" id="useId" placeholder="请输入员工号">'
	        +'</div>'
	        +'<button id="seachBtn" type="button" class="btn btn-default myOkBtn">查询</button>'
		   +'</form>';
		   
var formHtml = "<form style='display:none' target='' method='post' action='' target='_self'>"+
						"<input type='hidden' name='id' value=''/></form>";

var Msg = '<div class="msg"><img src=""></div>';

var BtnConfirm = '<button type="button" class="btn-confirm" data-dismiss="modal">确定</button>';
var BtnCancel ='<button type="button" class="btn-cancel" data-dismiss="modal">Close</button>';
var BtnReturnHome = '<button id="jBtnReHome" type="button" class="btn-return-home btn-confirm" data-dismiss="modal">快速登录</button>';
var AReturnHome = '<a id="jAReHome" class="a-return-home" href="javascript:void(0);">返回首页</a>';

var IcoOk = '<i class="icon i-ok"></i>';
var icoFalse = '<i class="icon i-remove-sign-crude"></i>';
var suspension ='<div class="suspension">'
	+'<div class="suspension-box">'
		+'<a href="javascript:;" class="a a-top"><i class="i"></i></a>'
		+'<a href="javascript:;" class="a a-service-phone "><i class="i"></i></a>'
		+'<a href="#" class="a a-service "><i class="i"></i></a>'
		+'<a href="javascript:;" class="a a-qrcode"><i class="i"></i></a>'
		
		+'<div class="d d-service">'
			+'<i class="arrow"></i>'
			+'<div class="inner-box">'
				+'<div class="d-service-item clearfix">'
					+'<a target="_blank" href="http://wpa.qq.com/msgrd?v=1&uin=QQ号码&site=qq&menu=yes" class="clearfix"><span class="circle"><i class="i-qq"></i></span><h3>咨询在线客服</h3></a>'
				+'</div>'
			+'</div>'
		+'</div>'
		+'<div class="d d-service-phone">'
			+'<i class="arrow"></i>'
			+'<div class="inner-box">'
				+'<div class="d-service-item clearfix">'
					+'<span class="circle"><i class="i-tel"></i></span>'
					+'<div class="text">'
						+'<p>服务热线</p>'
						+'<p class="number">4001-123-456</p>'
					+'</div>'
				+'</div>'
				
			+'</div>'
		+'</div>'
		+'<div class="d d-qrcode">'
			+'<i class="arrow"></i>'
			+'<div class="inner-box">'
				+'<p>扫描二维码</p>'
				+'<div class="qrcode-img"><img src="../assets/img/side_ewm.jpg" alt=""></div>'
				
			+'</div>'
		+'</div>'

	+'</div>'
+'</div>';


/*
*
* describe: 获取当前url
* author: wxl
*
*/

function geturl(url){
	var myUrl = url;
	if(url == undefined){
		myUrl = window.location.href;
	}
	var urlname= myUrl.substring(myUrl.lastIndexOf("/")+1,myUrl.length);
	return urlname;
}

/*
*
* describe: 判断注册，登录，修改密码不加载头部 侧边栏
* author: wxl
*
*/

//头部
//document.write(headerHtml);
//在线咨询
document.write(suspension);


