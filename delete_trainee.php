<?php 
 
        require_once("connect.php ");
 
        if(isset($_GET['Del']))
        {
            $UserID = $_GET['Del'];
            $query = " delete from trainee where User_ID = '".$UserID."'";
            $result = mysqli_query($conn,$query);
 
            if($result)
            {
                header("location:view_trainee.php");
            }
            else
            {
                echo ' Please Check Your Query ';
            }
        }
        else
        {
            header("location:view_trainee.php");
        }


?>