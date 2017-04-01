<?php
 
//connect.php
 
/**
 * This script connects to MySQL using the PDO object.
 * This can be included in web pages where a database connection is needed.
 * Customize these to match your MySQL database connection details.
 * This info should be available from within your hosting panel.
 */
 
//Our MySQL user account.
define('MYSQL_USER', '0709992349');
 
//Our MySQL password.
define('MYSQL_PASSWORD', 'Steina67');
 
//The server that MySQL is located on.
define('MYSQL_HOST', 'tsuts.tskoli.is');
 
//The name of our database.
define('MYSQL_DATABASE', '0709992349_vef_verkefni7');
 
/**
 * PDO options / configuration details.
 * I'm going to set the error mode to "Exceptions".
 * I'm also going to turn off emulated prepared statements.
 */
$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);
 
/**
 * Connect to MySQL and instantiate the PDO object.
 */
$pdo = new PDO(
    "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE, //DSN
    MYSQL_USER, //Username
    MYSQL_PASSWORD, //Password
    $pdoOptions //Options
);

$db_host		= 'tsuts.tskoli.is';
$db_user		= '0709992349';
$db_pass		= 'Steina67';
$db_database	= '0709992349_vef_verkefni7'; 

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//The PDO object can now be used to query MySQL.