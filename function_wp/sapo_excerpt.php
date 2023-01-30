<?php
// fix excerpt cate
add_filter('the_excerpt', 'do_shortcode');
remove_filter('get_the_excerpt', 'wp_trim_excerpt', 10);
add_filter('get_the_excerpt', 'my_custom_wp_trim_excerpt', 90, 1);
function my_custom_wp_trim_excerpt($text) {
    if(''==$text) {
        $text= preg_replace('/\s/', ' ', wp_strip_all_tags(get_the_content('')));
        $text= explode(' ', $text, 50);
        array_pop($text);
        $text= implode(' ', $text);
        $trimmed = trim($text, '[sapo]');
    }
    return $trimmed;
}