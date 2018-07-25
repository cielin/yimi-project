console.log("controller外面");
$(function(){
	console.log("controller");
	//分享
    $('#weixin').click(function(){
      $(this).next().show()
    })
    $('#weixin2').click(function(){
      // $(this).next().show()
      //console.log("sss");
      $(this).find(".weixin2").show();
    })
    $('.close1').click(function(){
      $(this).parent().hide();
    });

    $('.close2').click(function(){
      $('.weixin2').hide();
      console.log($(this).parent().hide())
    })


})
