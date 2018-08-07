<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')_薏米家</title>
    <script type="text/javascript" src="{{ URL::asset('common/login.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('plugin/swiper/css/swiper.css') }}" />
    <link href="{{ URL::asset('plugin/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('plugin/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('plugin/Huploadify.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/fonts/iconfont.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/reset.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/base.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/layout.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/common.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/plugin.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/magic-check.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/page.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/custorm.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/768px.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/992px.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/1200px.css') }}" type="text/css" rel="stylesheet">
    @yield('css')
</head>

<body>
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
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="" id="navbar-toggle">
                    <span class="sr-only">切换导航</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="{{ URL::asset('assets/img/logo.png') }}" width="180" alt="" />
                </a>
            </div>
            <div class="navbar-collapse collapse " id="example-navbar-collapse">
                <ul class="nav navbar-nav  pull-right">
                    <li @if ($active == 'home') class="current" @endif >
                        <a href="/" title="首页">首页</a>
                    </li>
                    <li>
                        <a href="#" title="空间">空间</a>
                    </li>
                    <li @if ($active == 'categories') class="current" @endif >
                        <a href="/categories" title="商品">商品</a>
                    </li>
                    <li @if ($active == 'brands') class="current" @endif >
                        <a href="/brands" title="品牌">品牌</a>
                    </li>
                    <li @if ($active == 'designers') class="current" @endif >
                        <a href="/designers" title="设计师">设计师</a>
                    </li>
                    <li class="leftLine">
                        <a href="#" title="如何选购">如何选购</a>
                    </li>
                    <li class="rightLine  @if ($active == 'articles') current @endif ">
                        <a href="/articles" title="最近文章">最近文章</a>
                    </li>
                    <li style="position: relative; width: 50px;">
                        <div class="top-search-group">
                            <input class="search-input" />
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
        @yield('page-content')
   
    <div class="footer">
        <div class="container-fluid bg-black-18">
            <div class="container footer-top">
                <div class="row">
                    <div class="share col-md-5 col-sm-4">
                        <a href="javascript:window.open('http://twitter.com/home?status='+encodeURIComponent(document.location.href)+' '+encodeURIComponent(document.title));void(0)">
                            <span class="icon iconfont icon-twitter"></span>
                        </a>
                        <a class="fav_facebook" rel="nofollow" href="javascript:window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(document.location.href)+'&t='+encodeURIComponent(document.title));void(0)">
                            <span class="icon iconfont icon-facebook"></span>
                        </a>
                        <a href="http://v.t.sina.com.cn/share/share.php?url=http://www.jb51.net&title='分享内容'" target="_blank">
                            <span class="icon iconfont icon-weibo"></span>
                        </a>
                        <a href="http://connect.qq.com/widget/shareqq/index.html?title=qqhaoyou&url=http://www.jb51.net&desc=还不错哦&pics=&site=优酷" target="_blank">
                            <span class="icon iconfont icon-qq"></span>
                        </a>
                        <span id="weixin" class="icon iconfont icon-weixin"></span>
                        <div class="weixin">
                            <span class="close close1">X</span>
                            <div>
                                <img src="{{ URL::asset('assets/img/foot/weixinCode.png') }}" />
                                <p>扫码分享</p>
                            </div>
                        </div>
                    </div>

                    <div class="f-email col-md-7 col-sm-8">
                        <span>SUBCRIBLE  NEWSLETTER</span>
                        <input type="text" name="" placeholder="Enter your email address" />
                        <span class="icon iconfont icon-youjian"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-black-21">
            <div class="container footer-middle">
                <div class="row">
                    <div class="f-left col-md-5 col-sm-4">
                        <img src="{{ URL::asset('assets/img/foot/f-logo.jpg') }}" />
                        <h4>微信公众号</h4>
                        <img src="{{ URL::asset('assets/img/foot/f-ma.jpg') }}" />
                    </div>
                    <div class="f-right col-md-6 col-sm-8">
                        <dl>
                          <dt>会员服务</dt>
                          <dd>
                            <a href="#">联系我们</a>
                            <a href="#">我的订单</a>
                            
                          </dd>
                        </dl>
                      
                        
                        <dl class="help">
                          <dt>帮助中心</dt>
                          <dd>
                           <span>Hotline：400 - 671 - 1878</span>
                           <span>Open - Close： 09:00 - 21:00</span>
                           <span>Mail： <a href="mailto:yimijia@163.com">yimijia@163.com</a></span>
                          </dd>
                          
                          
                        </dl>
                    </div>
                </div>
                <div class="row footer-bottom">
                    <p class="col-md-6 col-xs-6">津ICP备15003667号 快递查询 天津尚柏电子商务有限公司©2016</p>
                    <div class="col-md-6 col-xs-6 text-right">
                        <a href="#">购物须知</a>
                        <a href="#">如何选购</a>
                        <a href="#">配送信息</a>
                        <a href="#">关于我们</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('plugin/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugin/bootstrap-3.3.7-dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugin/swiper/js/swiper.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugin/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugin/jquery.Huploadify.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugin/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('common/utils/tools.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('common/utils/layout.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('common/template.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('common/common.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('common/controller.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('common/plugin.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('common/pages.js') }}"></script>
    @yield('js')
</body>
</html>