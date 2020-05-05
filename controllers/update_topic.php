<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/appdev/utils/connect.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['id']) || empty($_POST['name']) || empty($_POST['category'])) {
        header("location: ../new_topic.php");
    } else {
        $thisId = $_GET['id'];
        $topicId = $_POST['id'];
        $topicName = $_POST['name'];
        $catId = $_POST['category'];
        $description = $_POST['desc'];
        $query = "";

        if (empty($_POST['desc'])) {
            $query = "UPDATE course_topic
                      SET id = '$topicId', name = '$topicName', category_id = '$catId'
                      WHERE id = '$thisId'";
        } else {
            $query = "UPDATE course_topic
                      SET id = '$topicId', name = '$topicName', category_id = '$catId', description = '$description'
                      WHERE id = '$thisId'";
        }

        $result = $conn->query($query);
        if ($result) {
            header("location: ../topics.php");
        } else {
            ?>
            <script>
                alert("Something went wrong! Please try again! ");
            </script>
            <?php
        }
    }
} else {
    header("location: ../new_topic.php");
}

?>