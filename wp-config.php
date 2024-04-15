<?php


require_once('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASSWORD']);

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
define('DB_NAME', $_ENV['DB_NAME']);

/** Database username */
define('DB_USER', $_ENV['DB_USER']);

/** Database password */
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);

/** Database hostname */
define('DB_HOST', $_ENV['DB_HOST']);

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY', 'M6BD)2LI#VU&3e^9 D)%C)5/>k,N//FWzD#!UT$B+6GGx^7RqSq?Xv_(f@d+bb<E');
define('SECURE_AUTH_KEY', 'S}&KO+/f.r~(._WLc5z).WV7yT<m!0F,s+$/C3Zn0S2+K,&Q=q]St#7Orpyqd6_1');
define('LOGGED_IN_KEY', 'V!*6Y%6:Pmm(I5Lm/B4P)bD<K8gn.Gw`4zX=|(5;(Cq8m^2*c~I7UMm_I_[XA#Ab');
define('NONCE_KEY', 'o#`,3ibwNVpQvd1ma7W~Zv=brjc-V*tZ)L62 #H7K7RmnPd?bi]7pv&t)$`P0v_O');
define('AUTH_SALT', '.~:Vt$G<2rE)b[}Db]M.uNI8oI5JOhvBK.1n;PeoC/L8hMU7WU/c$I.S.2IW,><M');
define('SECURE_AUTH_SALT', 'n<#92z~Eb7@eR!Dtg*F]6,Ja;/=Oi!,A8LNn#>0#k.nAEREgic;gj.m1vRl+lxR9');
define('LOGGED_IN_SALT', '|8*h3/3mWc2ATuBE0Cn{ep){kN^(M+0hVyEY~vLcu|f~6s]}.g:r}|8~ugnR_)3P');
define('NONCE_SALT', 'gvo2gZ3F/s3hQ$m#j^!6@7@B;4usf*9x0:t<K..R:er&!,E-=t>EDy,ZkOP17BJ9');

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
 * in their development $_ENVironments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
/* Add any custom values between this line and the "stop editing" line. */
define('FS_METHOD', 'direct');
define('FS_CHMOD_DIR', 0755);
define('FS_CHMOD_FILE', 0644);


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
