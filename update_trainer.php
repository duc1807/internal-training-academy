<?php

require_once("connect.php");

if (isset($_POST['update'])) {
    $UserID = $_GET['ID'];
    $UserName = $_POST['name'];
    $UserEmail = $_POST['email'];

    $query = " UPDATE records SET User_Name = '" . $UserName . "', User_Email='" . $UserEmail . "' 
               WHERE User_ID='" . $UserID . "'";
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

