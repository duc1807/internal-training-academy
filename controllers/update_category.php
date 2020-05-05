<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/utils/connect.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['id']) || empty($_POST['name'])) {
        header("location: ../new_category.php");
    } else {
        $thisId = $_GET['id'];
        $catId = $_POST['id'];
        $catName = $_POST['name'];
        $description = $_POST['desc'];
        $query = "";

        if (empty($_POST['desc'])) {
            $query = "UPDATE course_category
                      SET id = '$catId', name = '$catName'
                      WHERE id = '$thisId'";
        } else {
            $query = "UPDATE course_category
                      SET id = '$catId', name = '$catName', description = '$description'  
                      WHERE id = '$thisId'";
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
    header("location: ../new_category.php");
}

?>