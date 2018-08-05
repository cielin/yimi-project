
//***************商品列表****************  
$(function(){
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
