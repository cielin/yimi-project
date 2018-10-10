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

function uploadInit(domName,domPic,domForm){
	var uploadurl = "/api/upload_image";//后台的api
	$("#"+domName).Huploadify({
		auto:true,
		fileTypeExts:'*.jpg;*.png;*.jpeg',
		multi:false,
		fileObjName:'avatar',
		fileSizeLimit:99999999999,
		showUploadedPercent:false,
		buttonText:'修改头像',
		uploader:uploadurl,
		onUploadSuccess: function (file, data, response){
			var Data = JSON.parse(data);
			if (Data.errcode == 0){
				$("#" + domPic).attr("src", "/public/thumbs/avatars/thumb_" + Data.path);
				$("#" + domForm).val(Data.path);
				param.uploadsuccess(Data.path);
			} else{
				jQuery.longhz.alert(Data.message);
			}
		},
		onUploadError:function(file,response){
			alert("上传失败!");
		}
	});
	
}

	//调用公共方法
	uploadInit("fileid","imgid","img_avatar");

	defalutDate();
})