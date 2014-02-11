<?php
/**
 * AuroraCDDOutput configuration "acddo-config.php" file.
 *
 * This file has the following configurations: MySQL settings, Table Prefix Aurora CDD address and
 * the PVOutput.org API Key.
 *
 */

/* MySQL settings */
define( 'DB_NAME',     'database_name' );
define( 'DB_USER',     'database_user' );
define( 'DB_PASSWORD', 'database_password' );
define( 'DB_HOST',     'localhost' );
define( 'DB_CHARSET',  'utf8' );

/* MySQL database table prefix. */
$table_prefix = 'accdo_';

/* IP address or DNS name for the aurora CDD */
$cdd_address = '192.168.1.100';

/* PVOutput.org API Key */
$pvoutput_apikey = '0000000000000000000000000000000000000000';

/* PVOutput.org System ID */
$pvoutput_sid = '00000';
?>
