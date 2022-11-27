<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'rogbcvsvhosting_test' );

/** Database username */
define( 'DB_USER', 'rogbcvsvhosting_test' );

/** Database password */
define( 'DB_PASSWORD', 'X_Xj3+?*r};}' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'WS@$KG~i<I-`9X{+B$Gy@IKk_`-5WD1VuEnn7Mt{xrC$NfG]?F/Ii^QtHFEIg;. ' );
define( 'SECURE_AUTH_KEY',  ':;J_z+5o]1)l#|}$RD?lVcq|RsI61aVNi~es4<ZWRqr&G.idV|1>3/6X,K*{ceT5' );
define( 'LOGGED_IN_KEY',    '6Ge>kn{;22Y<BH0th2ajl%6GP.k9vV2kQ,u#Oa6yV{wyP<qRLe(hYrKHY<[,L_V<' );
define( 'NONCE_KEY',        'i)J_.!#8Q2(Lwx6jUS*)Qj53Gs?#x8E/BWP#QZ<d!ljx^8{*1G<)v,[*(eA6xol1' );
define( 'AUTH_SALT',        '%!i@H$o1$ {d$.R07.s_SNi{29ks&/uisNHLg,?U}+5nOTk,a;G%D5;]#-1qfr#f' );
define( 'SECURE_AUTH_SALT', 'Ikm8&)$wSi:Nr#LoWJp6kRiL0=tWZ=TU1pd9uO9CVfg/OYcAl:2I.K=B)+Aqz;q,' );
define( 'LOGGED_IN_SALT',   '|&z..d9t/xV =Dn3AW~*k.L(8AyTyNTQSXGVT;P|q?~f&6(]kX#[J)v9St]~>:)s' );
define( 'NONCE_SALT',       'NsW7/FQXZ8m.5:>/0gyN`[&Z!qwq=Ll%slHbI6G&ZbAfKKDUhbp<S%4xO*lcn0gG' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
