var slider_pro = tns({
    container: '.slider_pro',
    items: 1,
    controlsContainer: '#slider-contPro',
    navContainer: '#slider_navpro',
    navAsThumbnails: true,
    autoplay: false,
    autoplayTimeout: 1000,
    gutter: 10,
});
var slider_navpro = tns({
    container: '.slider_navpro',
    items: 3,
    controlsContainer: '#slider-contPro2',
    slideBy: 'page',
    autoplay: false,
    loop:true,
    mouseDrag: true,
    lazyload: true,
    lazyloadSelector: '.tns-lazy',
    gutter: 10,
    nav:false,

});