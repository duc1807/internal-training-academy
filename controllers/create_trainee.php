<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/appdev/utils/connect.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['name']) || empty($_POST['username']) || empty($_POST['password'])
        || empty($_POST['email']) || empty($_POST['phone_number']) || empty($_POST['department'])
    ) {
        header("location: ../new_trainee.php");
    } else {
        $traineeName = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phoneNum = $_POST['phone_number'];
        $departmentId = $_POST['department'];

        $queryInsertUser = "INSERT INTO system_user (user_role_id, username, password)
                    VALUES (4, '$username', '$password'); ";

        if (!$conn->query($queryInsertUser)) {
            ?>
            <script>
                alert("Something went wrong! Please try again! ");
            </script>
            <?php
        } else {
            $user_id = $conn->insert_id;
            $queryInsertTrainee = "INSERT INTO trainee (user_id, department_id, name, email, phone_number)
                    VALUE ('$user_id', '$departmentId', '$traineeName', '$email', '$phoneNum')";
            if ($conn->query($queryInsertTrainee)) {
                header("location: ../trainee_accounts.php");
            } else {
                header("location: ../new_trainee.php");
            }
        }
    }
} else {
    header("location: ../new_trainee.php");
}

?>