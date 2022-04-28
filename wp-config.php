<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ci99361_av');

/** MySQL database username */
define('DB_USER', 'ci99361_av');

/** MySQL database password */
define('DB_PASSWORD', 'qwerty123');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'eMX$h)[MJ4y#q00nBqS(k|IE`J Rc(m=!F5k>c([aDHxT|AC}qi-/|J4:&2MKMT|');
define('SECURE_AUTH_KEY',  '*_?:0|6R5Hm?Nj-j7I .Ay(o!;Ot=9}w-AB<vdJhF*QhWIuK%5gpxuyqe)p_XJkE');
define('LOGGED_IN_KEY',    '<oD:=)tq-,*frP-SVkJ97f}gh*<A4|=d{@-~3o(bL{ [5!B59,MeNd`8vEk:jg_%');
define('NONCE_KEY',        'GWaRQ@Adz:^j|v?v{&H_2*H]#p2,kN&OEn+3i}<)V<Tw`-yZkl.)](H(,(XVY@G:');
define('AUTH_SALT',        '9ok[JV|u~qJ:7qSHZQNclEl;k_k]/_`~h.}.<>,ruOoN]6+4nW^5a!3aRiP|+l-r');
define('SECURE_AUTH_SALT', 'Bl]_*`L)|7TqJ8s-:T.U|swB9$0a0;`h&+xgf.Q|z%-wteZ:-3N-)88svpPj}<j`');
define('LOGGED_IN_SALT',   'K:m2*tqDGZ.Yj(_+q9Pbsl-r<n#dQz~x6}:|<!1}E-1r>}oJwg5j`@YUe:8y)Fhz');
define('NONCE_SALT',       '-$~-lxo^<cT/ }pAi/agSmM,pOSOoIC?6 DJMZ07MWO5VbR/~4SdC-+$QG!+fwfS');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_avesta';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
