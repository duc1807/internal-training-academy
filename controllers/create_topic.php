<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/appdev/utils/connect.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['id']) || empty($_POST['name']) || empty($_POST['category'])) {
        header("location: ../new_topic.php");
    } else {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $categoryId = $_POST['category'];
        $desc = $_POST['desc'];
        $query = "";

        if (empty($_POST['desc'])) {
            $query = "INSERT INTO course_topic (id, category_id, name) 
                        VALUES ('$id', '$categoryId', '$name')";
        } else {
            $query = "INSERT INTO course_topic (id, category_id, name, description) 
                        VALUES ('$id', '$categoryId', '$name', '$desc')";
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
    header("location: ../topics.php");
}

?>