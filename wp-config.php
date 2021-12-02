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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'recrutement' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'eldf,>Q6mLG>Pkw) ;R;vH7N6dFg<A|>gC>(&$ozfh!zP6G]O1~](r#G)ko<?X`*' );
define( 'SECURE_AUTH_KEY',  '-I+4n|c4bB@W{7eaw$ EffvK4EWNaD_.x(F:EQpk=MSR@3/47R1k[SEPS?V#z.&i' );
define( 'LOGGED_IN_KEY',    '8<jgzft#m=F7 gl}#b}[O*W%YW8p{eo3iBfdIk{BIRr$)Oz{P//Z@*}tL1LBeyZR' );
define( 'NONCE_KEY',        'H4xV7l2o>WK@b;U)PfAU>?6r4>q&i=UMX?!yp:t.BzJpsvZ.iBJR;GFFFXpc_eD<' );
define( 'AUTH_SALT',        'O(z(]L$z_cNQq.?:O;]}t)gvHis|4W9}Q6qp18z1y#N<. 8tn9Bl1$H ;iA/:Y+*' );
define( 'SECURE_AUTH_SALT', 'so5.BgE$/C2JY_zkWndz^]fu;`mS%xKxe_&y7.1l<{4I7iJ^~)^>&*mwFzO Hd<G' );
define( 'LOGGED_IN_SALT',   '*^Ngvx|!9LB*v*B_o=x#-_:TvB}#3Cw8hL+m7Fn~wW[ViIWR>E.6Yw,k2idnlLJS' );
define( 'NONCE_SALT',       'v4g@J;X0),4s4B_l[{@qg.y^qZ^>qT/PErM1e1{2;SM^{eCMTL7X%&G8mX-%ISTK' );

/**#@-*/

/**
 * WordPress database table prefix.
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
