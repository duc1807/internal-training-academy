<?php
require_once("utils/connect.php");

$thisClassId = $_GET['id'];

$query =
    "SELECT class.id, course.id, course.name, course_topic.name,
        trainer.id, trainer.name, department.name, department.location
     FROM class
     INNER JOIN course ON class.course_id = course.id
     INNER JOIN course_topic ON course.topic_id = course_topic.id
     INNER JOIN trainer ON class.trainer_id = trainer.id
     LEFT JOIN department ON trainer.department_id = department.id
     WHERE class.id = '$thisClassId'";

$queryStudents =
    "SELECT class_placement.student_id, trainee.name, d.name, d.location 
     FROM class_placement 
     INNER JOIN trainee ON trainee.id = class_placement.student_id
     INNER JOIN department d ON trainee.department_id = d.id
     WHERE class_id ='$thisClassId'";

$resThisClass = $conn->query($query);
$rowClass = $resThisClass->fetch_array(MYSQL_NUM);

$resStds = $conn->query($queryStudents);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="shortcut icon" href="assets/img/fav.ico"/>
    <meta name="author" content="Hoang Minh Tu"/>

    <title>Details of Class ID <?php echo $thisClassId; ?></title>

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:900|Roboto:400,400i,500,700" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/css/linearicons.css"/>
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
                    Class Details
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
<section class="feature-area text-dark">
    <div class="container">
        <div class="feature-inner row">
            <div class="col p-auto">
                <div class="card mt-5 ml-5 pt-3 pl-3">
                    <div class="table-responsive card-body">
                        <table class="table">
                            <tbody class="text-dark">
                            <tr>
                                <td><h5 class=" font-weight-bold text-dark">Class ID</h5></td>
                                <td>
                                    <?php echo $rowClass[0]; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><h5 class=" font-weight-bold text-dark">Course (ID, Name, Topic)</h5></td>
                                <td>
                                    <a href="./course_details.php?id=<?php echo $rowClass[1]; ?>">
                                        <?php echo "($rowClass[1]) $rowClass[2] [$rowClass[3]]"; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><h5 class=" font-weight-bold text-dark">Trainer (ID, Name & Department)</h5></td>
                                <td>
                                    <a href="./trainer_details.php?id=<?php echo $rowClass[4]; ?>">
                                        <?php echo "($rowClass[4]) $rowClass[5] [$rowClass[6]-$rowClass[7]]"; ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td><h5 class=" font-weight-bold text-dark">Students (ID, Name & Department)</h5></td>
                                <td>
                                    <?php while ($rowStd = $resStds->fetch_array(MYSQL_NUM)) {?>
                                        <a href="./trainee_details.php?id=<?php echo $rowStd[0]; ?>">
                                            <?php echo "($rowStd[0]) $rowStd[1] [$rowStd[2]-$rowStd[3]]"; ?>
                                        </a>
                                        <br/>
                                    <?php }; ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
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