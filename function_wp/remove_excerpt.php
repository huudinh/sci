<?php
// Remove Description ...
add_filter('get_the_excerpt', 'exc');

function exc($param) {
	$excerpt = $param;
	$charlength=140;
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			return mb_substr( $subex, 0, $excut ).'';
		} else {
			return $subex.'...';
		}
		//echo '[...]';
	} else {
		return $excerpt;
	}
    //return "Whew !".$param;
}