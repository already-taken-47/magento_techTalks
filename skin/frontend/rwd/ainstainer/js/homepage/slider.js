jQuery(document).ready(function($) {

    var page_title =  $('div.page-title');
    page_title.find('img').wrap('<div class="item"></div>');
    page_title.wrapInner('<div class="main-page-slider">');

    $('.main-page-slider').owlCarousel({
        loop: true,
        nav: false,
        lazyLoad: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        autoplaySpeed: 1000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

} );
