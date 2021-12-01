<?php
// Khai bao css
    $path = get_template_directory_uri();
    $path = $path.'/Module/Home/news_12_1_0';

    include(locate_template("Module/Home/news_12_1_0/css/news_12_1_0_css.php")); 
    
    add_action( 'theme_js', 'seach_2_0_0_js' );

    function seach_2_0_0_js(){
        echo '
           <script>
           </script>
        ';
    }

    // Check API /viewjson/?view=14
?>