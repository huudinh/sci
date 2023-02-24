<?php           
    $tags = get_tags();
    $html = '';
    foreach ( $tags as $tag ) {
        $tag_link = get_tag_link( $tag->term_id );
                
        $html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='footer_vpl_1_0_0__tagItem'>";
        $html .= "{$tag->name}</span></a>";
    }
    $html .= '';
    echo $html;
?>