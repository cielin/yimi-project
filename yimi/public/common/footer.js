var footerHtml = `<div class="footer">
    <div class="container-fluid bg-black-18">
      <div class="container footer-top">
        <div class="row">
          <div class="share col-md-5">
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
            <span id="weixin" class="icon iconfont icon-weixin">
            </span>
            <div class="weixin">
              <span class="close close1">X</span>
              <div>
                <img src="../assets/img/foot/weixinCode.png">
                <p>扫码分享</p>
              </div>
            </div>
          </div>

          <div class="f-email col-md-7">
            <span>SUBCRIBLE  NEWSLETTER</span>
            <input type="text" name="" placeholder="Enter your email address">
            <span class="icon iconfont icon-youjian">
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid bg-black-21">
      <div class="container footer-middle">
        <div class="row">
          <div class="f-left col-md-4 col-sm-3">
            <img src="../assets/img/foot/f-logo.jpg" />
            <h4>
              微信公众号
            </h4>
            <img src="../assets/img/foot/f-ma.jpg" />
          </div>
          <div class="f-right col-md-8 col-sm-9">
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
          <p class="col-md-6 col-xs-6">津ICP备15003667号    快递查询 天津尚柏电子商务有限公司©2016</p>
          <div class="col-md-6 col-xs-6 text-right">
            <a href="#">购物须知</a>
            <a href="#">如何选购</a>
            <a href="#">配送信息</a>
            <a href="#">关于我们</a>
          </div>
        </div>
      </div>
     
    </div>
  </div>`;


document.write(footerHtml);


