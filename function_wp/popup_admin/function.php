<?php
// Popup Xác Nhận cập nhật bài viết
function custom_admin_enqueue_scripts($hook) {
    if ($hook === 'post.php' || $hook === 'post-new.php') {
        wp_enqueue_script('custom-admin-popup-script', '/wp-content/themes/astra-child/assets/js/custom-admin-popup.js', array('jquery'), null, true);
    }
}
add_action('admin_enqueue_scripts', 'custom_admin_enqueue_scripts');