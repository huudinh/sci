<?php
    $pageview = get_post_meta(get_the_ID(),'pageview',true);
    if($pageview =="") $pageview ="0";
    $pageview = (int)$pageview +1;
    update_post_meta( get_the_ID(), 'pageview', $pageview );
?>
<p><?php echo $pageview ?> lượt xem</p>