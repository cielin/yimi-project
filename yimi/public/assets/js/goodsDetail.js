$(function () {

// 带预览效果的轮播 start
     var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      loop:true,
      loopedSlides: 5, //looped slides should be the same
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
     
    });
    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      touchRatio: 0.2,
      loop: true,
      loopedSlides: 5, //looped slides should be the same
      slideToClickedSlide: true,
      // navigation: {
      //   nextEl: '.swiper-button-next',
      //   prevEl: '.swiper-button-prev',
      // },
    });
    galleryTop.controller.control = galleryThumbs;
    galleryThumbs.controller.control = galleryTop;
     // 带预览效果的轮播 end

     //轮播文字
     var swiper = new Swiper('.swiperText', {
           slidesPerView: 4,
           spaceBetween: 30,
           slidesPerGroup: 4,
           loop: false,
           loopFillGroupWithBlank: true,
           pagination: {
             el: '.swiper-pagination',
             clickable: true,
           },
           navigation: {
             nextEl: '.swiper-button-next',
             prevEl: '.swiper-button-prev',
           },
         });
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
    params.timestamp = get_time();
    params.sign = makeSign(params, secret);
    var token = "";
    @if (Auth::check())
    token = "{{ Auth::user()->api_token }}";
    @endif
    $.ajax({
        url : "http://www.cyrial.com/api/collect_product",
        data : params,
        headers: {
            'Authorization':'Bearer ' + token,
        },
        type : 'post',
        success:function(message){
          if(message.action == 'removed'){
             $(this).removeClass('glyphicon-heart').addClass('glyphicon-heart-empty')
          } else {
            $(this).removeClass('glyphicon-heart-empty').addClass('glyphicon-heart')
          }
        },
        async:false
      })
    }
/*********************收藏变实心**********************************/
	})