
//***************商品列表****************  
$(function(){
  var checknum = 0
  $(".allAndNotAll").click(function() {
    checknum = $(this).parent().parent().find("input[class=magic-checkbox]").length;
    if (this.checked){  
        $(this).parent(".checkboxWrap").parent().find(".magic-checkbox:checkbox").each(function(){ 
              $(this).attr("checked", true);  
        });
    } else {   
        $(this).parent(".checkboxWrap").parent().find(".magic-checkbox:checkbox").each(function() {   
              $(this).attr("checked", false);  
        });
    }

  });

  //选中一行 

  $(".magic-checkbox:not(.allAndNotAll)").click(function () {
    checknum = $(this).parent().parent().find(".magic-checkbox").length-1
    var $checked = $(this).parent().parent().find(".magic-checkbox:checked")
      if ($(this).is(":checked") == true) {
        if($checked.length == checknum){
          $(this).parent().parent().find(".allAndNotAll").prop("checked",true);
        }else{
          $(this).parent().parent().find(".allAndNotAll").prop("checked",false);
        }
      }else {
        $(this).parent().parent().find(".allAndNotAll").prop("checked",false); 
      }
  });

})



