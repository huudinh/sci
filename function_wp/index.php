<?php
    //Check Private / Public
    if ( get_post_status ( $ID ) == 'private' ) {
        echo 'private';
    } else {
        echo 'public';
    }
?>