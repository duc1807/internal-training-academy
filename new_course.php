<?php
session_start();
require_once("utils/connect.php");

if ($_SESSION['role'] != 'Training Staff') {
    header("location: ./index.php");
}

$queryForTopics = "SELECT id, name FROM course_topic";
$result = $conn->query($queryForTopics);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/fav.ico"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="assets/css/bootstrap.css"/>
    <style>
        body {
            background-image: url("https://cdn.suwalls.com/wallpapers/minimalistic/blurry-far-away-lights-51461-2880x1800.jpg");
            background-color: #cccccc;
        }
    </style>
    <title>Create new Course</title>
</head>
<body>
<div class="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-title">
                        <h2 class="bg-success text-white text-center py-3">
                            ⊕ Create New Course ⊕
                        </h2>
                    </div>
                    <div class="card-body">
                        <form action="controllers/create_course.php" method="POST" id="new_course">
                            <input type="text" class="form-control mb-2" placeholder="Course ID (integer)" name="course_id">
                            <input type="text" class="form-control mb-2" placeholder="Course Name" name="course_name">
                            <select class="custom-select mb-2" name="topic" form="new_course">
                                <option selected> Course Topic </option>
                                <?php while ($row = $result->fetch_array(MYSQL_NUM)) { ?>
                                    <option value="<?php echo $row[0]; ?>"> <?php echo $row[1]; ?> </option>
                                <?php } ?>
                            </select>
                            <input type="text" class="form-control mb-2" placeholder="Description <optional>" name="desc">
                            <div class="pb-2">
                                <em>Please note that you can't proceed if all information required hasn't been inputted!</em>
                            </div>
                            <div class="row pt-3">
                                <div class="col-md-6">
                                    <a class="btn btn-dark text-white float-left" name="backBtn"
                                        href="courses.php">
                                        ⮨ Back
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary float-right" name="submit">
                                        Submit ➦
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>