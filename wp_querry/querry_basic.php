<?php
$query = array(
//Xuất theo tác giả Chọn 1 trong các điều kiện dưới
'author' => 1, // Xuất bài viết theo id của tác giả
'author' => 2,6,17,38, // Xuất bài viết theo id của một số tác giả
'author' => -44, // Ngoại trừ tác giả có id là 44
'author_name' => 'svl', // Xuất bài viết theo tên tác giả
// Lọc bài Viết theo category Chọn 1 trong các điều kiện dưới
'cat' => 1,2,3,4, // các bài trong category với id=1,2,3,4
'cat' => -1,-2, // Ngoại trừ trong cat có id=1,2
'category_name' => 'svl,html', // các category với slug có tên svl, html
'category__and' => array('2','6'), // Lấy hết các bài trong cat có id = 2,6
'category__in' => array('2','6'), // Lấy bài của cat có id=2 hoặc id = 6
'category__not_in' => array('2','6'), //Lấy bài viết mà trong đó không có một trong 2 cat có id là 2 hoặc 6
// Lọc bài viết theo TAG
/*
* tag (string) - use tag slug.
* tag_id (int) - use tag id.
* tag__and (array) - use tag ids.
* tag__in (array) - use tag ids.
* tag__not_in (array) - use tag ids.
* tag_slug__and (array) - use tag slugs.
* tag_slug__in (array) - use tag slugs.
*/
'tag' => 'svl', //Xuất bài viết bởi tag slug
'tag' => 'svl+html+php', // Gồm tất cả các thẻ
'tag' => array('svl','html','php'), //Gồm các bài viết có hoặc không các thẻ
// Xuất bài viết theo Post & Page
'p' => '2', // Hiện bài viết có id = 2
'page_id' => 2, // Hiện trang có id = 2
);