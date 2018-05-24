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
define('DB_NAME', 'exitoinm_mi760');

/** MySQL database username */
define('DB_USER', 'exitoinm_mi760');

/** MySQL database password */
define('DB_PASSWORD', 'F3-8P6rL.S');

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
define('AUTH_KEY',         'doowlgf0r7jfu7gsq1nuoamngr0h35apb75mclwhlp9613b8qxvceqnt4zqyveb5');
define('SECURE_AUTH_KEY',  'bw8sf4apx7jqjhxmqtsuvernpkqhvm5rgbyhba1dpnldjjztzuxm7k4fcvnqj5zd');
define('LOGGED_IN_KEY',    'jwskmx0hf2kgrpsrhpfq5o0uybd4fxlvzuekddqhfvegcnp9lugjoqcostqz2hhs');
define('NONCE_KEY',        'zmyulevmdmqka7cghawrwzvvwiuqmtrfh31erwwkfwapftokwrnkcbtg9ub0al5i');
define('AUTH_SALT',        'pgneun0r4qqydbv1ka6qpn04d3doq5zlvrwgsgof1qaksxscol5ikcpc4cqmx2uf');
define('SECURE_AUTH_SALT', 'spnilkxjlwuqeovfhxrw7itzhhqcqvnvkx5prycm4poprgly6elrgm0wykivhjec');
define('LOGGED_IN_SALT',   '1q16olrweoh9ot7i041ypt6ijclcgucpkguomxotsw2mij4lzrflveef9pd6l5op');
define('NONCE_SALT',       'cygfkjauxj4tc7farabdypwbqlzspy7bwzkr0bhh36pxhsrq3kfsxffymbz44daw');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'miu0_';

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
