<?php
/* Note: Development of this application is strongly reliant on XAMPP
         for this reason, these configurations below are defined for PHPMyAdmin
 */
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'asm';
$port = 3306;

/* ARG:     string representing SQL query
   RETURN:  all result rows as an associative array, a numeric array, or both
*/
function query($sqlString)
{
    global $hostname;
    global $username;
    global $password;
    global $dbname;
    global $port;
    $conn = new mysqli($hostname, $username, $password, $dbname, $port);

    if ($conn->connect_error) {
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Unable to connect to the database";
        die($conn->connect_error);
    }

    $result = $conn->query($sqlString);
    if (!$result) {
        echo "Unable to execute the requested database query";
        die ($conn->error);
    }

    return mysqli_fetch_all($result);
}

?>