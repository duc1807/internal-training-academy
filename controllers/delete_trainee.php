<?php

require_once("../utils/connect.php");

if (isset($_GET['Del'])) {
    $UserID = $_GET['Del'];
    $query = " delete from trainee where User_ID = '" . $UserID . "'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("location:trainee_accounts.php");
    } else {
        echo ' Please Check Your Query ';
    }
} else {
    header("location:trainee_accounts.php");
}


?>