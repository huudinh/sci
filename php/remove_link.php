<?php 
    $content = "text text text. <br><a href='http://www.example.com' target='_blank' title='title' style='text-decoration:none;'>name</a>";
    echo preg_replace("/<a[^>]+\>[a-z]+/i", "", $content);

    // Remove string
    $removeLink = '"text" text text';
    echo str_replace('"', '', $removeLink);