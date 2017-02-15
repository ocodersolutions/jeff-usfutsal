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
define('DB_NAME', 'jeff-usfutsal');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '192.168.1.177');

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
define('AUTH_KEY',         'eENFE1P5e xJMwsK~I`B1c?+N53C.q9*p@hYR${)Gn~d`d]/g)(L5DYmDmZW17*3');
define('SECURE_AUTH_KEY',  'vo{h8C/fzE9,Io8Ox2s$@k^4kfil9/:r.n?{@AIu=`TUjuKYGB)@|>Xk/Y[H7Alp');
define('LOGGED_IN_KEY',    'Mq:pT1e#:N?CKF9_J#a,@U($CND)f Pwr:G(ozV`:nPoqU)tZ&#D#@PL$t#xCx3~');
define('NONCE_KEY',        '=m]*i}LQTzW,y(T;E|3>Q6T.o.s|c;4p:X{_^XNxX|cg ?2CJxE7% %`K_WN#<(d');
define('AUTH_SALT',        't=K/D#=) Us1,E8!%O;jrv*_3}k+*}<fDR NX*o>t5xYL?hx%=NRRkEm9pF[uBn%');
define('SECURE_AUTH_SALT', '`>hF>Ctu,n28r+^Ht|O[/.Jh%,^0<y#~q7k;m!m8RPT9MGQ:m9QmGH9bE[`&2(=H');
define('LOGGED_IN_SALT',   'VSC}w_}IizlZR}TWq$Kix+i8mAeIXqdtQRf/g>F~zwK/Q^#*n+[%%LJ>1m7vrlsH');
define('NONCE_SALT',       '3kx&n*(SWF1fx!~NJ=_Qx.lM^WefeS+?=rlk`o/^5q`+,n~@$N^R5^y<aL3Icv!,');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
