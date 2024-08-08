<?php
header('Access-Control-Allow-Origin: *'); 
define('WP_USE_THEMES', false);
require('../../wp-load.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<?php

$args = array(  
    'post_type' => 'doi-ngu-bac-si',
    'post_status' => 'publish',
    'posts_per_page' => -1, 
    'orderby' => 'title', 
    'order' => 'ASC',
);

$loop = new WP_Query( $args ); 

$published_posts = wp_count_posts('doi-ngu-bac-si')->publish;


echo '[';
$num = 0;
while ( $loop->have_posts() ) : $loop->the_post(); 

    $kim = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');            
    $img = ($kim[0]!='')?$kim[0]:catch_that_image($post->ID);
    // $date = get_the_date();
    // $excerpt = wp_trim_words( get_the_excerpt($post->ID), 120 );
    $title = get_the_title();
    $bs_info = get_field('bs_info');
    $pos = get_field('pos');
    $experience = get_field('experience');
    $degree = get_field('degree');
    $num = $num + 1;
    $url = get_permalink($post->ID);
    echo '
        {
            "id": '.$num.',
            "degree": "'.$degree.'",
            "name": "'.$title.'",
            "pos": "'.$pos.'",
            "experience": "'.$experience.'",
            "image": "'.$img.'",
            "category": "'.$bs_info.'",
            "url": "'.$url.'"
        }
    ';
    if ($num < $published_posts){
        echo ',';
    }
endwhile;

echo ']';

wp_reset_postdata(); 
?>