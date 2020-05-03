<?php
require_once("../utils/connect.php");

if (isset($_GET['id'])) {
    $courseId = $_GET['id'];
    $query = "DELETE FROM course WHERE id = '$courseId'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("location: ../courses.php");
    } else {
        echo 'Something went wrong with the query!';
    }
} else {
    header("location: ../courses.php");
}
?>