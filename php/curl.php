<?php
// From URL to get webpage contents.
$url = "https://benhvienthammykangnam.vn/cp/pages/bac-si/";
 
// Initialize a CURL session.
$ch = curl_init(); 
 
// Return Page contents.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
//grab URL and pass it to the variable.
curl_setopt($ch, CURLOPT_URL, $url);
 
$result = curl_exec($ch);

$link = 'https://benhvienthammykangnam.vn/cp/pages/bac-si/';

$html = str_replace('"media/','"'.$link.'media/',$result);
 
echo $html; 
