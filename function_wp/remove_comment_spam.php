<?php
    function verify_comment_referer() {
        if (!wp_get_referer()) {
            wp_die( __('You cannot post comment at this time,may be you need to enable referrers in your browser.') );
        }
    }
    add_action('check_comment_flood', 'verify_comment_referer');
?>