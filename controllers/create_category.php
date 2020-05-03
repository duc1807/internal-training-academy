<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/appdev/utils/connect.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['id']) || empty($_POST['name'])) {
        header("location: ../new_category.php");
    } else {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $query = "";

        if (empty($_POST['desc'])) {
            $query = "INSERT INTO course_category (id, name) VALUES ('$id','$name')";
        } else {
            $query = "INSERT INTO course_category (id, name, description) VALUES ('$id', '$name', '$desc')";
        }

        $result = $conn->query($query);
        if ($result) {
            header("location: ../categories.php");
        } else {
            ?>
            <script>
                alert("Something went wrong! Please try again! ");
            </script>
            <?php
        }
    }
} else {
    header("location: ../categories.php");
}

?>