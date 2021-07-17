<?php
	define('WP_USE_THEMES', false);
	include_once $_SERVER['DOCUMENT_ROOT'].('/wp-load.php');
	error_reporting(E_ALL ^ E_NOTICE);
	
	if(!$_GET['view']){
		//Silent is Golden
		exit();
	}
	
	$theme_dir = '/wp-json/acf/v3/pages/';
  $url = get_site_url();
	$file = $url.$theme_dir.$_GET['view'];
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>JSON VIEW</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="cate/dist/jsonview.bundle.css" />
</head>
<body>
  <div class="root"></div>

  <script src="cate/dist/jsonview.bundle.js"></script>
  <script type="text/javascript">
    fetch(<?php echo "'".$file."'"; ?>)
    .then((res)=> {
      return res.text();
    })
    .then((data) => {
      const tree = JsonView.createTree(data);
      JsonView.render(tree, document.querySelector('.root'));
      JsonView.expandChildren(tree);
    })
    .catch((err) => {
      console.log(err);
    })

  </script>
</body>
</html>