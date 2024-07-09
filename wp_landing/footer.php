<?php
header('Access-Control-Allow-Origin: *'); 
define('WP_USE_THEMES', false);
require('../../wp-load.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<style>
    <?php 
        include(locate_template("Module/Footer/footer_drg_1_0_0/sass/footer_drg_1_0_0.min.css")); 
    ?>
</style>
<?php
get_template_part('Module/module_footer');
?>