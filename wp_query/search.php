<?php 
    if(is_search()){
        $string = esc_html( $_GET['s'] );
        $result = preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($string));
        $allsearch = new WP_Query("s=$s&showposts=-1"); 
        $key = wp_specialchars($s, 1); 
        $count = $allsearch->post_count; 
        echo '
            <h1 class="cate_1_0_0__title">Tìm kiếm</h1>
            <p>Kết quả tìm được với từ khóa <b style="color:#f26649"> '.$result.' </b> có <b style="color:#f26649">'.$count.'</b> bài viết
        ';
        wp_reset_query();
    } else {
        echo '<h1 class="cate_1_0_0__title">'.single_cat_title().'</h1>';
    }
?>