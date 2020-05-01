<?php

        require_once("connect.php");


        if(isset($_GET['Del']))
        {
            $CourseID = $_GET['Del'];
            $query = " delete from course_it where Course_ID = '".$CourseID."'";
            $result = mysqli_query($conn,$query);
 
            if($result)
            {
                header("location:view_course_it.php");
            }
            else
            {
                echo ' Please Check Your Query ';
            }
        }
        else
        {
            header("location:view_course_it.php");
        }
 
?>