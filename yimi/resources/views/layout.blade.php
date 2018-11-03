<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <META HTTP-EQUIV="pragma" CONTENT="no-cache"> 
    <META HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate">
    <META HTTP-EQUIV="expires" CONTENT="0">
    <title>@yield('title')_薏米家</title>
    <link href="{{ URL::asset('assets/img/favicon.ico') }}" rel="icon">
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
    <link href="{{ URL::asset('assets/css/mobile.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/rem.css') }}" type="text/css" rel="stylesheet">

    @yield('css')
</head>

<body>
    <!-- LAYOUT-->
<div class="topSearch">
  <a class="logo" href="/"><img src="{{ URL::asset('assets/img/favicon.ico') }}" alt=""></a>
  <div class="top-search">
    <input class="sinput"/>
    <!-- <button id="top-search-btn" class="glyphicon glyphicon-search"></button> -->
  </div>
</div>
<div class="layout footer-nav" id="layout">

  <div class="overlay">
    <ul class="">
      <li @if (isset($active) && $active == 'home') class="current" @endif >
            <a href="/" title="首页"><span class="glyphicon glyphicon-eye-open"></span>
                首页
            </a>
        </li>
        <li>
            <a href="/spaces" title="空间"><span class="glyphicon glyphicon-eye-open"></span>
                空间
            </a>
        </li>
        <li @if (isset($active) && $active == 'categories') class="current" @endif >
            <a href="/categories" title="商品"><span class="glyphicon glyphicon-eye-open"></span>
                商品
            </a>
        </li>
        <li @if (isset($active) && $active == 'brands') class="current" @endif >
            <a href="/brands" title="品牌"><span class="glyphicon glyphicon-eye-open"></span>
                品牌
            </a>
        </li>
        <li @if (isset($active) && $active == 'designers') class="current" @endif >
            <a href="/designers" title="设计师">
                <span class="glyphicon glyphicon-eye-open"></span>
                设计师
            </a>
        </li>
  
        @if (Auth::check())
        <li>
            <a class="user" href="{{ url('my/info') }}">
                <span class="glyphicon glyphicon-eye-open"></span>
            </a>
        </li>
        <li>
            <a href="{{ url('signout') }}">
                <span class="glyphicon glyphicon-eye-open"></span>
                退出
            </a>
        </li>
        @else
        <li>
        <a href="#" title="登录" class="hui-eee" data-toggle="modal" data-target="#myAuthModal">
          <span class="glyphicon glyphicon-eye-open"></span>
          登录
        </a>
      </li>
        @endif
    </ul>
  </div>
