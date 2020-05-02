<?php

require_once("../utils/connect.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['topicname']) || empty($_POST['topicexplain']) || empty($_POST['topicdate']) || empty($_POST['topicexpired'])) {
        echo ' Please Fill in the Blanks ';
    } else {
        $TopicName = $_POST['topicname'];
        $TopicExplain = $_POST['topicexplain'];
        $TopicDate = $_POST['topicdate'];
        $TopicExpired = $_POST['topicexpired'];

        $query = " insert into topic (Topic_Name, Topic_Explain, Topic_Datecreate, Topic_Expired) values('$TopicName','$TopicExplain','$TopicDate','$TopicExpired')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("location:view_topic.php");
        } else {
            echo '  Please Check Your Query ';
        }
    }
} else {
    header("location:register_topic.php");
}


?>