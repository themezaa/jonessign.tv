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
define('WP_HOME','http://jonessign.tv');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define('DB_NAME', 'jonessigntv');
//prefix is jtv_
//define('DB_NAME', 'jonessigntv_local');
define('DB_NAME', 'jones_jonessign_tv');

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
define('AUTH_KEY',         '|/AF~4Q/+^FG{HJ0,xizmWe c5{tL6}7/G<6J;?VJ8x><0RfTLdN JoT`ci7O|c1');
define('SECURE_AUTH_KEY',  'Q*|u._|y1mmV8=u!f<+.2/gmA3[1-]L-$A,|x4SSaLhZZ7&,?7]|B,M[:Fx};:By');
define('LOGGED_IN_KEY',    'a4-{O0VRQgb$Lw ^n!7v0E6F58W[/JMb[+}$[3aX&g?+dd<V szG(yMtck.zw h%');
define('NONCE_KEY',        'S4lr+#&g|7*Kz@u5E#1Xi!UWSqx~]Fku%B$8Vk`nxd}~Z+>4A*E[RE;~k<,_-Y~m');
define('AUTH_SALT',        '{FOa0I5>]|6-k$!H>a0+7>{a^hN9e;o,:0>Q4qp $-|u3azHu<>-ZqsyS+>]q[-$');
define('SECURE_AUTH_SALT', '[kz0*_rQgy[.`z{6tNicW%!G,=AvPOs2x&ITsBOTFC:t[Wce,5N{%5?U]ijp7 }^');
define('LOGGED_IN_SALT',   'U(Hx)ca?#lXMtnCV+-.V[>jM?oW 7obR-$>pk0SB@+.[wqrAG-?/H7v-o./7W1er');
define('NONCE_SALT',       'c++@ f5z[R[g1^TKhm.,MzFSD(?X @!Cb%?)+h2y5ASlZOBJ{3I}IBt_R%OH-YaM');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'jtv_';

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
// keep revisions from being stored in the database
define('WP_POST_REVISIONS', false);
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
/*================================================================================
=            WP-PDF-Plugin Configuration options as recommended in wp-content/plugins/wp-pdf-templates/readme.txt  Note line 65 if you think it is weird to place settings for a plugin in you main config file.
*             =
================================================================================*/

// DPI and PPI - are they the same thing?
define('DOMPDF_DPI', 180);
// if the post type for athe PDF is access restricted, then set te following to "true"
define('FETCH_COOKIES_ENABLED', true);
// this is so I don't have to keep deleting from the cache while developing the templates for PDFs of Portfolio pages.  Can be commented out in a live environment most likely.
define( 'DISABLE_PDF_CACHE', true );





