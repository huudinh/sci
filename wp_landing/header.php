<?php
header('Access-Control-Allow-Origin: *'); 
define('WP_USE_THEMES', false);
require('../../wp-load.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>

<style>
    <?php 
        include(locate_template('Module/assets/sass/custom.min.css'));
        include(locate_template('Module/Regist/popupRegist_drg_1_0_0/sass/popupRegist_drg_1_0_0.min.css'));
    ?>
</style>
<?php    
    get_template_part('Module/module_header');    
?>