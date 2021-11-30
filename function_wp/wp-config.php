<?php
//Khong cho edit theme
define( 'DISALLOW_FILE_EDIT', true );

//Disable updating everything for WordPress
define( 'DISALLOW_FILE_MODS', true );
define( 'AUTOMATIC_UPDATER_DISABLED', true );

//Limit Revisions
define('AUTOSAVE_INTERVAL', 300); // seconds
define('WP_POST_REVISIONS', 30);