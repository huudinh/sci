<section class="question_knhd_1_0_0">
    <?php
        // Lấy trang hiện tại
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        // Tạo truy vấn để lấy các bài viết mới nhất
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 10, // Số lượng bài viết mỗi trang
            'paged' => $paged
        );
        $query = new WP_Query($args);

        // Kiểm tra nếu có bài viết
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                    $kim = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');            
                    $img = ($kim[0]!='')?$kim[0]:catch_that_image();
                    $excerpt = wp_trim_words( get_the_excerpt(), 30 );
                    $comment = wp_count_comments()->approved;
                    // Get Categories
                    $cat = get_the_category();
                    $cate = $cat[0]->name;
                    $cate_link = '/hoi-dap/'.$cat[0]->slug;
                    $question = wp_trim_words(get_field('noi_dung_cau_hoi'), 30);
                    $name = get_field('ho_ten');
                    // $avatar = get_field('avatar');
                    $avatar = '/hoi-dap/wp-content/themes/KnAnser2024/Module/Category/cateList_knhd_1_0_0/images/avatar.png';
                    $ngay_gui = get_field('ngay_gui');

                    // Kiểm tra nếu ngày gửi không có lấy ngày đăng
                    if($ngay_gui == '') {
                        $ngay_gui = get_the_date('d/m/Y');
                    }

                    // Lấy lượt bình luận
                    $count_comment = get_comments_number();

                    // Khai báo lượt xem
                    $pageview = get_post_meta(get_the_ID(),'pageview',true);
                    if($pageview =="") $pageview ="0";

                    echo '
                        <article class="question_knhd_1_0_0__item">
                            <h2 class="question_knhd_1_0_0__title"><a href="'.get_permalink().'">'.get_the_title().'</a></h2>
                            <div class="question_knhd_1_0_0__meta">
                                <div class="question_knhd_1_0_0__info">
                                    <div class="question_knhd_1_0_0__avatar"><img width="40" height="40" src="'.$avatar.'" alt="'.$name.'"></div>
                                    <div class="question_knhd_1_0_0__name">'.$name.'</div>
                                    <a href="'.$cate_link.'" class="question_knhd_1_0_0__cate">'.$cate.'</a>
                                </div>
                                <div class="question_knhd_1_0_0__date">Đã hỏi: <span>'.$ngay_gui.'</span></div>
                            </div>                    
                            <div class="question_knhd_1_0_0__content">'.$question.'</div>
                            <div class="question_knhd_1_0_0__action">
                                <div>
                                    <a href="'.get_permalink().'" class="question_knhd_1_0_0__comment">
                                        <span class="question_knhd_1_0_0__icon question_knhd_1_0_0__icon--1"></span>
                                        <span>'.$count_comment.' Bình luận</span>
                                    </a>
                                    <a href="'.get_permalink().'" class="question_knhd_1_0_0__view">
                                        <span class="question_knhd_1_0_0__icon question_knhd_1_0_0__icon--2"></span>
                                        <span>'.$pageview.' Lượt xem</span>
                                    </a>
                                </div>
                            </div>
                        </article>
                    ';
            endwhile;
        else:
            echo '<p>No posts found.</p>';
        endif;

        // Reset post data
        wp_reset_postdata();
    ?>
</section>