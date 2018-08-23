console.log("controller外面");
$(function(){
  console.log("controller");
  //分享
    $('#weixin').click(function(){
      $(this).next().show()
    })
    $('#weixin2 .icon-weixin').click(function(){
      // $(this).next().show()
      //console.log("sss");
      $(this).next(".weixin2").show();
    })
    $('.close1').click(function(){
      $(this).parent().hide();
    });

    $('.close2').click(function(){
      // $(this).hide();
      $(this).parent().hide()

     
      
      
    })


/* ----- 侧边悬浮 ---- */
  $(document).on("mouseenter", ".suspension .a", function(){
    var _this = $(this);
    var s = $(".suspension");
    var isService = _this.hasClass("a-service");
    var isServicePhone = _this.hasClass("a-service-phone");
    var isQrcode = _this.hasClass("a-qrcode");
    if(isService){ s.find(".d-service").show().siblings(".d").hide();}
    if(isServicePhone){ s.find(".d-service-phone").show().siblings(".d").hide();}
    if(isQrcode){ s.find(".d-qrcode").show().siblings(".d").hide();}
  });
  $(document).on("mouseleave", ".suspension, .suspension .a-top", function(){
    $(".suspension").find(".d").hide();
  });
  $(document).on("mouseenter", ".suspension .a-top", function(){
    $(".suspension").find(".d").hide(); 
  });
  $(document).on("click", ".suspension .a-top", function(){
    $("html,body").animate({scrollTop: 0});
  });
  var $top = $(".suspension .a-top");
  $top.css({display: 'block'});
  // $(window).scroll(function(){
  //  var st = $(document).scrollTop();
  //  var $top = $(".suspension .a-top");
  //  $top.css({display: 'block'});
  //  if(st > 400){
  //    $top.css({display: 'block'});
  //  }else{
  //    if ($top.is(":visible")) {
  //      $top.show();
  //    }
  //  }
  // });
  




})
