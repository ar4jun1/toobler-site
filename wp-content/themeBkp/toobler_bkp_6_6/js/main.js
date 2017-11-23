$(document).ready(function() {
    
    //==== Main ====//
    
    //Header
    var shrinkHeader = 300;
        $(window).scroll(function() {
    var scroll = getCurrentScroll();
      if ( scroll >= shrinkHeader ) {
           $('.site-header').addClass('shrink');
        }
        else {
            $('.site-header').removeClass('shrink');
        }
    });
    function getCurrentScroll() {
        return window.pageYOffset || document.documentElement.scrollTop;
    }
    
    //==== Home ====//
    
    //Banner    
    $("#main-banner").owlCarousel({
        singleItem : true,
        pagination : true,
        navigation : true,
        autoPlay : true,
        navigationText: ["<i class='icon-banner-arrow-left'></i>","<i class='icon-banner-arrow-right'></i>"]
    });
    
    //Client Say    
    $("#client-say").owlCarousel({
        singleItem : true,
        pagination : true,
        navigation : false,
        autoPlay : false,
        navigationText: ["<i class='icon-banner-arrow-left'></i>","<i class='icon-banner-arrow-right'></i>"]
    });
    
    //Client Say    
    $("#client-testimonial").owlCarousel({
        items :3,
        itemsDesktop : [1024,3],
        pagination : false,
        navigation : true,
        autoPlay : true,
        navigationText: ["<i class='icon-banner-arrow-left'></i>","<i class='icon-banner-arrow-right'></i>"]
    });  
    
    $(".video-item-wrap").owlCarousel({
        autoPlay: 3000,
        items : 4,
        dragBeforeAnimFinish: false,
        mouseDrag: true,
        touchDrag: true,
        autoPlay: false,
        navigation : false,
        pagination : false,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],
        itemsTablet: [600,1]
      });
    
});
