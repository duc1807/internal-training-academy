<?php
session_start();
require_once("utils/connect.php");

$thisId = $_GET['id'];

$query =
    "SELECT course.name, course_topic.name, cc.name, course.description
     FROM course
     LEFT JOIN course_topic ON course_topic.id = course.topic_id
     LEFT JOIN course_category cc ON course_topic.category_id = cc.id
     WHERE course.id = '$thisId';";

$queryActiveClass =
    "SELECT class.id, trainer.name
     FROM class
     INNER JOIN trainer ON class.trainer_id = trainer.id
     WHERE course_id = '$thisId'";

$resThis = $conn->query($query);
$resThisClasses = $conn->query($queryActiveClass);

$row = $resThis->fetch_array(MYSQL_NUM);

$thisName = $row[0];
$thisTopicName = "$row[1] ($row[2])";
$thisDesc = $row[3];
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="shortcut icon" href="assets/img/fav.ico"/>
    <meta name="author" content="Hoang Minh Tu"/>

    <title>Details of Course ID <?php echo $thisId; ?></title>

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
                    Course Details
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
                                <td><h5 class=" font-weight-bold text-dark">Course ID</h5></td>
                                <td>
                                    <?php echo $thisId; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><h5 class=" font-weight-bold text-dark">Course Name</h5></td>
                                <td>
                                    <?php echo $thisName; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><h5 class=" font-weight-bold text-dark">Topic (Name & Its Category)</h5></td>
                                <td>
                                    <?php echo $thisTopicName; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><h5 class=" font-weight-bold text-dark">Description</h5></td>
                                <td>
                                    <?php echo $thisDesc; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><h5 class="font-weight-bold text-dark">Active Classes (Class ID & Trainer)</h5></td>
                                <td>
                                    <?php while ($rowClass = $resThisClasses->fetch_array(MYSQL_NUM)) { ?>
                                        <a href="class_details.php?id=<?php echo $rowClass[0]; ?>">
                                            (<?php echo $rowClass[0]; ?>) - <?php echo $rowClass[1];?>
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
