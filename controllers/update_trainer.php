<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/appdev/utils/connect.php");

if (isset($_POST['submit'])) {
    $userId = $_GET['user_id'];
    $trainerName = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phoneNum = $_POST['phone_number'];
    $departmentId = $_POST['department'];
    $isContractor = $_POST['is_contractor'];
    $desc = $_POST['desc'];

    if (empty($trainerName) || empty($username) || empty($password)
        || empty($email) || empty($phoneNum) || empty($isContractor)
    ) {
        header("location: ../edit_user.php?id=" . $userId);
    }
    else {
        $queryUpdateTrainerInfo = "";
        $queryUpdateAccountInfo = "UPDATE system_user
                                   SET username='$username', password='$password'
                                   WHERE id='$userId'";

        if (isset($departmentId)) {
            $queryUpdateTrainerInfo =
                "UPDATE trainer
                 SET department_id='$departmentId', name='$trainerName', 
                    email='$email', phone_number='$phoneNum', 
                    is_contractor='$isContractor', self_description='$desc'
                 WHERE user_id='$userId'";
        } else {
            $queryUpdateTrainerInfo =
                "UPDATE trainer
                 SET  name='$trainerName', email='$email', phone_number='$phoneNum', 
                    is_contractor='$isContractor', self_description='$desc'
                 WHERE user_id='$userId'";
        }

        $result = $conn->query($queryUpdateAccountInfo);
        if (!$result) {
            ?>
            <script>
                alert("Something went wrong! Please try again! ");
            </script>
            <?php
        }

        $result = $conn->query($queryUpdateTrainerInfo);
        if ($result) {
            header("location: ../trainer_accounts.php");
        } else {
            ?>
            <script>
                alert("Something went wrong! Please try again! ");
            </script>
            <?php
        }
    }
} else {
    header("location: ../trainer_accounts.php");
}

?>