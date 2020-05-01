<?php

require_once("connect.php");

if (isset($_POST['update'])) {
    $UserID = $_GET['ID'];
    $UserName = $_POST['name'];
    $UserEmail = $_POST['email'];

    $query = " update trainee set User_Name = '" . $UserName . "', User_Email='" . $UserEmail . "' where User_ID='" . $UserID . "'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("location:view_trainee.php");
    } else {
        echo ' Please Check Your Query ';
    }
} else {
    header("location:view_trainee.php");
}


?>