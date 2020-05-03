<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/appdev/utils/connect.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['id']) || empty($_POST['name']) || empty($_POST['category'])) {
        header("location: ../new_topic.php");
    } else {
        $topicId = $_POST['id'];
        $topicName = $_POST['name'];
        $catId = $_POST['category'];
        $description = $_POST['desc'];
        $query = "";

        if (empty($_POST['desc'])) {
            $query = "INSERT INTO course_topic (id, category_id, name) 
                        VALUES ('$topicId', '$catId', '$topicName')";
        } else {
            $query = "INSERT INTO course_topic (id, category_id, name, description) 
                        VALUES ('$topicId', '$catId', '$topicName', '$description')";
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