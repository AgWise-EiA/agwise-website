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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'agwise' );

/** Database username */
define( 'DB_USER', 'fuelrod' );

/** Database password */
define( 'DB_PASSWORD', 'fuelrod' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',         ';V+Q.O]qxcFv#2)`%0_`;4:TPQQ-9*x;;~LOA{n^hD3SP+mT_NA}|Y,[3]&d=h-n' );
define( 'SECURE_AUTH_KEY',  'GUt,DAeFv]Z*Wg}WQ@buUbL;FJ~ %RI-f<$*)W`_?Q^mO{:%:l@NT]>(6QOH4tvy' );
define( 'LOGGED_IN_KEY',    '0W}bzx/Uq{yT:u(< , lx3;j>xb1jf21Fx8l[&:uR22S0h*T.6w%e}n64S+l<q:C' );
define( 'NONCE_KEY',        'qCnC`K0oUo^jY.!kg:T?FU3%(L>AzOLKb=bP;M@5W;-zD6CMB.29u^1Ug:Xw)m<0' );
define( 'AUTH_SALT',        'LfG.lhK+S~b_od)x?Z.?!FtsNgT NzFj|$ap.Btjh=hHuQOwda`T*SaU%;.X1Z5s' );
define( 'SECURE_AUTH_SALT', 'c(jACQ@ ya>|s-6sZ$/M,YUavNA7$)yZB(Jlq+R_ya<0mtp%02isXYsa!RO+o.?T' );
define( 'LOGGED_IN_SALT',   ',%$p&OohhTOAP8kh)s;jF7Q+dlHJ:Iu6[CFI4bX!7Ef>dVAkV&UV~UI1g[FYuNxG' );
define( 'NONCE_SALT',       '=R?Y2+7z@6Zt)t6*Cki5iwdKJbfM#G UJt0ZTR&&C+{ f>>MRA2e1r2h }$h%:2X' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
