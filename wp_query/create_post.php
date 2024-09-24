<?php
// Đảm bảo rằng bạn đã kết nối với WordPress
require_once('wp-load.php');

// Tạo dữ liệu cho bài viết mới
$new_post = array(
    'post_title'    => 'Tiêu đề bài viết',
    'post_content'  => 'Nội dung bài viết',
    'post_status'   => 'publish', // Trạng thái bài viết: 'publish', 'draft', 'pending', etc.
    'post_author'   => 1, // ID của tác giả
    'post_category' => array(1) // ID của chuyên mục
);

// Chèn bài viết vào cơ sở dữ liệu
$post_id = wp_insert_post($new_post);

// Kiểm tra xem bài viết đã được tạo thành công chưa
if ($post_id) {
    echo 'Bài viết đã được tạo thành công với ID: ' . $post_id;
} else {
    echo 'Có lỗi xảy ra khi tạo bài viết.';
}
?>