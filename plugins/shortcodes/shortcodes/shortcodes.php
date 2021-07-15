<?php

// Check Screen -------------------------------------------------------------------------- >	
function screen_shortcode( $atts ) {

    static $count = 0;
    $count++;

	return '
        <div class="screen load" data-screen="'.$count.'"></div>
        ';
}
add_shortcode( 'screen', 'screen_shortcode' );

add_action('wp_footer', 'checkScreen');
function checkScreen(){ 
	if ( is_single() ) {
        echo '
            <script>
                $(document).ready(function() {
                    $(window).scroll(function(){
                        $(".screen.load").each(function() {
                            var data = $(this).data("screen");
                            var screenTop = $(this).offset().top;
                            var windowTop = $(window).scrollTop();
                            if (screenTop < windowTop) {
                                $(this).removeClass("load");
                                $(this).addClass("loaded");
                                gtag("event", "event_screen_"+data, { event_category: "a_screen_"+data, event_label: "label_screen_"+data });
                                console.log("done");
                            } 
                        });
                    });
                });
            </script>
        ';
	}
};	

