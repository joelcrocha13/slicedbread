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
define('DB_NAME', 'joelroch_slicedbread');

/** MySQL database username */
define('DB_USER', 'joelroch_slicedb');

/** MySQL database password */
define('DB_PASSWORD', '0++ZE^@fDLFb');

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
define('AUTH_KEY',         'g<`MH!7bdeEH5im>R&(e)b_PbPg,#rLV]S}wr7!M.gTCB66~mZZ&y1cUb|.9>rDB');
define('SECURE_AUTH_KEY',  'Or&6E0ty|+z<%dfr;WtCEFOy4;x%WNpU~<RrTnrf1So~kjCgD6< wsh,iq_C|Y!B');
define('LOGGED_IN_KEY',    '#X-[6^00Ct>w,=h[@HE;c^q1mKLNh)QtmA*Jw--p=LqjPlG+ C1:nD{vOOjy(p5m');
define('NONCE_KEY',        '$8a@Ax|Scm8:9F)9twtZfo$F<VVMo[Q!,A:}%^8vC%/r7r8qBl?sJpD@t]D}[*97');
define('AUTH_SALT',        '&!=oS~AWj5dVs`6oObf;2[Q!NTCeP%@3X;<NSJ7aU}Lf:Bp`UD-V7_IV/[.j*su1');
define('SECURE_AUTH_SALT', '<mZwYHnIO=W]:6*6/|VAn9t$|.A^COa=f-5:$lg,/F{pq/L`.2yP}faXE4fVO~,N');
define('LOGGED_IN_SALT',   'KX])t2w2<?~zUpm?YBF.!8&kUinf5;wX.13BvgC3m,@x^`BBUz[`.NsE/cu8<5hL');
define('NONCE_SALT',       'V9exfl|<a+[4pCUt)Lyqg{sr8mMy)xMI57Y1+$@z~KWaI`RV5bw%> m+/ML^uUpD');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wsl18pb7_';

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
