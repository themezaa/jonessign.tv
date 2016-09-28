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
define('DB_NAME', 'wordpress');
//define('DB_NAME', 'wordpress_jtv1');
//define('DB_NAME', 'wordpress_jtvclean');

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
define('AUTH_KEY',         '?mn3:y2P4q>F@Wmge#LorM#~6Iz+O_tXti ?0k_09$Y-iylSk0|v[JLeurlU<<eU');
define('SECURE_AUTH_KEY',  '[G,%URB17&9<WRfX+`~T7jtVW)~6h}{2D|Ou:g/iO!}i^vcJynSH@fcR6mM:):`z');
define('LOGGED_IN_KEY',    '%bLj+= c/zgT(-?_-oV7$Hg.RE&4IqT+Tya Z_r$z>xW}Xdm9gQ~GZp5i3H&?Swz');
define('NONCE_KEY',        '4 R@?ZPqp3Zq!sGSm[f@}A^)WgMssFCmo15atSVlX:tz+|h5=7|68Qm_ dMVr|y+');
define('AUTH_SALT',        'K8u5u+|<>=[=_8{u70wGrIzt,TXuZ9,@Zn/]qqfg|s$ iLJ302Trz#Fua>{vx]8d');
define('SECURE_AUTH_SALT', ' ^0g0F:4{g{v-|L*4o0b,4+-*j*= aDh?mYN<K{c/-xV}-C`b}=`-FP_iBJvFqO=');
define('LOGGED_IN_SALT',   'fv#;ec|E/p)rg}$AF7Jfkqk#dpW3)LL+7oN-|RVG+Vo|Nrq@c|=;SKtR)x36{?TD');
define('NONCE_SALT',       'khE~NF%cnUNmJ ~$4M@-|:/2dFvgE: b 5djAWV>6^deof]%KTWC%kYsTGx{g?F.');

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

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
