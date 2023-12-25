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

 // Remove comment author link
add_filter('get_comment_author_link', 'jltwp_adminify_remove_comments_author_link');
function jltwp_adminify_remove_comments_author_link($author_link)
{
    return strip_tags($author_link);
}

// Remove field Comment
add_filter('comment_form_default_fields', 'website_remove');
function website_remove($fields)
{
   if(isset($fields['url']))
   unset($fields['url']);
   return $fields;
}