<?php
function related_posts_endpoint($request_data) {
    $category_id = $request_data['category_id'];
    $post_id = $request_data['post_id'];
    $related_posts = get_posts(array(
        'category__in' => array($category_id),
        'post__not_in' => array($post_id),
        'posts_per_page' => 5,
    ));
    return $related_posts;
}

add_action('rest_api_init', function() {
    register_rest_route('api/v1', '/related-posts/(?P<category_id>\d+)/(?P<post_id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'related_posts_endpoint',
    ));
});


// Get Post Other
add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/posts/(?P<category_id>\d+)/(?P<post_id>\d+)/(?P<posts_per_page>\d+)', array(
        'methods' => 'GET',
        'callback' => 'get_posts_list',
    ) );
} );

function get_posts_list($request_data) {
    $category_id = $request_data['category_id'];
    $post_id = $request_data['post_id'];
    $posts_per_page = $request_data['posts_per_page'];
    $args = array(
        'category__in' => array($category_id),
        'post__not_in' => array($post_id),
        'posts_per_page' => $posts_per_page,
    );
    $query = new WP_Query( $args );
    $posts = array();
    while ( $query->have_posts() ) {
        $query->the_post();
        $post = array(
            'id' => get_the_ID(),
            'title' => get_the_title(),
            // 'content' => get_the_content(),
            'excerpt' => get_the_excerpt(),
            'permalink' => get_permalink(),
            'date' => get_the_date(),
            'modified' => get_the_modified_date(),
            'author' => get_the_author(),
            // 'categories' => wp_get_post_categories( get_the_ID(), array( 'fields' => 'names' ) ),
            // 'tags' => wp_get_post_tags( get_the_ID(), array( 'fields' => 'names' ) ),
            'thumbnail' => get_the_post_thumbnail_url(get_the_ID(),'medium'),
        );
        $posts[] = $post;
    }
    wp_reset_postdata();
    return $posts;
}
?>