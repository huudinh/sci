<?php
    $args = array( 
        'post_status'=>'publish',
        'post_type' => 'tuyen-dung', 
        'posts_per_page' => -1,
        'order' => 'DESC',
    );
    
    $loop = new WP_Query( $args );
    
    if($loop->have_posts()):
        echo '
            <script>
                const data = [
        ';

        while ( $loop->have_posts() ) : 
            $loop->the_post();
            $link = get_permalink($post->ID);
            $title = get_the_title($post->ID);
            $name = get_field( 'name' );
            $deadline = get_field( 'deadline' );
            $department = get_field( 'department' );
            $location = get_field( 'location' );
            
            if($name){
                echo '
                    {
                        name: "'. $name.'",
                        link: "'.$link.'",
                        deadline: "'.$deadline.'",
                        department: "'.$department.'",
                        location: "'.$location.'",
                    },
                ';
            }
        endwhile;
        echo ' ]; </script>';
    endif; 
    wp_reset_postdata(); 
?>