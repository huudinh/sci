<?php
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Cấu hình Website',
		'menu_slug' 	=> 'theme-general-settings',
		// 'capability'	=> 'edit_theme_options',
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Home Box Settings',
		'menu_title'	=> 'Trang chủ',
        'parent_slug'	=> 'theme-general-settings',
        'capability'	=> 'edit_theme_options',
    ));
    acf_add_options_sub_page(array(
		'page_title' 	=> 'Tool Settings',
		'menu_title'	=> 'Công Cụ Hỗ Trợ',
        'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Code Checking Settings',
		'menu_title'	=> 'Code Checking',
        'parent_slug'	=> 'theme-general-settings',
        'capability'	=> 'edit_theme_options',
	));
}