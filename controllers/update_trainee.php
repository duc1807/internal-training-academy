<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/appdev/utils/connect.php");

if (isset($_POST['submit'])) {
    $userId = $_GET['user_id'];
    $traineeName = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phoneNum = $_POST['phone_number'];
    $departmentId = $_POST['department'];
    $ielts = $_POST['ielts'];
    $desc = $_POST['desc'];

    if (empty($traineeName) || empty($username) || empty($password)
       || empty($email) || empty($phoneNum) || empty($departmentId)
    ) {
        header("location: ../edit_user.php?id=" . $userId);
    }
    else {
        $queryUpdateAccountInfo = "UPDATE system_user
                                   SET username='$username', password='$password'
                                   WHERE id='$userId'";
        $queryUpdateTraineeInfo =
            "UPDATE trainee
            SET department_id='$departmentId', name='$traineeName', 
                email='$email', phone_number='$phoneNum', 
                ielts_score='$ielts', self_description='$desc'
            WHERE user_id='$userId'";

        $result = $conn->query($queryUpdateAccountInfo);
        if (!$result) {
            ?>
            <script>
                alert("Something went wrong! Please try again! ");
            </script>
            <?php
        }

        $result = $conn->query($queryUpdateTraineeInfo);
        if ($result) {
            header("location: ../trainee_accounts.php");
        } else {
            ?>
            <script>
                alert("Something went wrong! Please try again! ");
            </script>
            <?php
        }
    }
} else {
    header("location: ../trainee_accounts.php");
}

?>