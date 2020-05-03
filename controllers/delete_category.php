<?php

require_once("../utils/connect.php");

if (isset($_GET['id'])) {
    $catId = $_GET['id'];
    $query = "DELETE FROM course_category WHERE id = '$catId'";
    $result = $conn->query($query);

    if ($result) {
        header("location: ../categories.php");
    } else {
        echo 'Something went wrong with the query!';
    }
} else {
    header("location: ../categories.php");
}
?>