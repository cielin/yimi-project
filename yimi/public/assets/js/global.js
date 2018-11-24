$(function() {
	// 获取屏幕宽度
	var allWidth = $(window).width();
	if(allWidth < 768) {
		$("#example-navbar-collapse").find("ul").removeClass("pull-right")
	} else {
		$("#example-navbar-collapse").find("ul").addClass("pull-right")
	}
	$("#lang").find("span").bind("click", function() {
		var id = $(this).attr("id");
		if(id == "english") {
			window.location.href = "index.html"
		} else {
			window.location.href = "ziinlifeCn/index.html"
		}
	});
	$("#overlayLang").find("span").bind("click", function() {
		var id = $(this).attr("id");
		if(id == "english") {
			window.location.href = "index.html"
		} else {
			window.location.href = "ziinlifeCn/index.html"
		}
	});
	// 导航 隐藏
	$("#navbar-toggle").bind("click", function() {
		$("#layout").fadeIn()
	})
	$("#overlay_menu_hide").bind("click", function() {
		$("#layout").fadeOut()
	})
})