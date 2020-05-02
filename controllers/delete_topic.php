<?php

require_once("../utils/connect.php");


if (isset($_GET['Del'])) {
    $TopicID = $_GET['Del'];
    $query = " delete from topic where Topic_ID = '" . $TopicID . "'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("location:view_topic.php");
    } else {
        echo ' Please Check Your Query ';
    }
} else {
    header("location:view_topic.php");
}

?>