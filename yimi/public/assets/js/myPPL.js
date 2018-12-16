
(function initPPl() {
  var homeI = 0;
  var minHeight = 0;
  var flagNum = 5;//页面自动加载到第几页
  var newPage = flagNum; //按钮可点的页码初始值
  var totalPage = 0; //总页数
  var pageCount = 10;
  var url = window.location.href.split("/");
  var projectDom = $(".sidebar-content").length;
  $(".lodeNext").hide();
  var isTrue = false;
  var page = 1;
  var footHeight = $(".footer").height() + 300;
  var userId = $("#userId").val();


  $(window).scroll(function () {
    if (page >= flagNum) {
      return false;
    }
    if (page >= totalPage) {
      $(".lodeNext").hide();
      return false;
    }
    if ($(document).height() - $(this).scrollTop() - $(this).height() < footHeight) {
      if (isTrue) {
        isTrue = false;
        setTimeout(function () {
          page++;
          if (page > 1 && page <= flagNum) {
            getParam(page, pageCount, url, projectDom);
            if (page == flagNum) {
              $(".lodeNext").show();
            }
          }
        }, 1000);
      }
    }
  })

  if (page == 1) {
    getParam(page, pageCount, url, projectDom);
  }

  function loadMore(newPage) {
    $(".lodeNext").off("click").on("click", function () {
      newPage++;
      if (parseInt(newPage) >= parseInt(totalPage) + 1) {
        $(this).hide();
        return false;
      }
      setTimeout(function () {
        getParam(newPage, pageCount, url, projectDom);
      }, 1000);
    })
  }
  function getParam(page, pageCount, url, projectDom) {
    var oCheckBtn = $(".sidebar-content").find(".magic-checkbox:checked");
    var locationArr = [];
    $.each(oCheckBtn, function (index, item) {
      locationArr.push($(item).val());
    })

    var type = url[3];
    if (type == "categories") {
      type = "category";
    } else if (type == "spaces") {
      type = "space";
    } else if (type == "brands") {
      type = "brand";
    } else if (type == "") {
      type = "home";
    }
    var obj = {
      "page": page,
      "pageCount": pageCount,
      "type": type,
      "basket": url[4],
      "location": projectDom != 0 ? locationArr.toString() : ""
    }
    var type = "type=" + obj.type;
    var basket = obj.basket ? "&basket=" + obj.basket : "";
    var page = "&page=" + obj.page;
    var pagecont = "&pageCount=" + obj.pageCount;
    var location = obj.location.length != 0 ? "&location=[" + obj.location + "]" : "";
    var param = type + basket + page + pagecont + location;
    showFh5co(param, obj);
  }

  function showFh5co(param, obj) {
    var html = "";
    $.ajax("/api/get_items?" + param + "&userId=" + userId).done(function (data) {
      data = JSON.parse(data);
      var products = data.products;

      if(param.type=="home" && param.page>1){
        console.log("homeI",homeI);
        products = [];
        for(var i = homeI; i<data.products.length;i++){
          products.push(data.products[i]);
        }
        console.log("products",products);
      }
      totalPage = Math.ceil(parseInt(data.total) / parseInt(obj.pageCount));
      isTrue = true;
      if (products.length == 0) {
        html = "<div class='nodata'>暂无数据</div>";
        return false;
      }
      var grid = document.querySelector('#fh5co-board');
      var item = document.createElement('div');
      for (var i = 0; i < products.length; i++) {
        homeI++
        // console.log("products[i]",products[i]);
        var proId = products[i].hasOwnProperty("id") ? products[i].id : "";
        var proImgUrl = products[i].hasOwnProperty("featured_image") ? products[i].featured_image : "a.jpg";
        var proName = products[i].hasOwnProperty("name") ? products[i].name : "";
        var proSlug = products[i].hasOwnProperty("slug") ? products[i].slug : "";
        var proType = products[i].hasOwnProperty("type") ? products[i].type : "";
        var proLink = products[i].hasOwnProperty("link") ? products[i].link : "";
        var proStatus = products[i].hasOwnProperty("status") ? products[i].status : "";
        if (proType == "" || proType == "1") {
          if (proStatus == 1) {
            html = '<div class="item">'
            + '<div class="animate-box">'
            + '<img src="/public/images/products/' + proImgUrl + '" alt=' + proName + '>'
            + '<div class="fh5co-desc">' + proName + '</div>'
            + '<div class="itemHover">'
            + '<p class="ico-wrap">'
            + '<span class="glyphicon glyphicon-heart heart-detail" data-id=' + proId + ' data-type=1></span>'
            + '<a href="/products/' + proSlug + '"><span class="icon iconfont icon-yanjing1"></span></a>'
            + '</p>'
            + '</div>'
            + '</div>'
            + '</div>';
          } else {
            html = '<div class="item">'
            + '<div class="animate-box">'
            + '<img src="/public/images/products/' + proImgUrl + '" alt=' + proName + '>'
            + '<div class="fh5co-desc">' + proName + '</div>'
            + '<div class="itemHover">'
            + '<p class="ico-wrap">'
            + '<span class="glyphicon glyphicon-heart-empty heart-detail" data-id=' + proId + ' data-type=1></span>'
            + '<a href="/products/' + proSlug + '"><span class="icon iconfont icon-yanjing1"></span></a>'
            + '</p>'
            + '</div>'
            + '</div>'
            + '</div>';
          }
        } else if (proType == "2") {
          if (proStatus == 1) {
            html = '<div class="item">'
            + '<div class="animate-box">'
            + '<img src="/public/images/spotlights/' + proImgUrl + '" alt=' + proName + '>'
            + '<div class="fh5co-desc">' + proName + '</div>'
            + '<div class="itemHover">'
            + '<p class="ico-wrap">'
            + '<span class="glyphicon glyphicon-heart heart-detail" data-id=' + proId + ' data-type=2></span>'
            + '<span class="icon iconfont icon-sousuo clickico"  data-toggle="modal" data-target=".myModalImg"  data-src="/public/images/spotlights/' + proImgUrl + '" data-alt="' + proName + '"></span>'
            + '</p>'
            + '</div>'
            + '</div>'
            + '</div>';
          } else {
            html = '<div class="item">'
            + '<div class="animate-box">'
            + '<img src="/public/images/spotlights/' + proImgUrl + '" alt=' + proName + '>'
            + '<div class="fh5co-desc">' + proName + '</div>'
            + '<div class="itemHover">'
            + '<p class="ico-wrap">'
            + '<span class="glyphicon glyphicon-heart-empty heart-detail" data-id=' + proId + ' data-type=2></span>'
            + '<span class="icon iconfont icon-sousuo clickico"  data-toggle="modal" data-target=".myModalImg"  data-src="/public/images/spotlights/' + proImgUrl + '" data-alt="' + proName + '"></span>'
            + '</p>'
            + '</div>'
            + '</div>'
            + '</div>';
          }
        }
        salvattore.appendElements(grid, [item]);
        item.outerHTML = html;
      }
      clickIco();
      itemHover();
    })
  }
  function clickIco() {
    $.each($(".clickico"), function (index, item) {
      $(item).click(function () {
        $("#bigImg").attr("src", $(this).attr("data-src"));
        $("#bigImg").attr("alt", $(this).attr("data-alt"));
      })
    })
  }
  function itemHover() {
    $("#fh5co-board").find(".item").mouseover(function () {
      $(this).find(".itemHover").show();
    })
    $("#fh5co-board").find(".item").mouseout(function () {
      $(this).find(".itemHover").hide();
    })
  }

  loadMore(newPage, pageCount, url, projectDom);

})();

