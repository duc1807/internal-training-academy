<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/appdev/utils/connect.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['name']) || empty($_POST['username']) || empty($_POST['password'])
        || empty($_POST['email']) || empty($_POST['phone_number'])
    ) {
        header("location: ../new_trainer.php");
    } else {
        $trainerName = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phoneNum = $_POST['phone_number'];
        $departmentId = $_POST['department'];
        $isContractor = $_POST['is_contractor'];

        $queryInsertUser = "INSERT INTO system_user (user_role_id, username, password)
                    VALUES (3, '$username', '$password'); ";

        if (!$conn->query($queryInsertUser)) {
            ?>
            <script>
                alert("Something went wrong! Please try again! ");
            </script>
            <?php
        } else {
            $user_id = $conn->insert_id;
            $queryInsertTrainer =
                "INSERT INTO trainer (user_id, department_id, name, email, phone_number, is_contractor)
                 VALUE ('$user_id', '$departmentId', '$trainerName', '$email', '$phoneNum', '$isContractor')";
            if ($conn->query($queryInsertTrainer)) {
                header("location: ../trainer_accounts.php");
            } else {
                header("location: ../new_trainer.php");
            }
        }
    }
} else {
    header("location: ../new_trainer.php");
}

?>