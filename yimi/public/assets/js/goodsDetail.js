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


     
  var swiper = new Swiper('.swiper1', {
      slidesPerView: 1,
      spaceBetween: 30,
      // paginationClickable: true,
      loop: true,
      speed: 1000,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      on: {
      slideChange: function () {
        var imgWidth = 1920;
        var boxWidth = this.width;
        var left = (-(imgWidth-boxWidth)/2)+"px";
        
      },
    }
    });
 
	})