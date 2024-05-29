<?php
@ini_set('session.cookie_httponly', 1);
@ini_set('session.use_only_cookies', 1);
if (version_compare(PHP_VERSION, '8.1.0', '<')) {
    exit("Required PHP_VERSION >= 8.1.0 , Your PHP version is: " . PHP_VERSION . "\n");
}
if (!function_exists("mysqli_connect")) {
    exit("MySQLi extension is required to run the application. Please enable the PHP MySQLi extension in your server configuration.");
}
date_default_timezone_set('UTC');
session_start();
@ini_set('gd.jpeg_ignore_warning', 1);
require_once('luisincludes/librerias/DB/vendor/joshcam/mysqli-database-class/MySQL-Maria.php');
require_once('includes/cache.php');
require_once('includes/funcion_general.php');
require_once('includes/tablas.php');
require_once('includes/funcion_uno.php');
require_once('includes/funcion_dos.php');
require_once('includes/funcion_tres.php');
?>