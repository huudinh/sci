<?php
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
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link type="image/x-icon" rel="shortcut icon" href="/css/lib/favicon.png">
	<?php 
	  if(is_search()){
		echo '<meta name="googlebot" content="noindex">'; } 
	?>
	<title><?php wp_title() ?></title>
	<?php wp_head(); ?>
	<?php 
	// fix duplicate listing add noindex automatically to date, author and tag archives
	// if($paged > 1 || is_author() || is_tag() || is_date() || is_attachment()){
	// 	echo '<meta name="robots" content="noindex,nofollow" />'; } 
	?>
	<?php include(locate_template('Module/media/css/style_css.php')); ?>
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
	<style>
        :root {
            --primary-font: "Raleway", sans-serif;
            --secondary-font: Roboto, system-ui, -apple-system, "Segoe UI",
                "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif,
                "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }        
		body{padding-top:100px;}
		#toc_container{list-style:none;margin:10px 0;padding:10px;border:1px solid #ccc;background:#eee;margin-bottom:10px!important}
		#toc_container li a{padding:2px 5px; font-weight:normal;display:block;font-size:15px}
        .modal-btn {cursor: pointer;}
		.header_sci_1_0_0{background:rgb(35, 134, 199)!important}
		main{margin-bottom:20px;}
		@media (min-width: 1441px) {
            .container {width: 80%;}
        }
		@media (max-width:912px){
			body{padding-top:62px;}
		}
	</style>
</head>
<body>
<?php get_template_part('Module/module_header'); ?>