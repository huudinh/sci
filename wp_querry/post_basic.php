<?php
// Get Title
the_title(); 

// Query Post
while ( have_posts() ) : 
    the_post(); 
    the_content();  
endwhile; 

// Get time
get_the_date('d/m/Y');
get_the_time('d/m/Y');

echo get_the_time('H:i:s - d/m/Y', $post->ID);

if(is_user_logged_in()){
    echo ' - <span class="vcard">' . get_the_author() . '</span>';
} 

// Get modified
get_post_modified_time('d/m/Y');

// Get slug
$url      = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_path = parse_url( $url, PHP_URL_PATH );
$post_slug = pathinfo( $url_path, PATHINFO_BASENAME );

// Get url
get_permalink( $post->ID );