<?php
                            'id_header_dls_1_0_0' => array(
                                'key' => 'id_header_dls_1_0_0',
                                'name' => 'header_dls_1_0_0',
                                'label' => 'Header 1.0.0',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'id_header_dls_1_0_0_tab1',
                                        'label' => 'Thông Tin Chung',
                                        'type' => 'tab',
                                    ),
                                    array(
                                        'key' => 'id_header_dls_1_0_0_tab1_sub1',
                                        'name' => 'info',
                                        'type' => 'textarea',
                                        'rows' => 3,
                                    ),
                                    array(
                                        'key' => 'id_header_dls_1_0_0_tab2',
                                        'label' => 'Cài Đặt Menu',
                                        'type' => 'tab',
                                    ),
                                    array(
                                        'key' => 'id_header_dls_1_0_0_sub1',
                                        'label' => 'Menu',
                                        'name' => 'id_header_dls_1_0_0_sub1',
                                        'type' => 'flexible_content',
                                        'layouts' => array(
                                            'id_header_dls_1_0_0_sub1_layout1' => array(
                                                'key' => 'id_header_dls_1_0_0_sub1_layout1',
                                                'name' => 'menu_don',
                                                'label' => 'Menu Đơn',
                                                'display' => 'row',
                                                'sub_fields' => array(
                                                    array(
                                                        'key' => 'id_header_dls_1_0_0_sub1_layout1_sub',
                                                        'label' => 'Tên Menu',
                                                        'name' => 'title',
                                                        'type' => 'textarea',
                                                        'instructions' => 'Tên Menu | Link ',
                                                        'rows' => 2,
                                                    ),
                                                ),
                                            ),
                                            'id_header_dls_1_0_0_sub1_layout2' => array(
                                                'key' => 'id_header_dls_1_0_0_sub1_layout2',
                                                'name' => 'menu_sub',
                                                'label' => 'Menu Sub',
                                                'display' => 'row',
                                                'sub_fields' => array(
                                                    array(
                                                        'key' => 'id_header_dls_1_0_0_sub1_layout2_sub1',
                                                        'label' => 'Menu Cha',
                                                        'name' => 'title',
                                                        'type' => 'textarea',
                                                        'instructions' => 'Tên Menu | Link ',
                                                        'rows' => 2,
                                                    ),
                                                    array(
                                                        'key' => 'id_header_dls_1_0_0_sub1_layout2_sub2',
                                                        'label' => 'Sub Menu',
                                                        'name' => 'col1',
                                                        'type' => 'wysiwyg',
                                                        'instructions' => 'Sử dụng groups UL>LI + Enter để tạo cột',
                                                        'default_value' => '',
                                                        'tabs' => 'all',
                                                        'toolbar' => 'full',
                                                        'media_upload' => 1,
                                                        'delay' => 0,
                                                    ),
                                                ),
                                            ),
                                            'id_header_dls_1_0_0_sub1_layout3' => array(
                                                'key' => 'id_header_dls_1_0_0_sub1_layout3',
                                                'name' => 'menu_sub_full',
                                                'label' => 'Mega Menu',
                                                'display' => 'row',
                                                'sub_fields' => array(
                                                    array(
                                                        'key' => 'id_header_dls_1_0_0_sub1_layout3_sub1',
                                                        'label' => 'Menu cha',
                                                        'name' => 'title',
                                                        'type' => 'textarea',
                                                        'instructions' => '
                                                            Dòng 1 : Tên menu <br>
                                                            Dòng 2 : Link <br>
                                                            Dòng 3 : Số cột <br>
                                                        ',
                                                        'rows' => 3,
                                                    ),
                                                    array(
                                                        'key' => 'id_header_dls_1_0_0_sub1_layout3_sub2',
                                                        'label' => 'Sub Menu',
                                                        'name' => 'col1',
                                                        'type' => 'wysiwyg',
                                                        'instructions' => 'Sử dụng groups UL>LI + Enter để tạo cột',
                                                        'required' => 0,
                                                        'tabs' => 'all',
                                                        'toolbar' => 'full',
                                                        'media_upload' => 1,
                                                        'delay' => 0,
                                                    ),
                                                ),
                                            ),
                                        ),
                                        'button_label' => 'Thêm Menu',
                                    ),
                                ),
                                'min' => '',
                                'max' => '',
                            ),

?>