</div>
<!-- WRAPPER -->
<!-- NAVIGATION -->
    <nav class="headerNav navbar navbar-custom navbar-light navbar-fixed-top navbar-transparent">
        <div class="nav-top-wrap">
            <div class="container">
                <div class="pull-left">
                    <span class="tip">Call us for free</span>
                    <span class="tel">400-632-1878</span>
                    <span class="email">sales@homeyimi.com</span>
                </div>
                <div class="pull-right nav-top-right">
                    @if (Auth::check())
                    <a class="user" href="{{ url('my/info') }}">{{ Auth::user()->nickname }}</a>
                    <a href="{{ url('signout') }}">退出</a>|
                    @else
                    <a class="login" data-toggle="modal" data-target="#myAuthModal">登录/注册</a> |
                    @endif
                    <a class="myOrder noLogin" href="javascript:void(0)" data-href="{{ url('my/orders') }}">我的订单</a>
                     |
                    <a class="myMsg noLogin" href="javascript:void(0)" data-href="{{ url('my/messages') }}">我的消息</a> |
                    <a class="myCollect noLogin" href="{{ url('my/collections') }}">我的收藏</a>
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
                <ul class="nav navbar-nav  pull-right nav-new-add">
                    <li @if (isset($active) && $active == 'home') class="current" @endif >
                        <a href="/" title="首页">首页</a>
                    </li>
                    <li>
                        <a href="/spaces" title="空间">空间</a>
                    </li>
                    <li @if (isset($active) && $active == 'categories') class="current" @endif >
                        <a href="/categories" title="商品">商品</a>
                    </li>
                    <li @if (isset($active) && $active == 'brands') class="current" @endif >
                        <a href="/brands" title="品牌">品牌</a>
                    </li>
                    <li @if (isset($active) && $active == 'designers') class="current" @endif >
                        <a href="/designers" title="设计师">设计师</a>
                    </li>
                    <li class="leftLine">
                        <a href="/articles/shopping-tips" title="如何选购">如何选购</a>
                    </li>
                    <li class="rightLine  @if (isset($active) && $active == 'articles') current @endif ">
                        <a href="/articles" title="最近文章">最近文章</a>
                    </li>
                    <li style="position: relative; width: 50px;">
                        {{ Form::open(array('route' => 'categories.search', 'role' => 'form')) }}
                        <div class="top-search-group">
                            <input class="search-input" name="query" />
                        </div>
                        {{ Form::close() }}
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
                        <span style="border:none;">SUBCRIBLE  NEWSLETTER</span>
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
                        <img src="{{ URL::asset('assets/img/foot/f-logo.png') }}" style="width: 178px;"/>
                        <h4>微信公众号</h4>
                        <img src="{{ URL::asset('assets/img/foot/f-ma.jpg') }}" />
                    </div>
                    <div class="f-right col-md-6 col-sm-8">
                        <dl>
                          <dt>会员服务</dt>
                          <dd>
                            <a href="#">联系我们</a>
                            <a class="noLogin" href="javascript:void(0)" data-href="{{ url('my/orders') }}">我的订单</a>
                            <a href="{{ url('articles/aboutus') }}">关于我们</a>
                            <a class="noLogin" href="javascript:void(0)" data-href="{{ url('my/orders') }}">配送信息</a>
                          </dd>
                        </dl>
                      
                        
                        <dl class="help">
                          <dt>帮助中心</dt>
                          <dd>
                           <span>Hotline：400-632-1878</span>
                           <span>Open/Close： 09:00/21:00</span>
                           <span>Mail： <a href="mailto:sales@homeyimi.com">sales@homeyimi.com</a></span>
                          </dd>
                          
                          
                        </dl>
                    </div>
                </div>
                <div class="row footer-bottom">
                    <p class="col-md-6 col-xs-6">沪ICP备18025160号-2 匠意国际贸易（上海）有限公司©2018</p>
                    <div class="col-md-6 col-xs-6 text-right">
                        <a href="{{ url('articles/shopping-tips') }}">购物须知</a>
                        <a href="{{ url('my/orders') }}">配送信息</a>
                        <a href="{{ url('articles/aboutus') }}">关于我们</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade login" id="myAuthModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="login-tit" role="tablist">
                        <li class="active" role="presentation">
                            <a href="#login" aria-controls="home" role="tab" data-toggle="tab">登录</a>
                        </li>
                        <li role="presentation">
                            <a href="#register" aria-controls="profile" role="tab" data-toggle="tab">注册</a>
                        </li>
                    </ul>
                    <div class="tab-content login-box">
                        <!---登录-->
                        <div role="tabpanel" class="tab-pane active" id="login">
                            {{ Form::open(array('route' => 'signin.post', 'class' => 'form-signin', 'role' => 'form', 'id' => 'form1')) }}
                                <input type="hidden" name="refer" value="{{ url()->current() }}">
                                <label for="">
                                    <p>电子邮箱 <span class="red1">*</span>
                                    </p>
                                    <input name="email" type="email" required placeholder="请输入电子邮箱">
                                </label>
                                <label for="">
                                    <p>密码 <span class="red1">*</span>
                                    </p>
                                   <input name="password" type="password" required placeholder="请输入密码" autocomplete="new-password">
                                </label>
                                <label for="">
                                    {{ Form::submit('登  录', array('class' => 'login-btn')) }}
                                </label>
                            {{ Form::close() }}
                        </div>
                        <!--注册-->
                        <div role="tabpanel" class="tab-pane" id="register">
                            {{ Form::open(array('route' => 'register.post', 'class' => 'form-signup', 'role' => 'form', 'id' => 'form2')) }}
                                <input type="hidden" name="refer" value="{{ url()->current() }}">
                                <label for="">
                                    <p>昵称 <span class="red1">*</span></p>
                                    <input type="text" name="nickname" required placeholder="请输入昵称">
                                </label>
                                <label for="">
                                    <p>邮箱 <span class="red1">*</span></p>
                                    <input id="" type="email" type="email" name="email" required placeholder="请输入邮箱">
                                </label>
                                <label for="">
                                    <p>密码 <span class="red1">*</span></p>
                                    <input type="password" id="password" name="password" placeholder="输入新密码" required autocomplete="new-password"/>
                                </label>
                                <label for="">
                                    <p>确认密码 <span class="red1">*</span></p>
                                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="确定新密码" required autocomplete="new-password"/>
                                </label>
                                <label for="">
                                    {{ Form::submit('注  册', array('class' => 'login-btn')) }}
                                </label>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="userStatus" value="<?php if (Auth::check()) { echo '1'; } else { echo '0'; } ?>"><!--判断是否登录的隐藏域,value的值来判断是否登录，标识1为已经登录，标识0为未登录-->
    
    <script type="text/javascript" src="{{ URL::asset('plugin/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugin/jquery-migrate-3.0.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugin/bootstrap-3.3.7-dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugin/swiper/js/swiper.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugin/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugin/jquery.Huploadify.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugin/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('common/utils/tools.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('common/utils/layout.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('common/template.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('common/common.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('common/controller.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('common/plugin.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('common/pages.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugin/jsencrypt.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('plugin/md5.js') }}"></script>
    <script type="text/javascript">
 /*********************收藏变实心**********************************/
      /*
 * 生成签名
 * @params  待签名的json数据
 * @secret  密钥字符串
 */
