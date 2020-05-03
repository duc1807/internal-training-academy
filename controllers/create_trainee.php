<?php

require_once("../utils/connect.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['name']) || empty($_POST['email'])) {
        echo ' Please Fill in the Blanks ';
    } else {
        $UserName = $_POST['name'];
        $UserEmail = $_POST['email'];

        $query = " insert into trainee (User_Name, User_Email) values('$UserName','$UserEmail')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("location:trainee_accounts.php");
        } else {
            echo '  Please Check Your Query ';
        }
    }
} else {
    header("location:register_trainee.php");
}


?>