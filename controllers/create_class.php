<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/appdev/utils/connect.php");
function insertClassPlacements ($_mysqliConn, $_studentIds, $_classId) {
    foreach ($_studentIds as $_studentId) {
        $queryDuplicateClassPlacement =
            "SELECT id FROM class_placement WHERE class_id='$_classId' AND student_id='$_studentId'";

        $_res = $_mysqliConn->query($queryDuplicateClassPlacement);
        $_row = $_res->fetch_array(MYSQL_NUM);

        if ($_row == NULL) {
            $_mysqliConn->query("INSERT INTO class_placement (class_id, student_id) VALUE ($_classId, $_studentId)");
        }
    }

    header("location: ../classes.php");
}

if (isset($_POST['submit'])) {
    if (empty($_POST['course']) || empty($_POST['trainer']) || empty($_POST['trainees'])) {
        header("location: ../new_class.php");
    } else {
        $courseId = $_POST['course'];
        $trainerId = $_POST['trainer'];
        $traineeIds = $_POST['trainees'];

        // First, add this requested `Class` row to the database
        $queryDuplicateClass = "SELECT id FROM class WHERE course_id='$courseId' AND trainer_id='$trainerId'";
        $resDupClass = $conn->query($queryDuplicateClass);

        if ($rowDupClass = $resDupClass->fetch_array(MYSQL_NUM)) {
            // the requested class already existed
            $classId = $rowDupClass[0];
            insertClassPlacements($conn, $traineeIds, $classId);
        } else {
            // the requested class hasn't existed
            $queryInsertClass = "INSERT INTO class (course_id, trainer_id) VALUES ('$courseId', '$trainerId'); ";
            $conn->query($queryInsertClass);
            $classId = $conn->insert_id;
            insertClassPlacements($conn, $traineeIds, $classId);
        }
    }
} else {
    header("location: ../new_class.php");
}

?>