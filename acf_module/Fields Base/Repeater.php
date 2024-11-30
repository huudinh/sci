<?php
    // test
    'id_slider_pr_2_0_0' => array(
        'key' => 'id_slider_pr_2_0_0',
        'name' => 'slider_pr_2_0_0',
        'label' => 'Slider (slider_pr_2_0_0)',
        'display' => 'block',
        'sub_fields' => array(
            array(
                'key' => 'id_slider_pr_2_0_0_sub2',
                'label' => '',
                'name' => 'slide',
                'type' => 'repeater',
                'instructions' => '',
                'layout' => 'table',
                'sub_fields' => array(
                    array(
                        'key' => 'id_slider_pr_2_0_0_sub2_sub1',
                        'label' => '',
                        'name' => 'img',
                        'type' => 'textarea',
                        'instructions' => 'Dòng 1: Tên Slider, 2: Link ảnh PC (Size 1920x700), 3: Link ảnh MB (size 428x700), 4: Link chiến dịch',
                        'rows' => 4,
                    ),
                ),
                
            ),
        ),
        'min' => '',
        'max' => '',
    ),


    // Show code
    $rows = $field["slide"];
    foreach($rows as $row):
        $data = explode("\n",  $row["img"]);
        echo '
            <div class="slider_pr_2_0_0__itemSlide">
                <a class="slider_pr_2_0_0__item" href="'.$data[3].'">
                    <picture>
                        <source media="(min-width: 767px)" width="1440" height="606" srcset="'.$data[1].'">
                        <img width="428" height="250" src="'.$data[2].'" alt="'.$data[0].'">
                    </picture>
                </a>
            </div>
        ';
    endforeach;


    // Test full
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

