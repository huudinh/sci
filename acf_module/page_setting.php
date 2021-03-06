<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5dbba063bd36a',
        'title' => 'WEB SETTING',
        'fields' => array(
			/*GROUP TAB1*/
            array(
                'key' => 'field_setting_tab1',
                'label' => 'Cài Đặt Chung',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
			/*END GROUP TAB1*/
			
			/*GROUP BOX1*/
            array(
                'key' => 'field_setting_box1',
                'label' => 'Setting',
                'name' => 'setting',
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
                    /*BẮT ĐẦU MODULE*/
					
					/*END MODULE*/                    
                ),
                'button_label' => 'Add Row',
                'min' => '',
                'max' => '',
            ),
			/*END GROUP BOX1*/
			
			/*GROUP TAB2*/
            array(
                'key' => 'field_setting_tab2',
                'label' => 'Sidebar',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
			/*END GROUP TAB2*/
			
			/*GROUP BOX2*/
            array(
                'key' => 'field_setting_box2',
                'label' => 'Sidebar',
                'name' => 'sidebar',
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
                    'layout_5d77565ed44af' => array(
                        'key' => 'layout_5d77565ed44af',
                        'name' => 'sidebar_title',
                        'label' => 'Tiêu Đề SideBar',
                        'display' => 'row',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_5d7756da81dac',
                                'label' => 'Tiêu đề chuyên mục',
                                'name' => 'title',
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
                            ),
                            array(
                                'key' => 'field_5d7f493b85a29',
                                'label' => 'Icon chuyên mục',
                                'name' => 'icon_check',
                                'type' => 'true_false',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'message' => '',
                                'default_value' => 0,
                                'ui' => 0,
                                'ui_on_text' => '',
                                'ui_off_text' => '',
                            ),
                            array(
                                'key' => 'field_5d77570281dad',
                                'label' => 'Biểu tượng',
                                'name' => 'icon',
                                'type' => 'select',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'field_5d7f493b85a29',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                    ),
                                ),
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'choices' => array(
                                    'title-1' => 'Icon Dịch Vụ',
                                    'title-2' => 'Icon Ưu Đãi',
                                    'title-3' => 'Icon Tin Tức',
                                    'title-4' => 'Icon Video',
                                ),
                                'default_value' => array(
                                    0 => 'title-1',
                                    1 => 'title-2',
                                    2 => 'title-3',
                                    3 => 'title-4',
                                ),
                                'allow_null' => 0,
                                'multiple' => 0,
                                'ui' => 0,
                                'return_format' => 'value',
                                'ajax' => 0,
                                'placeholder' => '',
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                    'layout_5d77576481dae' => array(
                        'key' => 'layout_5d77576481dae',
                        'name' => 'sidebar_link',
                        'label' => 'Tiêu Đề SideBar [Link]',
                        'display' => 'row',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_5d77576481daf',
                                'label' => 'Tiêu đề chuyên mục',
                                'name' => 'title',
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
                            ),
                            array(
                                'key' => 'field_5d7757a181db1',
                                'label' => 'Link',
                                'name' => 'link',
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
                            ),
                            array(
                                'key' => 'field_5d7f49cefdf07',
                                'label' => 'Icon chuyên mục',
                                'name' => 'icon_check',
                                'type' => 'true_false',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'message' => '',
                                'default_value' => 0,
                                'ui' => 0,
                                'ui_on_text' => '',
                                'ui_off_text' => '',
                            ),
                            array(
                                'key' => 'field_5d77576481db0',
                                'label' => 'Biểu tượng',
                                'name' => 'icon',
                                'type' => 'select',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'field_5d7f49cefdf07',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                    ),
                                ),
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'choices' => array(
                                    'title-1' => 'Icon Dịch Vụ',
                                    'title-2' => 'Icon Ưu Đãi',
                                    'title-3' => 'Icon Tin Tức',
                                    'title-4' => 'Icon Video',
                                ),
                                'default_value' => array(
                                    0 => 'title-1',
                                    1 => 'title-2',
                                    2 => 'title-3',
                                    3 => 'title-4',
                                ),
                                'allow_null' => 0,
                                'multiple' => 0,
                                'ui' => 0,
                                'return_format' => 'value',
                                'ajax' => 0,
                                'placeholder' => '',
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                    'layout_5d7758db81dba' => array(
                        'key' => 'layout_5d7758db81dba',
                        'name' => 'sidebar_sv',
                        'label' => 'Dịch Vụ',
                        'display' => 'row',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_5d7758db81dbb',
                                'label' => 'Danh Sách DV',
                                'name' => 'content',
                                'type' => 'wysiwyg',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'tabs' => 'all',
                                'toolbar' => 'full',
                                'media_upload' => 1,
                                'delay' => 0,
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                    'layout_5d775a0481dbe' => array(
                        'key' => 'layout_5d775a0481dbe',
                        'name' => 'sidebar_new',
                        'label' => 'Tin tức',
                        'display' => 'row',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_5d775a0481dbf',
                                'label' => 'Bài viết quan tâm',
                                'name' => 'content',
                                'type' => 'relationship',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'post_type' => '',
                                'taxonomy' => '',
                                'filters' => array(
                                    0 => 'search',
                                    1 => 'post_type',
                                    2 => 'taxonomy',
                                ),
                                'elements' => '',
                                'min' => '',
                                'max' => '',
                                'return_format' => 'object',
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                    'layout_5d77584d81db6' => array(
                        'key' => 'layout_5d77584d81db6',
                        'name' => 'sidebar_clip',
                        'label' => 'Video Clip',
                        'display' => 'row',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_5d77584d81db7',
                                'label' => 'Ảnh đại diện',
                                'name' => 'image',
                                'type' => 'image',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'library' => 'all',
                                'min_width' => '',
                                'min_height' => '',
                                'min_size' => '',
                                'max_width' => '',
                                'max_height' => '',
                                'max_size' => '',
                                'mime_types' => '',
                            ),
                            array(
                                'key' => 'field_5d77584d81db9',
                                'label' => 'Tiêu đề',
                                'name' => 'title',
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
                            ),
                            array(
                                'key' => 'field_5d77584d81db8',
                                'label' => 'Link Youtube',
                                'name' => 'link',
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
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                    'layout_5d7757ce81db2' => array(
                        'key' => 'layout_5d7757ce81db2',
                        'name' => 'sidebar_photo',
                        'label' => 'Thư Viện Ảnh',
                        'display' => 'row',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_5d7757ce81db3',
                                'label' => 'Album ảnh',
                                'name' => 'content',
                                'type' => 'gallery',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'insert' => 'append',
                                'library' => 'all',
                                'min' => '',
                                'max' => '',
                                'min_width' => '',
                                'min_height' => '',
                                'min_size' => '',
                                'max_width' => '',
                                'max_height' => '',
                                'max_size' => '',
                                'mime_types' => '',
                            ),
                        ),
                        'min' => '',
                        'max' => '',
                    ),
                ),
                'button_label' => 'Add Row',
                'min' => '',
                'max' => '',
            ),
			/*END GROUP BOX2*/
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-cau-hinh-website',
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