<?php
// Field cate_field.php
if( function_exists('acf_add_local_field_group') ):
    acf_add_local_field_group(array(
        'key' => 'group_61f13019f064a',
        'title' => 'Cate',
        'fields' => array(
            array(
                'key' => 'field_61f0cd4cba3ce',
                'label' => 'Chọn giao diện',
                'name' => 'cate_type',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'default' => 'Mặc định',
                    'brand' => 'Thương hiệu',                    
                ),
                'default_value' => false,
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'category',
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
        'show_in_rest' => 0,
    ));
endif;		

// Archive.php

$category = get_queried_object();
$category_id = $category->term_id;

$typecate = get_field('cate_type', 'category_'.$category_id);

if ($typecate == 'default'):
    get_template_part('Module/Category/news_3_0_0/news_3_0_0');
endif;

if (($typecate == 'brand') || ($typecate == '') || ($typecate == 'new_2')):
    get_template_part('Module/Category/news_3_2_0/news_3_2_0');
endif;