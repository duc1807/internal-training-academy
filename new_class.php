<?php
require_once("utils/connect.php");

$queryAllCourses =
    "SELECT course.id, course.name, course_topic.name 
     FROM course
     INNER JOIN course_topic ON course.topic_id = course_topic.id";
$queryAllTrainers =
    "SELECT trainer.id, trainer.name, department.name, department.location
     FROM trainer
     LEFT JOIN department ON trainer.department_id = department.id
     ORDER BY trainer.id";
$queryAllTrainees =
    "SELECT trainee.id, trainee.name, department.name, department.location
    FROM trainee
    INNER JOIN department ON trainee.department_id = department.id
    ORDER BY trainee.id;";

$resCourses = $conn->query($queryAllCourses);
$resTrainers = $conn->query($queryAllTrainers);
$resTrainees = $conn->query($queryAllTrainees);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="shortcut icon" href="assets/img/fav.ico"/>
    <meta name="author" content="Hoang Minh Tu"/>

    <title>Organise New Class</title>

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:900|Roboto:400,400i,500,700" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/css/linearicons.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap-select.css"/>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>
    <link rel="stylesheet" href="assets/css/magnific-popup.css"/>
    <link rel="stylesheet" href="assets/css/owl.carousel.css"/>

    <link rel="stylesheet" href="assets/css/hexagons.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
</head>

<body>
<!-- ================ Start Header Area ================= -->
<?php include "components/navbar.php"; ?>
<!-- ================ End Header Area ================= -->

<!-- ================ Start Banner Area ================= -->
<section class="home-banner-area">
    <div class="container">
        <div class="row justify-content-center fullscreen align-items-center">
            <div class="col-lg-5 col-md-8 home-banner-left">
                <h1 class="text-white">
                    Organise new Class
                </h1>
                <p class="mx-auto text-white  mt-20 mb-40"></p>
            </div>
            <div class="offset-lg-2 col-lg-5 col-md-12 home-banner-right">
                <img class="img-fluid" src="assets/img/header-img.png" alt=""/>
            </div>
        </div>
    </div>
</section>
<!-- ================ End Banner Area ================= -->

<!-- ================ Start Feature Area ================= -->
<section class="feature-area">
    <div class="container-fluid">
        <div class="feature-inner row">
            <div class="col p-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="controllers/create_class.php" method="POST" id="new_class">
                            <div class="row mb-4">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="pick-course">Pick a Course: </label>
                                        <select class="selectpicker form-control" id="pick-course"
                                                form="new_class" name="course"
                                                data-live-search="true"
                                                title="(Course ID) Course Name [Course Topic]">
                                            <?php while ($rowCourse = $resCourses->fetch_array(MYSQL_NUM)) { ?>
                                                <option value="<?php echo $rowCourse[0]; ?>">
                                                    <?php echo "($rowCourse[0]) $rowCourse[1] [$rowCourse[2]]" ?>
                                                </option>
                                            <?php }; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="pick-course">Pick a Trainer: </label>
                                        <select class="selectpicker form-control" id="pick-course"
                                                form="new_class" name="trainer"
                                                data-live-search="true"
                                                title="(Trainer ID) Trainer Name [Department]">
                                            <?php while ($rowTrainer = $resTrainers->fetch_array(MYSQL_NUM)) { ?>
                                                <option value="<?php echo $rowTrainer[0]; ?>">
                                                    <?php echo "($rowTrainer[0]) $rowTrainer[1] [$rowTrainer[2] - $rowTrainer[3]]" ?>
                                                </option>
                                            <?php }; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="pick-course">Add Trainees to this Class: </label>
                                        <select class="selectpicker form-control" id="pick-course"
                                                form="new_class" name="trainees[]"
                                                data-live-search="true"
                                                multiple
                                                title="(Trainee ID) Trainee Name [Department]">
                                            <?php while ($rowTrainee = $resTrainees->fetch_array(MYSQL_NUM)) { ?>
                                                <option value="<?php echo $rowTrainee[0]; ?>">
                                                    <?php echo "($rowTrainee[0]) $rowTrainee[1] [$rowTrainee[2] - $rowTrainee[3]]" ?>
                                                </option>
                                            <?php }; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-2">
                                <em>Please note that you can't proceed if all information required hasn't been inputted!</em>
                            </div>
                            <div class="row pt-3">
                                <div class="col-md-6">
                                    <a class="btn btn-dark text-white float-left" name="backBtn"
                                       href="classes.php">
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
</section>
<!-- ================ End Feature Area ================= -->

<!-- ================ Start Footer Area ================= -->
<?php include "components/footer.php"; ?>
<!-- ================ End Footer Area ================= -->

<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="assets/js/vendor/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<script src="assets/js/jquery.ajaxchimp.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/parallax.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.sticky.js"></script>
<script src="assets/js/hexagons.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>

<script src="assets/js/main.js"></script>
</body>

</html>