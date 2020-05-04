<?php
session_start();

if ($_SESSION['role'] != 'Training Staff') {
    header("location: ./index.php");
}

require_once("utils/connect.php");
$courseId = $_GET['id'];
$queryForGetCourse = " SELECT * FROM course WHERE id ='" . $courseId . "'";
$result = $conn->query($queryForGetCourse);

$queryForTopics = "SELECT id, name FROM course_topic";
$result2 = $conn->query($queryForTopics);

while ($row = $result->fetch_array(MYSQL_ASSOC)) {
    $courseName = $row['name'];
    $courseDesc = $row['description'];
    $courseTopicId = $row['topic_id'];
}
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
    <title>Edit Course <?php echo $courseId; ?></title>
</head>
<body class="bg-dark">

<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card mt-5">
                <div class="card-title">
                    <h3 class="bg-success text-white text-center py-3">Edit Course</h3>
                </div>
                <div class="card-body">
                    <form action="controllers/update_course.php?id=<?php echo $courseId; ?>" method="POST"
                          id="edit-course">
                        <label for="course-id">Course ID (integer)</label>
                        <input type="text" class="form-control mb-2" id="course-id" name="course_id"
                               value="<?php echo $courseId; ?>">
                        <label for="course-name">Course Name</label>
                        <input type="text" class="form-control mb-2" id="course-name" name="course_name"
                               value="<?php echo $courseName; ?>">
                        <label for="course-topic">Course Topic</label>
                        <select class="custom-select mb-2" id="course-topic" name="topic" form="edit-course">
                            <?php while ($row = $result2->fetch_array(MYSQL_NUM)) { ?>
                                <option
                                        value="<?php echo $row[0]; ?>"
                                    <?php if ($row[0] == $courseTopicId) { ?> selected <?php }; ?>
                                >
                                    <?php echo $row[1]; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <label for="course-desc">Description</label>
                        <input type="text" class="form-control mb-2" id="course-desc"
                               placeholder="Description (optional)"
                               name="desc" value="<?php echo $courseDesc; ?>">
                        <div class="pb-2">
                            <em>Please note that you can't proceed if all information required hasn't been
                                inputted!</em>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <button class="btn btn-dark float-left" name="submit">
                                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                                    ⮨ Back
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary float-right" name="submit">
                                    <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
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

</body>
</html>