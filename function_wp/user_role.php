<?php
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