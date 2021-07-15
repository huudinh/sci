<?php 
	/* Template Name: Page Home
	* Template Post Type: page */

  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

  //or, if you DO want a file to cache, use:
  header("Cache-Control: max-age=31557600"); //30days (60sec  60min  24hours * 30days)
?>

<!DOCTYPE html>
<html lang="vi">

<head itemscope="" itemtype="http://schema.org/WebSite">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include(locate_template("media/css/style_css.php")); ?>

  <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
  <title><?php wp_title(); ?></title>
  <?php //wp_head(); ?>

</head>

<body itemscope="" itemtype="http://schema.org/WebPage">
<?php 
  get_template_part('Module/module_header');
?>



<?php
  get_template_part('Module/filter_template');	
  get_template_part('Module/module_footer');
?>

</body>
<?php do_action( 'theme_js' ); ?>
<?php //wp_footer(); ?>