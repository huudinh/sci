<?php
	array(
		'key' => 'field_5d7b229169bf4',
		'label' => 'Thông Tin',
		'name' => 'info',
		'type' => 'textarea',
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
		'maxlength' => '',
		'rows' => 4,
		'new_lines' => '',
	),

	// Get Field basic
	$product_info = get_field('product_info');

	/* Code lấy Field Module */ 
	$field['service_title'];

	// Lấy Field Select từ Cate
	$cate_group = get_field( 'cate_group', 'category_'.$ID );	
?>