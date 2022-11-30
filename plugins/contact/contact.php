<?php
/**
 * Plugin Name: Contact 1.0.0
 * Plugin URI: https://huudinh.github.io/
 * Description: Danh sách liên hệ
 * Version: 1.0
 * Author: Dinh Trieu
 * Author URI: https://www.facebook.com/huudinh85
 * License: GPLv2 
 */
?>

<?php

    function contact_create_menu() {
        add_menu_page('Thông tin liên hệ khách hàng', 'Danh sách liên hệ', 'administrator', __FILE__, 'contact_settings_page', 'dashicons-portfolio', 20);
    }
    add_action('admin_menu', 'contact_create_menu'); 
    
    function contact_settings_page() {
?>
    <style>
        .content{width:100%;height:82vh;border:none;margin-top:10px;}
    </style>
    <div class="wrap">
        <h2>Danh sách liên hệ</h2>
        <iframe class="content" src="https://docs.google.com/spreadsheets/d/1v5rMvso33s7kvZ9Lj11SclCXI9gdCyiCT999bUb0lLI/edit?usp=sharing"></iframe>
   
    </div>
<?php } ?>