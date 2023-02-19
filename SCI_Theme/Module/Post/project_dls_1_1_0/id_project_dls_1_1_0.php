<?php
                            'id_project_dls_1_1_0' => array(
                                'key' => 'id_project_dls_1_1_0',
                                'name' => 'project_dls_1_1_0',
                                'label' => 'Project 1.0.0',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'id_project_dls_1_1_0_sub1',
                                        'label' => 'Nội dung',
                                        'name' => 'project',
                                        'type' => 'repeater',
                                        'layout' => 'block',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'id_project_dls_1_1_0_sub1_sub1',
                                                'label' => 'Tiêu đề',
                                                'name' => 'project_title',
                                                'type' => 'text',
                                            ),
                                            array(
                                                'key' => 'id_project_dls_1_1_0_sub1_sub2',
                                                'label' => 'Mô tả',
                                                'name' => 'project_content',
                                                'type' => 'textarea',
                                                'rows' => 3,
                                            ),
                                            array(
                                                'key' => 'id_project_dls_1_1_0_sub1_sub3',
                                                'label' => 'Photo',
                                                'name' => 'project_photo',
                                                'type' => 'gallery',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
?>