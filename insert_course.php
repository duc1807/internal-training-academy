<?php

    require_once("connect.php");

    if(isset($_POST['submit']))
    {
        if(empty($_POST['coursename']) || empty($_POST['courseclass']) || empty($_POST['coursedate']))
        {
            echo ' Please Fill in the Blanks ';
        }
        else
        {
            $CourseName = $_POST['coursename'];
            $CourseClass = $_POST['courseclass'];
            $CourseDate = $_POST['coursedate'];

            $query = " insert into course_it (Course_Name, Course_Class, Course_Date) values ('$CourseName','$CourseClass','$CourseDate')";
            $result = mysqli_query($conn,$query);

            if($result)
            {
                header("location:view_course_it.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        header("location:register_Course.php");
    }



?>