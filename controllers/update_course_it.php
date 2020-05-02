<?php

require_once("../utils/connect.php");

if (isset($_POST['update'])) {
    $CourseID = $_GET['ID'];
    $CourseName = $_POST['coursename'];
    $CourseClass = $_POST['courseclass'];
    $CourseDate = $_POST['coursedate'];

    $query = " update course_it set Course_Name = '" . $CourseName . "', Course_Class ='" . $CourseClass . "',Course_Date ='" . $CourseDate . "' where Course_ID='" . $CourseID . "'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("location:view_course_it.php");
    } else {
        echo ' Please Check Your Query ';
    }
} else {
    header("location:view_course_it.php");
}


?>