<?php
/* Note: Development of this application is strongly reliant on XAMPP
         for this reason, these configurations below are defined for PHPMyAdmin
 */

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'appdev';
$port = 3306;

$conn = new mysqli($hostname, $username, $password, $dbname, $port);

if (!$conn) {
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    die("Unable to connect to MySQL utils!");
}

// "SET NAMES 'UTF8'" may be needed in case utils having UTF-8 encoded characters
?> 
