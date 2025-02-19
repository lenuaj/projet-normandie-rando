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

define('FORCE_SSL_ADMIN', true);
if ($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
$_SERVER['HTTPS']='on';


// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define('WP_CACHE', true); //Added by WP-Cache Manager
define('DB_NAME', 'normandierando');

/** MySQL database username */
define('DB_USER', 'normandierando');

/** MySQL database password */
define('DB_PASSWORD', 'b7ZGQL7wg4e8');

/** MySQL hostname */
define('DB_HOST', 'wp-mut01-db');

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
define('AUTH_KEY',         '.9IDh<9IfAebOCufg:c*zWjcDtT;Cw_h$|$%sX{u*kAxwsQJpSS;(i4sX$I[d(r>');
define('SECURE_AUTH_KEY',  '6:5, k%BhOw b5(KCwg~L`fj{RJG]2]`uqW)mu+.7We`2hWw[_Yv5%MW:8)3yCDy');
define('LOGGED_IN_KEY',    'MD.D6yvCwyw#yq[E0~=2 2@{[<V2<zf@LGuE)*vwNqcu)a2?%u~n%c*7+|cTRY-2');
define('NONCE_KEY',        '{;;Xwevx%ZdT8W)?x`f8.4@ktlbM,.QVp5xv;%>A|ucK#tVMU*#VLl(~yL@?lLUP');
define('AUTH_SALT',        'b<Mv XGH.CK1d2~*8sK^k^P<1=v@tth;t>(sF*1LZNwf2{F-OQ337&FAT_11&ISp');
define('SECURE_AUTH_SALT', 'BX@Vt/2m=1ej*:m[^TA./i1!y~eV?a*UaVaSd?j_C0A6/]<8-g%`MQlw#Bxq`y(l');
define('LOGGED_IN_SALT',   '@aTO0q*N=:C$JSfJddczzY]F`l(}y5TH)[i$G-Y[=(Rh3:o$Txix$6BPv~/nA$y@');
define('NONCE_SALT',       '{?DcZ&#t`p=>kArInjUu0wy}#c=RF*L-1,dX 23wL~l*lmsc0^%r:Ko4JXG.1W{=');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'pxl_';

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
