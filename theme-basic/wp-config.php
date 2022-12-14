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
define( 'DB_NAME', 'theme-basic' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '&{#74waqMY2iHRh-=vs=t=q,UK5(U+!;a_r/NcOE^,;b yine}Wqy)1Wbi*Lhzhy' );
define( 'SECURE_AUTH_KEY',  'zFpkJI{.h_OuNjD;bdt;:_Nm^Rf3=3O$QVELkgOt~u!y5$ys;QAwrn?.Yx$Tl=e*' );
define( 'LOGGED_IN_KEY',    '?VP~EdJI*qeF2Zcs8&r5zNF/Aw={0azgcz1=~jn&-H]3uP}c-I1(I3`5*15zS5C8' );
define( 'NONCE_KEY',        ': N`<O7J&fexbN[JT|X8wyE3@r,!3N0|?)m3puz2<>J^7{R#x<QN:DqmDl59X]pH' );
define( 'AUTH_SALT',        '>w|E/UHlCg~9o$2cvCu:;/Fm?1zH6>0ReB!@+:2}Vv8gmt~Hbw#qRb`FNqn6?FH%' );
define( 'SECURE_AUTH_SALT', 'B~*`3&l+= X VNg?l Cxih4aS; ox<Pu[mBAG&&JtzoZT{0A2tzXSX2F-@Rtfs#~' );
define( 'LOGGED_IN_SALT',   '/N=r.$w`@*:KM^t{/G.~=& Sw-a}P&k*y{*Ni) WO*/#w{jDaDgM4*NdRP^^F4rX' );
define( 'NONCE_SALT',       'mN8mIJs95$1w_d3.u.Ca}l~=4<T Ls/-?e:e4222vNuKhZo`VA.ODoEr!V&():^o' );

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
