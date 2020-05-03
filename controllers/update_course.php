<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/appdev/utils/connect.php");

if (isset($_POST['submit'])) {
    $thisId = $_GET['id'];
    $newId = $_POST['course_id'];
    $newName = $_POST['course_name'];
    $newTopicId = $_POST['topic'];
    $newDesc = $_POST['desc'];
    $query = "";

    if (empty($_POST['desc'])) {
        $query =
            "UPDATE course 
            SET id = '$newId', topic_id = '$newTopicId', name = '$newName'
            WHERE id = '$thisId'";
    } else {
        $query =
            "UPDATE course 
            SET id = '$newId', topic_id = '$newTopicId', name = '$newName', description = '$newDesc'
            WHERE id = '$thisId'";
    }

    $result = $conn->query($query);

    if ($result) {
        header("location: ../courses.php");
    } else {
        ?>
        <script>
            alert("Something went wrong! Please try again!");
        </script>
        <?php
    }
} else {
    header("location: ../courses.php");
}

?>