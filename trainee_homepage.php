<?php
session_start();
require_once("utils/connect.php");
$thisId = $_SESSION['user_id'];

$queryName = "SELECT trainee.name, trainee.id 
              FROM trainee 
              INNER JOIN system_user su ON trainee.user_id = su.id
              WHERE su.id = '$thisId'";

$res = $conn->query($queryName);
$row = $res->fetch_array(MYSQL_NUM);
$thisFullName = $row[0];
$thisTrId = $row[1];

$queryAssignedClasses =
    "SELECT class.id, course.name, topic.name, trainer.id, trainer.name, course.description
     FROM class_placement cp
     INNER JOIN class ON cp.class_id = class.id
     INNER JOIN trainer ON class.trainer_id = trainer.id
     INNER JOIN course ON class.course_id = course.id
     INNER JOIN course_topic topic ON course.topic_id = topic.id
     WHERE cp.student_id='$thisTrId'
     ORDER BY class.id";

$res = $conn->query($queryAssignedClasses);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="shortcut icon" href="assets/img/fav.ico"/>
    <meta name="author" content="Hoang Minh Tu"/>

    <title>Internal Training Academy ::  <?php echo $_SESSION['role']; ?></title>

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:900|Roboto:400,400i,500,700" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/css/linearicons.css"/>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>



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
                    Welcome back, <em><?php echo $thisFullName; ?></em> !
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
    <div class="container">
        <div class="feature-inner row">
            <div class="col p-auto">
                <div class="card mt-5 ml-5 pt-3 pl-3">
                    <h2 class="card-title">
                        Your Assigned Classes
                    </h2>
                    <div class="table-responsive card-body" id="all-user-accounts">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Class ID</th>
                                <th>Course (Name & Topic)</th>
                                <th>Trainer (ID & Name)</th>
                                <th>Course Description</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $res->fetch_array(MYSQL_NUM)) { ?>
                                <tr>
                                    <td>
                                        <a href="./class_details.php?id=<?php echo $row[0]; ?>">
                                            <?php echo $row[0]; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="./class_details.php?id=<?php echo $row[0]; ?>">
                                            <?php echo "$row[1] ($row[2])"; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="./trainer_details.php?id=<?php echo $row[3]; ?>">
                                            <?php echo "($row[3]) $row[4]"; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <em><?php echo $row[5]; ?></em>
                                    </td>
                                </tr>
                                <?php }; ?>
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

<script src="assets/js/parallax.min.js"></script>

<script src="assets/js/jquery.sticky.js"></script>
<script src="assets/js/hexagons.min.js"></script>

<script src="assets/js/waypoints.min.js"></script>

<script src="assets/js/main.js"></script>
</body>

</html>