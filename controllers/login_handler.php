<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/appdev/utils/connect.php");

$warning_message = "Please re-check your login credentials!";

if (isset($_POST["btnLogin"])) {
    $username = $_POST["user"];
    $password = $_POST["pass"];

    $sql_query =
        "SELECT * FROM system_user WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($conn, $sql_query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["user_role_id"] == 1) {
                $_SESSION['user_id'] = $row["id"];
                $_SESSION['username'] = $row["username"];
                $_SESSION['role'] = "Admin";
                header('location: admin.php');
            }
            elseif ($row["user_role_id"] == 2) {
                $_SESSION['user_id'] = $row["id"];
                $_SESSION['username'] = $row["username"];
                $_SESSION['role'] = "Training Staff";
                header('location: staff_homepage.php');
            }
            elseif ($row["user_role_id"] == 3) {
                $_SESSION['user_id'] = $row["id"];
                $_SESSION['username'] = $row["username"];
                $_SESSION['role'] = "Trainer";
                header('location: trainer_homepage.php');
            }
            elseif ($row["user_role_id"] == 4) {
                $_SESSION['user_id'] = $row["id"];
                $_SESSION['username'] = $row["username"];
                $_SESSION['role'] = "Trainee";
                header('location: trainee_homepage.php');
            }
        }
    } else {
        echo "<script> alert('$warning_message')</script>";
    }
}
?>