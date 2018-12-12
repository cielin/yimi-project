
 $(".lodeNext").hide();
 (function initPPl(){
    var page = 1;
      var footHeight = $(".footer").height() +300;
    
  
      $(window).scroll(function(){
        // console.log("在自动加载中的page",page);
        // console.log("共几页",totalPage);
        // console.log("page > flagNum",page>flagNum)

        if(page>=flagNum){
          return false;
        }
        if(page>= totalPage){
          $(".lodeNext").hide();
          return false;
        }
        // console.log("查看是否终端");
        if ($(document).height() - $(this).scrollTop() - $(this).height()<footHeight){
          if (isTrue) {
            isTrue = false;
              setTimeout(function() {
                page++;
                if(page>1 && page<=flagNum){
                  // console.log("page",page);
                  getParam(page,pageCount,url,projectDom);
                  if(page == flagNum){
                    $(".lodeNext").show();
                  }
                }
                
              }, 1000);
              
           }
         }
     })
    
    if(page==1){
      getParam(page,pageCount,url,projectDom);
    }
    
  })();

 function loadMore(newPage){
  $(".lodeNext").off("click").on("click",function(){
    newPage++;
    if(parseInt(newPage) >= parseInt(totalPage)+1){
      $(this).hide();
      return false;
    }
    setTimeout(function() {    
    getParam(newPage,pageCount,url,projectDom);
    }, 1000);
  })
 }
  function getParam(page,pageCount,url,projectDom){
    var oCheckBtn = $(".sidebar-content").find(".magic-checkbox:checked");
    var locationArr = [];
    $.each(oCheckBtn,function(index,item){
      locationArr.push($(item).val());
    })
    console.log("url",url);
    var obj = {
      "page":page,
      "pageCount":pageCount,
      "type":url[1],
      // "type":"category",
      "basket":url[2],
      "location": projectDom != 0 ? locationArr.toString() : "" 
    }
    var type = "type="+obj.type;
    var basket = obj.basket ? "&basket=" + obj.basket : "";
    var page = "&page=" + obj.page;
    var pagecont = "&pageCount=" + obj.pageCount;
    var location = obj.location.length != 0 ? "&location=["+obj.location+"]" : "";
    var param = type+basket+page+pagecont+location;
    showFh5co(param,obj);
  }

  function showFh5co(param,obj){
    var html = "";
    ajax.get("http://www.cyrial.com/api/get_items?"+param,function(data){
      console.log("data",data);
      var products = data.products;
      totalPage = parseInt(data.total)%parseInt(obj.pageCount);
      isTrue = true;
      if(products.length == 0){
        html = "<div class='nodata'>暂无数据</div>";
        return false;
      }
      console.log("products.length",products.length);
      var grid = document.querySelector('#fh5co-board');
      var item = document.createElement('div');
      for(var i=0;i<products.length;i++){
        var proId = products[i].hasOwnProperty("id") ? products[i].id:"";
        var proImgUrl = products[i].hasOwnProperty("featured_image") ? products[i].featured_image:"a.jpg";
        var proName = products[i].hasOwnProperty("name") ? products[i].name:"";
        var proSlug = products[i].hasOwnProperty("slug") ? products[i].slug:"";
        html+='<div class="item">'
            +'<div class="animate-box">'
              +'<img src="http://www.cyrial.com/public/images/products/'+proImgUrl+'" alt='+proName+'>'
              +'<div class="fh5co-desc">'+proName+'</div>'
            +'<div class="itemHover">'
        +'<p class="ico-wrap">'
          +'<span class="glyphicon glyphicon-heart-empty heart-detail" data-id='+proId+' data-type='+proId+'></span>'
          +'<a href="http://www.cyrial.com/products/'+proSlug+'"><span class="icon iconfont icon-yanjing1"></span></a>'
        +'</p>'
            +'</div>'
            +'</div>'
          +'</div>';
        salvattore.appendElements(grid, [item]);
        item.outerHTML = html;
      }
      itemHover();
    })

  }

 function itemHover(){
$("#fh5co-board").find(".item").mouseover(function(){
      $(this).find(".itemHover").show();
    })
    $("#fh5co-board").find(".item").mouseout(function(){
      $(this).find(".itemHover").hide();
    })
  }
  $(function(){
    var proDatas = [];
    var isTrue = false;
    var minHeight = 0;
    var flagNum = 8;//页面自动加载到第几页
    var newPage = flagNum; //按钮可点的页码初始值
    var totalPage = 0; //总页数
    var pageCount = 10;
    var url = window.location.href.split("/");
    var projectDom = $(".sidebar-content").length;
     loadMore(newPage,pageCount,url,projectDom);
  });
