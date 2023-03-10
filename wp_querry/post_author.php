<p><?php echo get_the_time('d/m/Y') ?></p>
<p>Tác giả:<a rel="nofollow" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"> <?php echo get_the_author() ?></a></p>
<?php
    $pageview = get_post_meta(get_the_ID(),'pageview',true);
    if($pageview =="") $pageview ="0";
    $pageview = (int)$pageview +1;
    update_post_meta( get_the_ID(), 'pageview', $pageview );
?>
<p><?php echo $pageview ?> lượt xem</p>

<?php
$url = $_SERVER["REQUEST_URI"];
$author_id = get_post_field ('post_author', $cause_id);
$display_name = get_the_author_meta( 'display_name' , $author_id ); 
$avatar_img = get_avatar( get_the_author_meta('user_email') , 90 ) ;
$user_description = get_the_author_meta( 'user_description', $post->post_author );
$us = str_replace('[]', '</br>', $user_description);