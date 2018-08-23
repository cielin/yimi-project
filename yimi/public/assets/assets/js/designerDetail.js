$(function(){
	$("#littleImg").find("img").click(function(){
		
		var bigImgSrc = $(this).siblings("input").val();
		$("#bigImg").attr("src",bigImgSrc);

	})
})