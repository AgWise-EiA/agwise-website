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
define( 'DB_NAME', 'skl' );

/** Database username */
define( 'DB_USER', 'skl' );

/** Database password */
define( 'DB_PASSWORD', 'FUUW8icvfsHGN8sDWqbBL5' );

/** Database hostname */
define( 'DB_HOST', '194.163.155.171:443' );

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
define( 'AUTH_KEY',         'kq%Ia7p:!&6lLl<0FauaL<HFM!Jk#mV$tTO;!)izqz~VF2oO&.fs5(&U`sGY;[rj' );
define( 'SECURE_AUTH_KEY',  '7#,l{HR2f2y2:[+APF}sGvICKRkCsSb_^8;[7wj%6pQ48q(CT:|b~X)E+utxzR`x' );
define( 'LOGGED_IN_KEY',    'k}fY-<h (yZE1!59z(;Tjb#iUANIYOG6HG//W8,g,Jlxaq#dfalH.d0<bgn2bfB*' );
define( 'NONCE_KEY',        'SBt))|,J~E=J%D+}|`#(T?9wtT!Tol!cL?QY#G*PyQzVGRC>}?x<l<lckbvo)t%:' );
define( 'AUTH_SALT',        'vV*ZizWo^0{Z89*zbU39&p%9D6yMJdjuwEbU1Q+D*0G 1;n!zr`gd6f%khh-KLFN' );
define( 'SECURE_AUTH_SALT', 'K<*_A2aTEphKa_Oy:a36&6c}DzdK&QC>xgmuvl36WZzn~qY2:K>|&U}6kN:9f_u:' );
define( 'LOGGED_IN_SALT',   'HY*{r>{Waa}uPaW&ThxrB}g4*}UFs+1z`R]Z-U[_0e@=Cvc<.B]ctL_t4xLxS=:b' );
define( 'NONCE_SALT',       'r1Np<lB9Om+=T F&!INy|Sc-!h>r^+3t{^KU)w.lccN_Npr7Qs*|<k|x2f3y.-cf' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_skl14636954';

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
