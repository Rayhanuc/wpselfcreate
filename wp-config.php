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
define( 'DB_NAME', 'wpselfcreate' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'mysql' );

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
define( 'AUTH_KEY',         'Jq0;8|UL5Z|-vrMmbc[,xS>hOL,8(zpC-I2aMH&Bk{hgF+c3;_10YIqaq:qlf;^k' );
define( 'SECURE_AUTH_KEY',  '^^.8DRi*T;J0T^+#wd^?z@a&[3qzohk%h?op<W:e=Vep%%)RbO`aagH[{;CB$Ir6' );
define( 'LOGGED_IN_KEY',    'fqL**w&I/e*C]SfZCB1_OFfPX|/WCDkcTgPy49$,X%YR*B:XYBoE:c)wek;7FuL7' );
define( 'NONCE_KEY',        'T5CJ8`ml6x88ct^b?Ho@U&m;Q%Tu!,ux:l2^ Ll7]J*6>zHSq6:$~>Hn#*ZZbqHA' );
define( 'AUTH_SALT',        '8Hqon0(ds*i7/!oFkH%#D}QH|aPfW*~q&XP|Mz{,Jtr(/^#nfnGthX(ZfQHc<#<:' );
define( 'SECURE_AUTH_SALT', 'VCKV&4_B/kY,yDk)j^h GZNbWE<HQ ([rCC0ce~H%(ozSyf#W&k}v%Mv([6N~>:(' );
define( 'LOGGED_IN_SALT',   'h ds$Qu}<jopC}(9OIxHWUjMsHp(J-DAG!9Dkq+kk28lyLs|Nn;$bz|O aUcUa3x' );
define( 'NONCE_SALT',       'l?&<vJZ7JPX1%C1zO#4Vv};GfS?7^SKUe.^k2S9_Na=T UIQ?v7[0F-5o(c7w4KG' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
