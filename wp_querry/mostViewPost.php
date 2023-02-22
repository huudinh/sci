<?php
function mostViewPost($cat,$count,$a=null){
    global $wpdb;
    $cata = ($cat!='')?" AND term_taxonomy_id ='".$cat."'":"";
    $ab = ($a!=null)?" order by RAND() ":" order by countpost";

    if($a==null){
        $sql = "SELECT DISTINCT(object_id) FROM $wpdb->term_relationships tr INNER JOIN $wpdb->postmeta pm ON tr.object_id = pm.post_id INNER JOIN $wpdb->posts p ON tr.object_id = p.ID WHERE meta_key = 'featured' AND meta_value = 'yes' AND post_status = 'publish' LIMIT 0,$count";
    }else{
        $sql = "SELECT object_id FROM $wpdb->term_relationships tr INNER JOIN $wpdb->posts p ON tr.object_id = p.ID WHERE post_type = 'post' AND post_status = 'publish' ".$cata." $ab LIMIT 0,$count";
    }
    $res = $wpdb->get_results($sql);

    foreach($res as $p){
        if ( has_post_thumbnail($p->object_id) ) {
            $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($p->object_id), 'thumbnail');              
        }

        $img = ($large_image_url[0]!='')?$large_image_url[0]:URLMEDIA.'/images/no-images.png';  

        $data.='
            <a href="'.get_permalink($p->object_id).'" title="'.get_the_title($p->object_id).'" class="sidebar_vpl_1_0_0__item">
                <div class="sidebar_vpl_1_0_0__newPostImg">
                    <img width="590" height="59" src="'.$img.'" alt="'.get_the_title($p->object_id).'">
                </div>
                <p>'.get_the_title($p->object_id).'</p>
            </a>
            ';    
    }

    $data.='';
    return $data;
}
echo mostViewPost($catid, 6); 