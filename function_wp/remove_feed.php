<?php
//Disable RSS Feed
function fb_disable_feed() {
    wp_die( __('RSS Feed hiện tại không khả dụng vui lòng &amp;lt;a href="'. get_bloginfo('url') .'"&amp;gt;Trở lại trang chủ&amp;lt;/a&amp;gt;!') );
    }
    add_action('do_feed', 'fb_disable_feed', 1);
    add_action('do_feed_rdf', 'fb_disable_feed', 1);
    add_action('do_feed_rss', 'fb_disable_feed', 1);
    add_action('do_feed_rss2', 'fb_disable_feed', 1);
    add_action('do_feed_atom', 'fb_disable_feed', 1);
    add_action('do_feed_rss2_comments', 'fb_disable_feed', 1);
    add_action('do_feed_atom_comments', 'fb_disable_feed', 1);