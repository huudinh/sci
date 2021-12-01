<?php
function catch_that_image($id = null)
{
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    if ($id != '') {
        $post_content = get_post_field('post_content', $id);
        $output       = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches);
    } elseif (is_single()) {
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $posts['0']->post_content, $matches);
    } else {
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    }
    $first_img = $matches [1] [0];

    if (empty($first_img)) {
        $first_img = get_template_directory_uri() . "/Module/media/images/no-image.png";
    }
    return $first_img;
}