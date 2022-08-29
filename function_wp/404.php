<?php
// redirect trang chủ
    Header( "HTTP/1.1 301 Moved Permanently" );
    Header("Location: ".home_url()."");


// redirect html
<meta http-equiv="refresh" content="0; url=https://benhvienthammykangnam.com.vn/kien-thuc-lam-dep/kangnam-khai-truong/?utm_source=youtube&utm_medium=ctw&utm_campaign=thuonghieu" />    
<meta http-equiv="refresh" content="0;URL='<?php echo esc_url( home_url( '/' ) ); ?>'" /> 

// Redirect PHP
$url = 'https://benhvienthammykangnam.com.vn';
Header( "HTTP/1.1 301 Moved Permanently" );
Header("Location: ".$url."");
