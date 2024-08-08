<?
// Danh sách sản phẩm theo id
function display_woocommerce_products_by_ids($product_ids = array()) {
    if (empty($product_ids) || !is_array($product_ids)) {
        return;
    }

    $args = array(
        'post_type' => 'product',
        'post__in' => $product_ids,
        'posts_per_page' => -1, // Hiển thị tất cả sản phẩm trong danh sách ID
    );

    $loop = new WP_Query($args);

    if ($loop->have_posts()) {
        echo '<ul class="products">';
        while ($loop->have_posts()) {
            $loop->the_post();
            wc_get_template_part('content', 'product');
        }
        echo '</ul>';
    } else {
        echo __('No products found');
    }

    wp_reset_postdata();
}

// Ví dụ sử dụng: [sanpham id='4037,3224,3122']
add_shortcode('sanpham', function($atts, $content=null) {
    $id = explode(",", $atts['id']);
    
    ob_start();
    display_woocommerce_products_by_ids($id);
    return ob_get_clean();
});