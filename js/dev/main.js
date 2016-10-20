jQuery(document).ready(function($){
    
    var scroll = $(window).scrollTop();
    if (scroll > 280) {
      $('#scroll-nav').fadeIn();
    }
    if (scroll < 281) {
      $('#scroll-nav').fadeOut();
    }
    
    
     $(window).scroll(function () {
     
    if ($(window).scrollTop() > 280) {
      $('#scroll-nav').fadeIn();
    }
    if ($(window).scrollTop() < 281) {
      $('#scroll-nav').fadeOut();
    }
  });
    
});//ready