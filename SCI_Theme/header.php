<?php
	//set headers to NOT cache a page
	header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
	header("Pragma: no-cache"); //HTTP 1.0
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

	//or, if you DO want a file to cache, use:
	header("Cache-Control: max-age=31557600"); //30days (60sec  60min  24hours * 30days)
?>	

<!DOCTYPE html lang="vi">
<html xmlns="http://www.w3c.org/1999/xhtml">
<head itemscope="" itemtype="http://schema.org/WebSite">

	<meta charset="UTF-8">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1">   -->
	<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<title><?php wp_title(); ?></title>
	<?php wp_head(); ?>
	<?php include(locate_template('media/css/style.php')); ?>
	<style>
		 #prnew {
            padding-top: 177px;
        }
        @media (max-width: 1024px) {
            #prnew {
                padding-top: 67px;
            }
        }
        @media (max-width: 480px) {
            #prnew {
                padding-top: 85px;
            }
        }
	</style>
</head>
			
<body itemscope="" itemtype="http://schema.org/WebPage">

<?php 
	get_template_part('Module/module_header');
?>