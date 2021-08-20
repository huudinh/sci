<?php

//* Disable Gutenberg stylesheet in front
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );

//Update JQuery 
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);

function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

/** Remove jQuery From WordPress */
function my_init() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', false);
    }
}
add_action('init', 'my_init');

// Remove Emoji
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


//* Remove WP Embed Script
function stop_loading_wp_embed() {
    if (!is_admin()) {
        wp_deregister_script('wp-embed');
    }
}
add_action('init', 'stop_loading_wp_embed');

// Remove the REST API endpoint.
remove_action( 'rest_api_init', 'wp_oembed_register_route' );

// Turn off oEmbed auto discovery.
add_filter( 'embed_oembed_discover', '__return_false' );

// Don't filter oEmbed results.
remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

// Remove oEmbed discovery links.
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

// Remove oEmbed-specific JavaScript from the front-end and back-end.
remove_action( 'wp_head', 'wp_oembed_add_host_js' );

// Cai thien hieu suat cuon trang / Does not use passive listeners to improve scrolling performance
function add_script_fix_devgg(){ ?>
    <script>
        (function() {
            var supportsPassive = eventListenerOptionsSupported();
            
            if (supportsPassive) {
                var addEvent = EventTarget.prototype.addEventListener;
                overwriteAddEvent(addEvent);
            }
        
            function overwriteAddEvent(superMethod) {
                var defaultOptions = {
                    passive: true,
                    capture: false
                };
        
                EventTarget.prototype.addEventListener = function(type, listener, options) {
                    var usesListenerOptions = typeof options === 'object';
                    var useCapture = usesListenerOptions ? options.capture : options;
                    
                    options = usesListenerOptions ? options : {};
                    options.passive = options.passive !== undefined ? options.passive : defaultOptions.passive;
                    options.capture = useCapture !== undefined ? useCapture : defaultOptions.capture;
                    
                    superMethod.call(this, type, listener, options);
                };
            }
        
            function eventListenerOptionsSupported() {
                var supported = false;
                try {
                    var opts = Object.defineProperty({}, 'passive', {
                        get: function() {
                            supported = true;
                        }
                    });

                    window.addEventListener("test", null, opts);
                } catch (e) {}
            
                return supported;
            }
        })();
    </script>
<?php }
    
add_action('wp_footer', 'add_script_fix_devgg');