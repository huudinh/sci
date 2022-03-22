<?php
// shorcode Video
function youtube_shortcode($att,$content=null){
	$url = $att['url'];
  	preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $matches);
	if (!empty($matches)) {
		$img = $att['img'];
		$alt = $att['alt'];
		return '<a href="https://www.youtube.com/embed/'.$matches[1].'" class="fancybox-media popClip" rel="nofollow"><img src="'.$img.'" alt="'.$alt.'" class="aligncenter"></a>';
	}
	if(isset($_GET['test'])){
		echo "111111111";
		return $img ;
	}
}
add_shortcode('youtube','youtube_shortcode');

// Shortcode Editor
function my_custom_styles( $init_array ) {  

    $style_formats = array(  
        array(  
            'title' => 'Ghi chú',  
            'block' => 'div',  
            'classes' => 'post_note',
            'wrapper' => true,
        ),
    );  
    $init_array['style_formats'] = json_encode( $style_formats );  
    
    return $init_array;  
  
} 
add_filter( 'tiny_mce_before_init', 'my_custom_styles' );