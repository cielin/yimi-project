var headerHtml = `<!-- LAYOUT-->
<div class="layout" id="layout">
  <a href="/" class="navigation-hide"><i class="ion-close-round"></i></a>
  <div class="overlay">
    <ul class="">
      <li  class="current">
        <a href="/" title="首页">首页</a>
      </li>
      <li>
        <a href="/categories" title="商品">商品</a>
      </li>
      <li>
        <a href="#" title="空间">空间</a>
      </li>
      <li>
        <a href="#" title="品牌">品牌</a>
      </li>
      <li>
        <a href="#" title="设计师">设计师</a>
      </li>
      <li>
        <a href="#" title="如何选购">如何选购</a>
      </li>
      <li>
        <a href="#" title="最近文章">最近文章</a>
      </li>
      
    </ul>
  </div>
</div>
<!-- WRAPPER -->
<!-- NAVIGATION -->
<nav class="navbar navbar-custom navbar-light navbar-fixed-top navbar-transparent">
  <div class="nav-top-wrap">
    <div class="container">
      <div class="pull-left">
        <span class="tip">Call us for free</span>
        <span class="tel">400-671-1871</span>
        <span class="email">yimijia@163.com</span>
      </div>
      <div class="pull-right nav-top-right">
        <span class="login" data-toggle="modal" data-target="#myModal">登录/注册</span> |
        <span class="myOrder">我的订单</span>
        <span class="myCollect">我的收藏</span>
      </div>
    </div>
  </div>
  <div class="container">
    <!-- YOU LOGO HERE -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="" id="navbar-toggle">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
      <a class="navbar-brand" href="/"><img src="../assets/img/logo.png" width="180" alt=""></a>
    </div>
    <div class="navbar-collapse collapse " id="example-navbar-collapse">
      <ul class="nav navbar-nav  pull-right">
        <li  class="current">
          <a href="/" title="首页">首页</a>
        </li>
        <li>
          <a href="#" title="空间">空间</a>
        </li>
        <li>
          <a href="/categories" title="商品">商品</a>
        </li>
        <li>
          <a href="#" title="品牌">品牌</a>
        </li>
        <li>
          <a href="#" title="设计师">设计师</a>
        </li>
        <li class="leftLine">
          <a href="#" title="如何选购">如何选购</a>
        </li>
        <li class="rightLine">
          <a href="#" title="最近文章">最近文章</a>
        </li>
        <li style="position: relative; width: 50px;">
          <div class="top-search-group">
            <input class="search-input"/>
            <!-- <button id="top-search-btn" class="glyphicon glyphicon-search"></button> -->
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- /NAVIGATION -->`;


document.write(headerHtml);