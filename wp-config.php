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
define( 'DB_NAME', 'Food Fruit' );

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
define( 'AUTH_KEY',         '3&8cTbr]0 D2(h.w8eGg$b?+5]B}RihWZkH!)t`Ov0BhPq1A^fX}l&+Zbw;^${R$' );
define( 'SECURE_AUTH_KEY',  'LwG+WRb3`a,US[EAkA^h%:#j~8w::yM,.E=cCyqgA_H,:;SzN~9G?+aBq1(t4#(&' );
define( 'LOGGED_IN_KEY',    ') 3GvI+9-PRxWVM4OY-^c/{CS4a9>$UX`+)6l6Yn;]r$O3@N7F{q[XS]TQy;iSV.' );
define( 'NONCE_KEY',        '5dt}`vHMuEIdpeln#uO4eW;i}3_kp7-sDg>[PQQ]t{zAqX{B!lWOKPM`&+@1(lWY' );
define( 'AUTH_SALT',        '6H`/L6KA,8<[d[ RF6-eLYd@w^l3NeO(YE3VPJ(#gHjRp39,8lTpNI^,s!0{}Gcx' );
define( 'SECURE_AUTH_SALT', '3SNay6c; l<u:qhOk>G]M&5^&V|g3z]V!3[8|a&y(dqnL5.8b^d=hbkg[X%uE;Vk' );
define( 'LOGGED_IN_SALT',   'N:7]?/)7>Jz1#0--!W}fDc_7r=D+l.8|F5tSi(DMh;:Nk7ClOO_s)74yhL/x{fiQ' );
define( 'NONCE_SALT',       'n/JW[UZ<QC+LFkrJm`gcEQ4W)B8(kaIPY09, a?v[&2,dC*d1=(r//()e#rNas5A' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_FoodFruit';

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
