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
define('DB_NAME', 'listing');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'Xi+#_)0k6!a>FR{<DB:L>mTnDe<W,^;EXT!U?fn+d#%vm+qjZUL IdBA%I$Ud2/V');
define('SECURE_AUTH_KEY',  'uU&e#TEc}XKKH8)n2DksWbL%n$UI.r$bLuch>s>K6uQ,2OO%t~}lT!D$GgHcBsZ1');
define('LOGGED_IN_KEY',    '1H;Nw1y7~%zeN @[v|InbYMkgUOh7gZ?>2_{>0lF2$QyOcs vj>y |!}=#?1g k0');
define('NONCE_KEY',        'g58-_:2Ni#O+4mm-k(@=U^3oiPO.9>=bh.:C?JZzC+e(G$yf^>k$[FsGV-VO7|%U');
define('AUTH_SALT',        'fAZvH]>^<q-/]^jjzg;)ypAp-JL)YDfwCIjA$rQ~@HtqoGsAm_dQJ;08?>pp0xPC');
define('SECURE_AUTH_SALT', 'pzuzo/N5;?~#9ecm^G:pHMu,4I$54Lp =*C,:8V~hb:?I_|iN_Z&d`HF/du7})e;');
define('LOGGED_IN_SALT',   'PWllQ-~nn;ze~BtE6~|?`_-v`=oLc,KXTaj`xd6-gEH5O?&c/8+,EfT_:Wi^JTT$');
define('NONCE_SALT',       'c_VlK}+7m~p8WM)uOig4g,ek,VzNrPq&e 7>ZlRxO-9K aN2g|vig:;AkE%(llkh');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
