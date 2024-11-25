<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'blog' );

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
define( 'AUTH_KEY',         'nK&rLA7(0~]kjh1! exs|!mfmg2*Ri!I5R&i%}ahsGXazt/af/@4{7%V`O1D>hW^' );
define( 'SECURE_AUTH_KEY',  'X:*c~OW+&5-%Q-#uRZ9go)A#Gd}o]TxJ1&;[Qc[PL%)].PCm}H, _3R(xIdRJf U' );
define( 'LOGGED_IN_KEY',    'x<bh}>k,S}<S<+&WRhEH4pX[`K@gQf0qoFhc>3#-@R}1FS2*|si4x575pSO%aK+m' );
define( 'NONCE_KEY',        'C)3BxpV@YZvXox{=B374B|N7TV<< ^Z$Ls`0xHkeF`=<am,szD0{ntiWqu:C<)fH' );
define( 'AUTH_SALT',        'v7SrNp!HgB<a2i+_Kpcj4m%^v8A6avL-y VZdS&eAG%-x Ihb4!3 eT<s$kij55S' );
define( 'SECURE_AUTH_SALT', 'p}!N-MTVjVZ#Ce$q;Sp5f)<M)@nj{3G|Awl/GJMX=O%,GXo+4un}9~&-4Fo90<i/' );
define( 'LOGGED_IN_SALT',   '- +~w:n>!@t1UK!akZ$buk~[Dgyjj%wnO5%xzJs+QC#BI%JgLCWoVyN$2;k@M/Hp' );
define( 'NONCE_SALT',       '$|I m_MA0ik1_do]%3+m}?E=kmG(oPzG5jn:4}jxHy(6av%^KI_FJ/VD jk@CG-3' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
