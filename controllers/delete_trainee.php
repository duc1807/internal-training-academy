<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/appdev/utils/connect.php");

if (isset($_GET['id'])) {
    $traineeId = $_GET['id'];
    $query = "DELETE FROM trainee WHERE id = '$traineeId'";
    $result = $conn->query($query);

    if ($result) {
        header("location: ../trainee_accounts.php");
    } else {
        echo 'Something went wrong with the query!';
    }
} else {
    header("location: ../trainee_accounts.php");
}
?>