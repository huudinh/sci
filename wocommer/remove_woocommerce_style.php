<?php
/** Disable WooCommerce  Styles and Scripts*/
add_action( 'wp_enqueue_scripts', 'dequeue_woocommerce_styles_scripts', 99 );
function dequeue_woocommerce_styles_scripts() {
if ( function_exists( 'is_woocommerce' ) ) {
if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
# Styles
wp_dequeue_style( 'woocommerce-general' );
wp_dequeue_style( 'woocommerce-layout' );
wp_dequeue_style( 'woocommerce-smallscreen' );
wp_dequeue_style( 'woocommerce_frontend_styles' );
wp_dequeue_style( 'woocommerce_fancybox_styles' );
wp_dequeue_style( 'woocommerce_chosen_styles' );
wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
# Scripts
wp_dequeue_script( 'wc_price_slider' );
wp_dequeue_script( 'wc-single-product' );
wp_dequeue_script( 'wc-add-to-cart' );
wp_dequeue_script( 'wc-cart-fragments' );
wp_dequeue_script( 'wc-checkout' );
wp_dequeue_script( 'wc-add-to-cart-variation' );
wp_dequeue_script( 'wc-single-product' );
wp_dequeue_script( 'wc-cart' );
wp_dequeue_script( 'wc-chosen' );
wp_dequeue_script( 'woocommerce' );
wp_dequeue_script( 'prettyPhoto' );
wp_dequeue_script( 'prettyPhoto-init' );
wp_dequeue_script( 'jquery-blockui' );
wp_dequeue_script( 'jquery-placeholder' );
wp_dequeue_script( 'fancybox' );
wp_dequeue_script( 'jqueryui' );
}
}
}
/** Disable WooCommerce  Block Styles */
function disable_woocommerce_block_styles() {
  wp_dequeue_style( 'wc-blocks-style' );
}
add_action( 'wp_enqueue_scripts', 'disable_woocommerce_block_styles' );