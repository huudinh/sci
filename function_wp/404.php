<!-- redirect html -->
<meta http-equiv="refresh" content="0; url=https://benhvienthammykangnam.com.vn/kien-thuc-lam-dep/kangnam-khai-truong/?utm_source=youtube&utm_medium=ctw&utm_campaign=thuonghieu" />    
<meta http-equiv="refresh" content="0;URL='<?php echo esc_url( home_url( '/' ) ); ?>'" /> 

<?php
// redirect trang chủ
Header( "HTTP/1.1 301 Moved Permanently" );
Header("Location: ".home_url()."");



// Redirect PHP
$url = 'https://benhvienthammykangnam.com.vn';
Header( "HTTP/1.1 301 Moved Permanently" );
Header("Location: ".$url."");

// Lấy URL hiện tại
$request_uri = $_SERVER['REQUEST_URI'];

// Chuyển hướng 301 đến URL mới
header("HTTP/1.1 301 Moved Permanently");
header("Location: https://benhvienthammykangnam.com.vn/hoi-dap/" . $request_uri);
exit();
?>
