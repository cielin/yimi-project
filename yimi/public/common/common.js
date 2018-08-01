
/*
*
* describe: config
*
*/
var version = "1.0.0";
var webInfo = "";


/*
*
* describe: 复写alert方法
* @param -> @msg: (type:string; des: 描述信息)
* @param -> @isSuccess:(type:boolean des: isSuccess 不传或传0 显示成功图标；传1显示失败图标；)
*
*/

window.alert = function (msg, isSuccess, callback) {
var dialogHTML = '<div class="modal fade">'
 + '<div class="modal-dialog">'
     +'<div class="modal-content">'
       
       + '<div class="modal-body">'
     + '</div>'
       
     + '</div>'
  + '</div>'
+'</div>';
	var tipImg = "";

	//!isSuccess ?  tipImg = IcoOk : tipImg = icoFalse;

    if ($('#selfAlert').length <= 0) {

        var elem = $(dialogHTML).get(0);//将html转为dom元素
        $(elem).attr("id","selfAlert");//$(elem) 将dom元素转为jquery元素
        $(elem).find(".modal-body").html('<span class= "msg">'+msg+'</span>');
        //$(elem).find(".modal-footer").html(BtnConfirm);
        $('body').append($(elem).clone()); 
    }
    $('#selfAlert').on('hidden.bs.modal', function () {
        $('#selfAlert').remove();
        if (typeof callback == 'function') {
            callback();
        }
    }).modal('show');
}






/*
*
* describe: 页面跳转
* @param -> @page: (type:string; des: 页面链接字符串)
*
*/
function jumpPage(page){
	if(window.location.href.split("p=")[1]!=page){
		window.location.href=webInfo+"/mvc/jump?p="+page;
	}
}


/*
*
* describe: 验证不能为空公共方法
*
*/
function emptyValidate(){
	var prompt = false;
	$.each($("input[required]"),function(index,item){
		if($(item).val().length == 0){
			alert($(item).attr("prompt")+"不能为空",1);
			prompt = false;
		}else{
			prompt = true;
		}
	});
	return prompt;
}


/*
*
* describe: 页面顶部注销
*
*/
function userOut(){

	ajax.postNoParam(webInfo+"/mvc/logout",function(){
		jumpPage("login/login");
	});

}

/*
*
* describe: 获取用户信息
*
*/

// function getUser(){
// 	if (geturl() == "login" || geturl() == "zhmm" || geturl(window.location.href.split("&")[0]) == "zhmm_cs"){
// 		return;
// 	}
// 	var dlr ="";
// 	ajax.postNoParam(webInfo+"/mvc/getUser",function(data){
// 		if(data.error=="nologin"){
//    			jumpPage("login/login");
//    		}else{
//    			setKey("ygh",data.result[0].YGH);
//    			setKey("name",data.result[0].XM);
//    			setKey("userid",data.result[0].USERID);
//    		}
//    		dlr = data;
// 	});

// 	return dlr;
// }





/*
*
* describe: 设置session公共方法
*
*/
function setKey(key,value){
	var text = "";
	var param = {
		"key":key,
		"value":encodeURI(value)
	};
	// ajax.post(webInfo+"/mvc/setKey",param,function(data){
	// 	text = data;
	// });
	return text;
}

/*
*
* describe: 获取session的公共方法
*
*/
function getKey(key){
	var text = "";
	var param = {
		"key":key
	};
	// ajax.post(webInfo+"/mvc/getKey",param,function(data){
	// 	text = decodeURI(data[key]);
	// });
	return text;
}


console.log("common外面");
$(function(){


//首页导航input框
  $(".search-input").mouseover(function() {
      $(this).animate({
        "width" : "245px",
        "height" : "34px"
      })
      //$(this).focus();
      $(this).css("background-color","rgba(46,46,45,.9)")
    }).focus(function(){
        //鼠标停留到焦点时 显示固定宽度
      $(this).css({"background-color":"rgba(46,46,45,.9)","width":"250px"});

    }).blur(function(){
      $(this).animate({
        "width" : "40px",
        "height" : "34px"
      })
      $(this).val("");
      $(this).css({"background-color":"rgba(46,46,45,.0)"});
    }).keyup(function(event){
      if(event.keyCode==13){
        $(this).val("");
        $(this).blur();
        $(this).css({"background-color":"rgba(46,46,45,.0)"});
      }
    }).mouseout(function(){
       $(this).animate({
        "width" : "40px",
        "height" : "34px"
      })
       $(this).val('');
      $(this).css({"background-color":"rgba(89,89,89,1)"});
      $(this).blur();
    });


    /*侧边栏*/
    // console.log(".wrapper-page.height",$(".wrapper-page").height());
    // var wrapperPageHeight = parseInt($(".wrapper-page").height())-502+"px";
    // var fwheight = 0-parseInt($(".wrapper-page").height())+502+"px";
    // $(".sidebar").css({"padding-bottom":wrapperPageHeight,"margin-bottom":fwheight});
    $(".side-sub").find("li").click(function(){
    	$(this).addClass("active");
    	$(this).siblings().removeClass("active");
    })

//***************设计师****************  
    $('.designer dl').mouseover(function(){
      $(this).children('dt').addClass('showEdate').stop(true)
    })
    $('.designer dl').mouseout(function(){
     $(this).children('dt').removeClass('showEdate')
    })

    
})