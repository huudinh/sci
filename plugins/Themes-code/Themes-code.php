<?php
/*
Plugin Name: Themes Code 2.0
Plugin URI: https://www.facebook.com/huudinh85
Description: This is redirect Theme
Version: 2.0
Author: DinhTrieu
Author URI: https://www.facebook.com/huudinh85
*/

add_filter('template', 'change_theme');
add_filter('option_template', 'change_theme');
add_filter('option_stylesheet', 'change_theme');

function change_theme($theme) 
{
	// if(isset($_GET['mobile'])){
	// 	return 'ParisBrand2021_mobile';
	// }else{
	// 	if(my_wp_is_mobile()) {
	// 		return 'ParisBrand2021';
	// 	}else{
	// 		return 'ParisBrand2021';
	// 	}
	// }
	if(isset($_GET['api'])){
		return 'ParisBrand2021_api';
	}elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false){
        return 'ParisBrand2021';
    }else{
        if(!wp_is_mobile()){
            return 'ParisBrand2021';
        }else{
            return 'ParisBrand2021_mobile';
        }
    }
}

// function my_wp_is_mobile() {
//     static $is_mobile;

//     if ( isset($is_mobile) )
//         return $is_mobile;

//     if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
//         $is_mobile = false;
//     } elseif (
//         strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
//         || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
//         || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
//         || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
//         || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false ) {
//             $is_mobile = true;
//     } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') == false) {
//             $is_mobile = true;
//     } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) {
//         $is_mobile = false;
//     } else {
//         $is_mobile = false;
//     }

//     return $is_mobile;
// }

?>