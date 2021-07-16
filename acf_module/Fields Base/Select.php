<?php
    array(
        'key' => 'id_sidebar_1_0_0_sub_layout2_sub4',
        'label' => 'Biểu tượng',
        'name' => 'icon',
        'type' => 'select',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array(
            array(
                array(
                    'field' => 'id_sidebar_1_0_0_sub_layout2_sub3',
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
?>