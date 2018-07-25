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
			console.log("sdfdf");
			let $thisOrder = $(this).parent().parent().siblings(".discuss-order");
			$thisOrder.find(".showText").hide();
			$thisOrder.find(".showInput").show();
			submitText($thisOrder);

		})
	})
	
	function submitText($Order){
		let $orderBtn = $Order.find(".submitText");//提交按钮
		let $cancelBtn = $Order.find(".cancelText");
		let textarea = $Order.find("textarea");//表单文本
		let showTime = $Order.find(".time");//显示的时间
		let showText = $Order.find(".text");//显示的文本
		let showimgList = $Order.find(".discuss-img-list");
		let imgWrap = $Order.find(".img-wrap");
		let fileidImg = $Order.find(".fileidImg");
		let closeImg = $Order.find(".closeImg");
		var todayShowDate = new Date();
		let year = todayShowDate.getFullYear();
		let month = todayShowDate.getMonth()+1;
		let date = todayShowDate.getDate();
		let hours= todayShowDate.getHours();
        let minutes= todayShowDate.getMinutes();
        let seconds= todayShowDate.getSeconds();
		let today = year+"-" + month + "-" + date+" "+hours+":"+minutes+":"+seconds;
		closeImgBtn(closeImg);
		//调用公共方法
		uploadInit(fileidImg,imgWrap);

		$orderBtn.click(function(){
			//console.log("textarea",textarea.val().length);
			showTime.text(today);//显示时间
			$("input[name=time]").attr("value",today);
			if(textarea.val().length<10){
				alert("请输入最少10个字");
			}else if(textarea.val().length>500){
				alert("评价不超过500个字");
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
			$("input[name=imgList]").attr("value",srcListhtml);
			console.log("closeImgSrc",closeImgSrc);
			$("input[name=imgClose]").attr("value",closeImgSrc);
			$("#commentForm").submit();
			
		})
		$cancelBtn.click(function(){
			$Order.find(".showInput").hide();
			$Order.find(".showText").show();
		})
	}
	var closeImgSrc = [];
	function closeImgBtn(closeImg){
		$(closeImg).each(function(){
			$(this).click(function(){
				closeImgSrc.push($(this).parent().find("img").attr("src"));
				console.log("里面的closeImgSrc",closeImgSrc);
				$(this).parent().remove();
				return closeImgSrc;
			})
		})
		
	}

	function uploadInit(domName,domPic){
		var uploadurl = "http://php/api";//后台的api
		domName.Huploadify({
			auto:true,
			fileTypeExts:'*.*',
			multi:false,
			fileObjName:'Filedata',
			fileSizeLimit:99999999999,
			showUploadedPercent:false,
			buttonText:'',
			uploader:uploadurl,
			onUploadSuccess:function(file,data){
				var Data=JSON.parse(data);
				if(Data.success==true){
					 var html = '<div class="img-item">'
						+'<img src="'+Data.result+'">'
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