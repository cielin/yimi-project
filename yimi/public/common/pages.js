/*
*
* describe: config
*
*/
//***************设计师****************  
$(function(){
  // $('.designer dl').mouseover(function(){
  //   $(this).children('dt').addClass('showEdate').stop(true)
  // })
  // $('.designer dl').mouseout(function(){
  //  $(this).children('dt').removeClass('showEdate')
  // })

  // // 分享
  // $('#weixin').click(function(){
  // 	$(this).next().show()
  // })
  // $('.close').click(function(){
  // 	$(this).parent().hide()
  // })
/*商品列表复选框全选*/
$(".allAndNotAll").click(function() {
    if (this.checked){  
        $(this).parent(".checkboxWrap").parent().find(".magic-checkbox:checkbox").each(function(){ 
              $(this).attr("checked", true);  
        });
    } else {   
        $(this).parent(".checkboxWrap").parent().find(".magic-checkbox:checkbox").each(function() {   
              $(this).attr("checked", false);  
        });
    }

})

})
