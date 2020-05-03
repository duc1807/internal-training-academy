<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/appdev/utils/connect.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['course_id']) || empty($_POST['course_name']) || empty($_POST['topic'])) {
      header("location: ../new_course.php");
    } else {
        $courseId = $_POST['course_id'];
        $courseName = $_POST['course_name'];
        $topic_id = $_POST['topic'];
        $description = $_POST['desc'];
        $query = "";

        if (empty($_POST['desc'])) {
            $query = "INSERT INTO course (id, topic_id, name) 
                        VALUES ('$courseId', '$topic_id', '$courseName')";
        } else {
            $query = "INSERT INTO course (id, topic_id, name, description) 
                        VALUES ('$courseId', '$topic_id', '$courseName', '$description')";
        }

        $result = $conn->query($query);
        if ($result) {
            header("location: ../courses.php");
        } else {
            ?>
            <script>
                alert("Something went wrong! Please try again! ");
            </script>
<?php
        }
    }
} else {
    header("location: ../new_course.php");
}

?>