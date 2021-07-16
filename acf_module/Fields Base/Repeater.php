<?php
    array(
        'key' => 'id_header_8_0_0_sub2',
        'label' => 'Chi nhánh',
        'name' => 'header_place',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
        ),
        'hide_admin' => 0,
        'collapsed' => '',
        'min' => 0,
        'max' => 0,
        'layout' => 'table',
        'button_label' => '',
        'sub_fields' => array(
            array(
                'key' => 'id_header_8_0_0_sub2_sub1',
                'label' => 'Chi nhánh',
                'name' => 'place_city',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'hide_admin' => 0,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'id_header_8_0_0_sub2_sub2',
                'label' => 'Link Url',
                'name' => 'place_url',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'hide_admin' => 0,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
    ),
?>

<!-- Hiển thị Frontend -->

<select>
    <option value="">CHỌN CHI NHÁNH</option>
    <?php 
        $rows = $field["header_place"];
        foreach($rows as $row):
            $place_city = $row['place_city'];
            $place_url = $row['place_url'];
            echo '<option value="'.$place_url.'">'.$place_city.'</option>';
        endforeach;
    ?>
</select>

