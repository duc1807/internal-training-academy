<?php

require_once("connect.php");
$CourseID = $_GET['GetID'];
$query = " SELECT * FROM course_it WHERE Course_ID ='" . $CourseID . "'";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $CourseID = $row['Course_ID'];
    $CourseName = $row['Course_Name'];
    $CourseClass = $row['Course_Class'];
    $CourseDate = $row['Course_Date'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
    <title>Document</title>
</head>
<body class="bg-dark">

<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card mt-5">
                <div class="card-title">
                    <h3 class="bg-success text-white text-center py-3"> Update Form in PHP</h3>
                </div>
                <div class="card-body">

                    <form action="update_course_it.php?ID=<?php echo $CourseID ?>" method="post">
                        <input type="text" class="form-control mb-2" placeholder="Course Name " name="coursename"
                               value="<?php echo $CourseName ?>">
                        <input type="text" class="form-control mb-2" placeholder="Course Class " name="courseclass"
                               value="<?php echo $CourseClass ?>">
                        <input type="text" class="form-control mb-2" placeholder="Course Date " name="coursedate"
                               value="<?php echo $CourseDate ?>">
                        <button class="btn btn-primary" name="update">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>