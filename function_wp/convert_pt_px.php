<?php
if ( ! function_exists( 'dinhtrieu_mce_text_sizes' ) ) {
    function dinhtrieu_mce_text_sizes( $initArray ){
        $initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 17px 18px 19px 20px 21px 24px 28px 32px 36px";
        return $initArray;
    }
    add_filter( 'tiny_mce_before_init', 'dinhtrieu_mce_text_sizes', 99 );
}