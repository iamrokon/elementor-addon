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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'tZ+GFz02sHZeDZ7oUgzgagv+rUHxWibOZR32gBjUsinp3U5rzWIzvY+573l0UpbbKI6wkSUbB3yxVyzC3/j1eA==');
define('SECURE_AUTH_KEY',  'KJJSfL5QXUM60JtGC9asRjVJ8QT4j7e+TGUyH553Sp1IY/1pDsqS4/C48QqQlNZ/sLd+Ar5y/gA4d+IcBCI00A==');
define('LOGGED_IN_KEY',    'Z03CDxoiucBKOtmytT/TokQz3NR3O7D5/+hiH91pNs8U68peNrxHakmghGXDyS1idd+FaaUpWMz0yjKsv3u2ag==');
define('NONCE_KEY',        'uLV0i8rgQyreP5bqp3cBBAPSO4e776qr6D07T9p8p5oCS3OZMQ6hHthlB7YONfsAfFppcSqJj4LDQ0ebJuOlCA==');
define('AUTH_SALT',        'ul/uB8kYEVe45lAh7G7obcnpWws4AYaVwA8afJtdGV/cJonocMGgwvnDdQg58vJ2VH6IHM8zXEsaa92buSnZ4Q==');
define('SECURE_AUTH_SALT', 'cuoqaETwZNV8h7VEVGbputIRW/SqXaVy3YmHdSlNZtvOYhh+XX9RLt83ZOi+qmLHkc//rITxHqd9aaDnr/ruIw==');
define('LOGGED_IN_SALT',   'qTT8kAmj2YugSz/8QEZ5ulWQA8XeHoQOFd3osBsoj2GayeNRGDKGwZNvhLd4DtTXHpQASREsQuUs0cbvYKOcNw==');
define('NONCE_SALT',       '99rxFIiKYQO1F+h8s9BAZhgi6/nJNxC4OS3aRa932bLQUiqmdZaQj3Xszo9wF6e79CEfcBvXoyCiFCl5AUGC9w==');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
