<?php 
	/* Template Name: Page Site
	* Template Post Type: page
    */       
// Custom thông báo bảo trì
// if (!is_user_logged_in()){
// 	echo '<div style="text-align:center; padding: 50px 0; min-height: 500px;">Website đang trong quá trình bảo trì, vui lòng quay lại sau !
// 		Rất xin lỗi vì sự bất tiện này !</div>
// 	';
// 	exit();
// } 
//set headers to NOT cache a page
header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
header("Pragma: no-cache"); //HTTP 1.0
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

//or, if you DO want a file to cache, use:
header("Cache-Control: max-age=31557600"); //30days (60sec  60min  24hours * 30days)

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <?php 
    if (current_user_can('administrator') || current_user_can('editor')) {
      wp_admin_bar_render();
      echo '
        <meta name="robots" content="noindex,follow"/>
        <link id="pagestyle" rel="stylesheet" type="text/css" href="/wp-includes/css/admin-bar.min.css?ver=4.9.10" />
        <link id="pagestyle" rel="stylesheet" type="text/css" href="/wp-includes/css/dashicons.min.css?ver=4.9.10" />
      ';
    }
  ?>
    <meta charset="UTF-8">
	<link type="image/x-icon" rel="shortcut icon" href="/css/lib/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title() ?></title>
    <?php wp_head(); ?>
    <?php
        include(locate_template('Module/assets/sass/lib_css.php')); 
        include(locate_template('Module/assets/sass/custom_css.php')); 
    ?>
    
</head>

<body>
    <main class="main_dls_1_0_0 main_dls_1_0_0--page">
        <div class="main_dls_1_0_0__item main_dls_1_0_0__item--col main_dls_1_0_0__item--left"></div>
        <div class="main_dls_1_0_0__item main_dls_1_0_0__item--col main_dls_1_0_0__item--right"></div>    

        <?php get_template_part('Module/module_header'); ?>
        
        <?php 
            get_template_part('Module/Category/breadcrumb_dls_1_0_0/breadcrumb_dls_1_0_0');	
            get_template_part('Module/module');	
            get_template_part('Module/module_footer');
        ?>
    </main>
</body>