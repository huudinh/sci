<?php
// Khai bao css
    $type = 'Home';
    $name = 'news_12_3_0';
    $link_module = 'Module/'.$type.'/'.$name.'/';
    $path = get_template_directory_uri();
    $path = $path.'/'.$link_module;

    include(locate_template("Module/Home/news_12_1_0/css/news_12_1_0_css.php")); 
?>