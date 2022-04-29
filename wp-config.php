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
define( 'DB_NAME', 'unicode_project' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'rootdb' );

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
define( 'AUTH_KEY',         'Ws !oRJZt*RZ: pgyjl+x jW!rp1:E,rWsipEoW+i8h-5fwNLVTVu{20$`wu+FCO' );
define( 'SECURE_AUTH_KEY',  '&?9p;55+AIXT1[PoDf^7)6]T]~4rX2Lx2],cNu{w4<eFv5Yo?;?vSs7)b^Dg#;IW' );
define( 'LOGGED_IN_KEY',    '6Ag?Jh7.vkxw>oK~QM}%Ai]Xk8p2uTRF&r!]Q5(jIUj;1U^;98L:,,]Uq-@%QLl3' );
define( 'NONCE_KEY',        'u2T%g_d*4=mn6=*}Npu*2;/ah0pogrtxD0>X[^^<B>vDh=pWL?/Wm-FC.l,XmnX+' );
define( 'AUTH_SALT',        'jCcw*}]w+O]H&|A6f,3ebY,]ZvC$~!nep1 Vf+<z+]MLg9f$ll}Fj2#Ft.>zt9XC' );
define( 'SECURE_AUTH_SALT', 'lpPlwn bj%w!~S>>0-P6owKklPp{jr l3u&qC-_ZNeB{b/n0Ac67l+Z{[)cP~x~(' );
define( 'LOGGED_IN_SALT',   'U:bqopM#|YJd/qRaT,%I+F2i9?Q20,nI. ]c@pg.*S|?):k{a{qA9E=$eScEyXK;' );
define( 'NONCE_SALT',       's-I>Y=.]P@_/ AR7!b95YiUJe>L[H@ WG o}8Z#Yx;[}[XnHFHHoZlAPId&qn)?,' );

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
define( 'WP_DEBUG',false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
