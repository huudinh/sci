<?php 
	array(
		'key' => 'id_about_1_0_0_sub1',
		'label' => 'Tiêu đề',
		'name' => 'about_title',
		'type' => 'text',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => array(
			'width' => '',
			'class' => '',
			'id' => '',
		),
		'default_value' => '',
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
		'maxlength' => '',
	)

	// Get Field basic
	$product_info = get_field('product_info');

	/* Code lấy Field Module */ 
	$field['service_title'];

	// Lấy Field Select từ Cate
	$cate_group = get_field( 'cate_group', 'category_'.$ID );	
?>