<?php
 // Loop over comments.
 foreach( $comments as $comment ) {
    $args_sub = array(
        'status'  => 'approve', 
        'parent'  => $comment->comment_ID ,
        'post_id' => get_the_ID(), // use post_id, not post_ID
    );
    
    $comments_sub = get_comments( $args_sub );

    foreach ( $comments_sub as $key => $comment_sub ){
        if ($key == 0){
            echo '<li>' . $comment->comment_content . '</li>';
            echo '<p>' . $comment_sub->comment_content . '</p>';
        }
    }
 }