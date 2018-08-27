
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

/*
       * 模拟下拉列表select 开始
       */
      function selectModel(){
          var $boxi = $('div.model-select-box i');
          var $box = $('div.model-select-box');
          var $option = $('ul.model-select-option', $box);
          var $txt = $('div.model-select-text', $box, $boxi);
          var speed = 10;
          /*
           * 单击某个下拉列表时，显示当前下拉列表的下拉列表框
           * 并隐藏页面中其他下拉列表
           */
          $txt.click(function(e) {
                  $option.not($(this).siblings('ul.model-select-option')).slideUp(speed, function(){
                      int($(this));
                  });
                  $(this).siblings('ul.model-select-option').slideToggle(speed, function(){
                      int($(this));
                  });
                  return false;
              });
          //点击选择，关闭其他下拉
          /*
           * 为每个下拉列表框中的选项设置默认选中标识 data-selected
           * 点击下拉列表框中的选项时，将选项的 data-option 属性的属性值赋给下拉列表的 data-value 属性，并改变默认选中标识 data-selected
           * 为选项添加 mouseover 事件
           */
          $option.find('li').each(function(index, element) {
                  if($(this).hasClass('seleced')){
                      $(this).addClass('data-selected');
                  }
              })
              .mousedown(function(){
                  $(this).parent().siblings('div.model-select-text').text($(this).text())
                      .attr('data-value', $(this).attr('data-option'));
                  
                  $option.slideUp(speed, function(){
                      int($(this));
                  });
                  $(this).addClass('seleced data-selected').siblings('li').removeClass('seleced data-selected');
                  return false;
              })
              .mouseover(function(){
                  $(this).addClass('seleced').siblings('li').removeClass('seleced');
              });
          //点击文档，隐藏所有下拉
          $(document).click(function(e) {
              $option.slideUp(speed, function(){
                  int($(this));
              });
          });
          //初始化默认选择
          function int(obj){
              obj.find('li.data-selected').addClass('seleced').siblings('li').removeClass('seleced');
          }
      }

      selectModel();
 /**自定义select end***/


})