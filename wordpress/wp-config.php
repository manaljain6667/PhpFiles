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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'manaL@12345' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'M@ZYkh,-[sgNYJ_IH>e/eUTf|ZHB|y*gFa8>N:)gvcItwXcS%//kxg@uuz>zPHgH' );
define( 'SECURE_AUTH_KEY',  '$fecTr@21?1,S$8|0ZDl&xr~ Kt9s0+3,BLgCN^){_xT^o7 GMk!.h9p=axAN>]`' );
define( 'LOGGED_IN_KEY',    '{q@grS(Hgg?*J }o5aFMTR7GJY8 wXQ![&r$JrEx9q8)Yy98J)(eX&]l1E&`n?0>' );
define( 'NONCE_KEY',        's+9r@?^{&V7?oXeF.iZBq.MyV<n,GOzO{F(FQqXn58U8x+7-Mo!w_0_cn&DLQfka' );
define( 'AUTH_SALT',        'mhdkeNuZ[MBalY;eroo_5N.>#`,RT43 *BfH$}AL$8g0F@;Y=~k5.OuYHJ~n z[e' );
define( 'SECURE_AUTH_SALT', ']X.@3Dxc7o3&jdoJ~@^QK&?Cn]eMF:(ttd/G[fX`POBb. k1P9oto6JPw}:xCRKF' );
define( 'LOGGED_IN_SALT',   'Eyv2=K$iiecmL$!qR%k~n6D+cWMU!:$HaWCn3rtVmlsy+~?@iDxU YmA06Tz:=)X' );
define( 'NONCE_SALT',       '6rS #TmVR_l>KbJ~Un &{jGXUTvs5p^g+J#FYW<3o8<>-^yk~5]bUxN;:M<Y-&MY' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
