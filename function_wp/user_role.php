<?php
// Tạo role
add_role('moderator', __(
    'Moderator'),
    array(
        'read'              => true, // Allows a user to read
        'create_posts'      => true, // Allows user to create new posts
        'edit_posts'        => true, // Allows user to edit their own posts
        'edit_others_posts' => true, // Allows user to edit others posts too
        'publish_posts'     => true, // Allows the user to publish posts
        'manage_categories' => true, // Allows user to manage post categories
    )
);

add_role('newbie', __(
    'Newbie'),
    array(
        'read'            => true, // Allows a user to read
        // 'create_posts'    => true, // Allows user to create new posts
        // 'edit_posts'      => true, // Allows user to edit their own posts
    )
);


// Khong cho tac gia xem bai viet cua nguoi khac trong wp-admin
function posts_for_current_author($query) {
    global $pagenow;
    if( 'edit.php' != $pagenow || !$query->is_admin )
    return $query;
    if( !current_user_can( 'edit_others_posts' ) ) {
        global $user_ID;
        $query->set('author', $user_ID );
    }
    return $query;
}
add_filter('pre_get_posts', 'posts_for_current_author');

// Ẩn các Menu Thừa theo role
add_action('admin_head', 'my_custom_fonts');
function my_custom_fonts() {
    // $current_user_id = get_current_user_id();
    $user = wp_get_current_user();
    if ( 
        in_array( 'author_bantin', (array) $user->roles ) ||
        in_array( 'author_cauchuyen', (array) $user->roles ) ||
        in_array( 'author_nhansu', (array) $user->roles ) ||
        in_array( 'author_tailieu', (array) $user->roles ) ||
        in_array( 'author_tuyendung', (array) $user->roles )
    ) {
        //The user has the "author" role
        echo '
            <style>
                li#menu-tools, 
                li#toplevel_page_leadin,
                li#menu-comments,
                li#menu-dashboard,
                li#menu-posts-elementor_library {display:none}
            </style>
        ';
    }
}