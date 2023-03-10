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
define( 'DB_NAME', 'umiha' );

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
define( 'AUTH_KEY',         'g8g4GoG3u:I`]y: 1p=$`e~+fl?ZEZF -O|l>~E}v2QFe6,D9v:3,t][~5rhM<@:' );
define( 'SECURE_AUTH_KEY',  'd.0>el<&Yc|&-KBa$4+:D]GpLRsL%=1`UC=n7h=iLsi3*sz*N&5^cTrlr=,2v|1k' );
define( 'LOGGED_IN_KEY',    '%/SWw_L$xI%+zVe2~8cAQ[hpa;~oe_OZ83W*_`6~^@6ux%),&|7LBDCy>QMT!0N7' );
define( 'NONCE_KEY',        '~liY<O<hy?8SUHBAy:1g*CykyL<!p{rVV7t68g+Jijvf?=H~)CfPXpS)`MKv2Y,,' );
define( 'AUTH_SALT',        'a3ma+MqV|yjbVj=Y5|(s198TM;su#d(J{>$vhYHbj`?$.t#hl|q`bv6#1*SID$bL' );
define( 'SECURE_AUTH_SALT', '|l=#6hLA`>}c_DyGH2 !wvBY(#&lT$`D/Lq]_X]nBM<Ik{pV_flb%=U@%-I=cQ)|' );
define( 'LOGGED_IN_SALT',   'YKO[d~|Rp6^*Q[[.ZC:~B7bUl$p1vA;y@/!gX5Jk9iGM#ZY?O6 K,75$[h<9AW r' );
define( 'NONCE_SALT',       'b@wA(,;x9DMm4A/$I*cgb(J@>7N]N-XYpbo;V$II8;I3o+x:[}fn9 wuUXy>6+A)' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'sum_';

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
