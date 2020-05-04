<?php
session_start();
require_once("utils/connect.php");

if ($_SESSION['role'] != 'Training Staff') {
    header("location: ./index.php");
}

$queryForAllClasses =
    "SELECT class.id, course.id, course.name, trainer.id, trainer.name
    FROM class
    INNER JOIN course ON course.id = class.course_id
    INNER JOIN trainer ON trainer.id = class.trainer_id
    ORDER BY class.id";
$result = $conn->query($queryForAllClasses);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="shortcut icon" href="assets/img/fav.ico"/>
    <meta name="author" content="Hoang Minh Tu"/>

    <title>Manage Classes</title>

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
                    Class Management
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
                    <div class="table-responsive card-body" id="all-courses">
                        <div class="col-md-3 mb-3">
                            <a class="btn btn-primary btn-block" role="button" href="new_class.php">
                                <i class="fa fa-plus-square"></i>
                                Organise New Class
                            </a>
                        </div>

                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Class ID</th>
                                <th>Course (ID & Name)</th>
                                <th>Trainer (ID & Name)</th>
                                <th>Students (Trainee ID & Name)</th>
                                <th><em>Operational Tasks</em></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($row = $result->fetch_array(MYSQL_NUM)) {
                                ?>
                                <tr>
                                    <td><?php $thisClassId = $row[0]; echo $thisClassId; ?></td>
                                    <td><?php echo "($row[1]) $row[2]"; ?></td>
                                    <td><?php echo "($row[3]) $row[4]"; ?></td>
                                    <td><span id="student-info"></span></td>
                                    <td>
                                        <div class="utilities-wrapper pb-1">
                                            <a class="btn btn-outline-info btn-sm" href="class_details.php?id=<?php echo $row[0]; ?>">
                                                See Details
                                            </a>
                                        </div>
                                        <div class="utilities-wrapper pb-1">
                                            <a class="btn btn-outline-danger btn-sm" href="controllers/delete_class.php?id=<?php echo $row[0]; ?>">
                                                Delete
                                            </a>
                                        </div>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        </button>
                    </div>
                </div>
            </div>
</section>
<!-- ================ End Feature Area ================= -->

<!-- ================ Start Footer Area ================= -->
<?php include "components/footer.php"; ?>
<!-- ================ End Footer Area ================= -->

<script>
    // Stringify student <span> tag
    let listOfStudents = [];
    let studentString = "";

    <?php
        $queryStudents =
            "SELECT class_placement.student_id, trainee.name, d.name, d.location 
             FROM class_placement 
             INNER JOIN trainee ON trainee.id = class_placement.student_id
             INNER JOIN department d ON trainee.department_id = d.id
             WHERE class_id='$thisClassId'";
        $resultStudents = $conn->query($queryStudents);

        while ($rowStd = $resultStudents->fetch_array(MYSQL_NUM)) { ?>
    studentString = `(<?php echo $rowStd[0]; ?>) <?php echo $rowStd[1]; ?> <em><?php echo "[$rowStd[2] - $rowStd[3]]"; ?></em>`;
    listOfStudents.push(studentString);
            <?php
        };
    ?>

    if (listOfStudents.length == 0) {
        document.querySelector("#student-info").innerHTML = "No one yet";
    } else if ((listOfStudents.length > 0) && (listOfStudents.length <= 3)) {
        document.querySelector("#student-info").innerHTML = listOfStudents.join("; ");
    } else {
        let stdsToString = listOfStudents.slice(0,3).join("; ");
        stdsToString += ` and ${listOfStudents.length - 3} more`;
        document.querySelector("#student-info").innerHTML = stdsToString;
    }
</script>

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