<?php
	'id_voucher_vpl_1_0_0' => array(
		'key' => 'id_voucher_vpl_1_0_0',
		'name' => 'voucher_vpl_1_0_0',
		'label' => 'Voucher 1.0.0',
		'display' => 'block',
		'sub_fields' => array(
			array(
				'key' => 'id_voucher_vpl_1_0_0_sub1',
				'label' => 'Địa danh khuyễn mãi',
				'name' => 'voucherPlace',
				'type' => 'flexible_content',
				'layouts' => array(
					'layout_content' => array(
						'key' => 'id_voucher_vpl_1_0_0_sub1_layout1',
						'name' => 'voucherPlaceContent',
						'label' => 'Voucher',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'id_voucher_vpl_1_0_0_sub1_layout1_sub1',
								'label' => 'Tiêu đề',
								'name' => 'voucherPlaceContentTitle',
								'type' => 'text',
							),
							array(
								'key' => 'id_voucher_vpl_1_0_0_sub1_layout1_sub2',
								'label' => 'Nội dung',
								'name' => 'slider',
								'type' => 'repeater',
								'layout' => 'table',
								'sub_fields' => array(
									array(
										'key' => 'id_voucher_vpl_1_0_0_sub1_layout1_sub2_sub1',
										'label' => '',
										'name' => 'voucherPlaceContentTitleInfo',
										'type' => 'textarea',
										'instructions' => '1. Tên Voucher | 2. Giá | 3. Liên kết | 4. Link ảnh',
										'rows' => 2,
									),
								),
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
		),
	), 



		/* Code lấy Flexible-Content */
		foreach($field['voucherPlace'] as $key => $value):
			$voucherPlace = $value['voucherPlaceContentTitle'];
			$rows = $value['slider'];
			
			foreach($rows as $row):
				$info = explode(' | ', $row['voucherPlaceContentTitleInfo']);
				echo $info[0];
			endforeach;
			
		endforeach;
?>