<?php
// Lấy lượt bình luận
$count_comment = get_comments_number();

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

//codfe.com tao hàm hiển thị 5 comment mới nhất của web
function create_shortcode_list_comment() {
	
	$html = '';
	// Arguments for the query
	$args = array( 
		'status' => 'approve',
		// 'number'=> 5,
	);
 
	// The comment query
	$comments_query = new WP_Comment_Query;
	$comments = $comments_query->query( $args );
 
	// The comment loop
	if ( !empty( $comments ) ) {
		$html.='<div class="content-w content-news">';
		$html.= '<table class="table table-bordered"><tr><th>STT</th><th>Comment</th><th>Link</th></tr>';
		$number = 0;
		foreach ( $comments as $comment ) {
			$html.= '<tr>';
            $number++;
 
				
			$html.= '<td>'.$number.'</td><td><a href="'.get_comment_link($comment->comment_ID).'">'.$comment->comment_content .'</a></td><td>'.get_comment_link($comment->comment_ID).'</td>';
						
			$html.= '</tr>';
		}
		$html.= '</table>';
		$html.= '</div>';
	} else {
		$html.= 'No comments found.';
	}	
	return $html;	
}
//Codfe.com nhúng [show_shortcode_comment] sẽ hiển thị các comment ra
add_shortcode( 'show_shortcode_comment', 'create_shortcode_list_comment' );