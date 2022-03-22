<?php
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