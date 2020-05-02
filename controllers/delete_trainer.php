<?php

require_once("../utils/connect.php");

if (isset($_GET['Del'])) {
    $UserID = $_GET['Del'];
    $query = " delete from records where User_ID = '" . $UserID . "'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("location:view_trainer.php");

    } else {
        echo ' Please Check Your Query ';
    }
} else {
    header("location:view_trainer.php");
}


?>