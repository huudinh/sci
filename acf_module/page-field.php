<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5da6d2fa826bb',
	'title' => 'Cấu Hình Module',
	'fields' => array(
		array(
			'key' => 'field_5da6d3a2c1f03',
			'label' => 'Page Field',
			'name' => 'page_field',
			'type' => 'flexible_content',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layouts' => array(
				/* Them Field*/
				
				/* End Them Field */
			
			),
			'button_label' => 'Section Mới',
			'min' => '',
			'max' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;

?>		

<?php
// Code Groups Module
                            /*COUNTDOWN LANDING*/
                            'countdown_ld' => array(
                                'key' => 'countdown_ld',
                                'name' => 'countdown_ld',
                                'label' => 'Countdown Landing',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'countdown_ld_sub_fields',
                                        'label' => '',
                                        'name' => 'countdown_ld_sub_fields',
                                        'type' => 'flexible_content',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'layouts' => array(
                                            // Bat dau Module

 

                                            // End Module
                                        ),
                                        'button_label' => 'Thêm Countdown',
                                        'min' => '',
                                        'max' => '',
                                    ),                     
                                ),
                                'min' => '',
                                'max' => '1',
                            ),
                            /*END COUNTDOWN LANDING*/ 
?>