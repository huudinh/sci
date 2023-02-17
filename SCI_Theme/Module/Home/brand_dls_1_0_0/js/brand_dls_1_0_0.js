var slide_step = tns({
    container: '#slide_step',
    items: 3,
    controlsContainer: '#slide_stepControl',
    navAsThumbnails: true,
    autoplay: false,
    autoplayTimeout: 1000,
    autoplayButton: '#customize-toggle',
    gutter: 10,
    nav:false,
    responsive: {
    0: {
        items: 1,
    },
    768: {
        items: 2,
    },
    820: {
        items: 2,
    },
    1024: {
        items: 3,
    }
},
});