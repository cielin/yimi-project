$(function(){
	function defalutDate(){

		var todayShowDate = new Date();
	    todayShowDate.setTime(todayShowDate.getTime());
	    var afterShowDate = new Date();
	    afterShowDate.setTime(afterShowDate.getTime()+24*60*60*1000);
	    var today = todayShowDate.getFullYear()+"-" + (todayShowDate.getMonth()+1) + "-" + todayShowDate.getDate();
	    var afterDay = F.afterDate(today);
	    var todayOption = {
	        language:'zh-CN',
	        weekStart: 1,
	        todayBtn:  1,
	        autoclose: 1,
	        todayHighlight: 1,
	        startView: 2,
	        forceParse: 0,
	        showMeridian: 1,
	        startDate: today,
	        minView: "month", //选择日期后，不会再跳转去选择时分秒
	    }

	     //日期控件
	    // $('.myYear').datetimepicker(yearOption);
	    // $('.myMonth').datetimepicker(monthOption);
	    $('.myDay').datetimepicker(todayOption);

	}

function uploadInit(domName,domPic){
	var uploadurl = "http://php/api";//后台的api
	$("#"+domName).Huploadify({
		auto:true,
		fileTypeExts:'*.*',
		multi:false,
		fileObjName:'Filedata',
		fileSizeLimit:99999999999,
		showUploadedPercent:false,
		buttonText:'修改头像',
		uploader:uploadurl,
		onUploadSuccess:function(file,data){
			var Data=JSON.parse(data);
			if(Data.success==true){
				 $("#"+domPic).attr("src",Data.result);
					param.uploadsuccess(Data.result);
				}else{
				 jQuery.longhz.alert(Data.resultDes);
				}
		},
		onUploadError:function(file,response){
			alert("上传失败!");
		}
	});
	
}

	//调用公共方法
	uploadInit("fileid","imgid")

	defalutDate();
})