
    <script>
        //Fix Clone Item
        var service_4_0_0_slide = tns({
            container: ".service_4_0_0_slide",
            items: 1,
            loop: false,
            mode: "gallery",
            slideBy: "page",
            mouseDrag: true,
            rewind: true,
            nav: false,
            controls: false,
            animateIn: "fadeIn",
            animateOut: "fadeOut",
            speed: 800,
            autoplayButton: false,
            autoplayButtonOutput: false,
            responsive: {
                0: {
                    items: 1,
                    autoplay: !0,
                    loop: !0,
                    autoplayTimeout: 5e3
                },
                414: {
                    items: 1,
                    autoplay: !0,
                    loop: !0,
                    autoplayTimeout: 5e3
                },
                768: {
                    items: 2
                },
                1024: {
                    items: 3
                }
            }
        });
    </script>
