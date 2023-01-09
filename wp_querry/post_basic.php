<?php
// Get Title
the_title(); 

// Query Post
while ( have_posts() ) : 
    the_post(); 
    the_content();  
endwhile; 