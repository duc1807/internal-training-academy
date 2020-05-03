<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/appdev/utils/connect.php");

if (isset($_GET['id'])) {
    $trainerId = $_GET['id'];
    $query = "DELETE FROM trainer WHERE id = '$trainerId'";
    $result = $conn->query($query);

    if ($result) {
        header("location: ../trainer_accounts.php");
    } else {
        echo 'Something went wrong with the query!';
    }
} else {
    header("location: ../trainer_accounts.php");
}
?>