function makeSign(params, secret){
    var ksort = Object.keys(params).sort();
    var str = '';
    for(var ki in ksort){ 
    str += ksort[ki] + '=' + params[ksort[ki]] + '&'; 
    }

    str += 'secret=' + secret;
    var token = hex_md5(str).toUpperCase();
    return rsa_sign(token);
}

/*
 * rsa加密token
 */
function rsa_sign(token){
    var pubkey='-----BEGIN PUBLIC KEY-----';
    pubkey+='MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDSS/B+VvzgF66yWJUN5wmBSl22';
    pubkey+='WdbBHrAiAgg1Jk0WqeWo3ZswH/hIGGUQC3WvKFdbYE50G/Zaoe368O358ueFKtfL';
    pubkey+='FSDyXzKMLDTXTxdX7dqwRuTe+SAMQE4KSazTM0yl6uHTrue2iDRCZI6OMd1oZCTo';
    pubkey+='hKgMxEUSti/kHlMcEQIDAQAB';
    pubkey+='-----END PUBLIC KEY-----';
    // 利用公钥加密
    var encrypt = new JSEncrypt();
    encrypt.setPublicKey(pubkey);
    return encrypt.encrypt(token);
}

/*
 * 获取时间戳
 */
function get_time(){
    var d = new Date();
    var time = d.getTime()/1000;
    return parseInt(time);
}

//secret密钥
var secret = 'f0842b09ad765c3daee190fd90a6e6ef';

   $('.heart-detail').click(function(){
    var params = {};
    params.id = $(this).data('id');
    params.type = $(this).data('type');
    params.timestamp = get_time();
    params.sign = makeSign(params, secret);
    var token = "";
    @if (Auth::check())
    token = "{{ Auth::user()->api_token }}";
    @endif
    $.ajax({
        url : "http://127.0.0.1:8000/api/collect_product",
        data : params,
        headers: {
            'Authorization':'Bearer ' + token,
        },
        type : 'post',
        context : this,
        success:function(data){
          if(JSON.parse(data).message == 'success'){
            if(JSON.parse(data).action == 'removed'){
                $(this).removeClass('glyphicon-heart').addClass('glyphicon-heart-empty')
            } else {
                $(this).removeClass('glyphicon-heart-empty').addClass('glyphicon-heart')
            }
          } else {
             console.log('success 401')
             $(this).attr('data-toggle','modal')
             $(this).attr('data-target','#myModal')
          }
        },
        error: function(jqXHR){
            if(jqXHR.status == 401) {
                console.log('error 401')

                $(this).attr('data-toggle','modal')
                $(this).attr('data-target','#myAuthModal')
            } else {
                console.log('其它')
            }
        },
        async:false
      })
    })
/*********************收藏变实心**********************************/

/******点击头部，我的订单，我的收藏，我的消息时，没有登录弹出登录框，否则打开******/ 
    $('.noLogin').click(function(){
        str = $("#userStatus").val();
        if(str == '0'){//未登录
            $(this).attr('data-toggle','modal');
            $(this).attr('data-target','#myAuthModal');
            $(this).attr("href","javascript:void(0)");
        }else if(str == '1'){//已登录
            window.location.href=$(this).attr("data-href");
            //$(this).attr("href",$(this).attr("data-href"));
        }
    })
/******点击头部，我的订单，我的收藏，我的消息时，没有登录弹出登录框，否则打开end******/

//表单验证验证
$().ready(function() {
    $("#form1").validate({
       rules:{
          email:{
             required:true,
          },          
          password:{
            required:true,
          }                  
       },
       messages:{
          email:{
            required: "请输入邮箱地址",
          },
          password:{
               required: "请输入密码",
           }                                 
       }  
    });
    $("#form2").validate({
       rules:{
          nickname:{
               required:true,
           },
           email:{
               required:true,
               email:true
           },            
          password:{
               required:true,
           },
          password_confirmation:{
               equalTo:"#password"    //新密码的id选择器
           }                    
       },
       messages:{
          nickname:{
               required: "请输入昵称",
           },
           email:{
               required: "请输入邮箱地址",
               email:"请输入正确的邮箱，例如:example@qq.com",
           },
          password:{
               required: "请输入密码",
           },
          password_confirmation:{
               required: "请确认密码",
               equalTo:"两次密码输入不一致"
           }                                    
       }  
    });
});
    </script>
    @yield('js')
</body>
</html>
