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

// RSS View
function rss_shortcode($atts,$content=null){
	$url = $atts['url'];
    
    if(function_exists('fetch_feed')) {
 
        include_once(ABSPATH.WPINC.'/feed.php');
        $feed = fetch_feed($url);
     
        $limit = $feed->get_item_quantity(7); // specify number of items
        $items = $feed->get_items(0, $limit); // create an array of items

    }
    if ($limit == 0) echo '<div>The feed is either empty or unavailable.</div>';
    else foreach ($items as $item) :
        $content .= '
            <div>
                <a href="'.$item->get_permalink().'" title="'.$item->get_date('j F Y @ g:i a').'">
                    '.$item->get_title().'
                </a>
            </div>
            <div>
                <p>'.$item->get_date('j F Y - g:i a').'</p>
                <p>'.substr($item->get_description(), 0, 200).'</p>
            </div>
        ';
    endforeach;

    return $content;
	
}
add_shortcode('rss','rss_shortcode');

// echo do_shortcode("[your_shortcode]");