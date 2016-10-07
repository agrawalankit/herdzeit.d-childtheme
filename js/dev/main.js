jQuery(document).ready(function($){
    
     $(window).scroll(function () {
     
    if ($(window).scrollTop() > 280) {
      $('#scroll-nav').fadeIn();
    }
    if ($(window).scrollTop() < 281) {
      $('#scroll-nav').fadeOut();
    }
  });
    
    
    
});//ready