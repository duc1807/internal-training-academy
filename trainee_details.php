<?php
session_start();
require_once("utils/connect.php");

if ($_SESSION['user_role'] != 'Trainee') {
    header("location: ./index.php");
}

$thisId = $_GET['id'];

$query =
    "SELECT trainee.name, su.username, trainee.email, trainee.phone_number,
        trainee.ielts_score, d.name, d.location, trainee.self_description
     FROM trainee
     INNER JOIN system_user su ON trainee.user_id = su.id
     INNER JOIN department d ON trainee.department_id = d.id
     WHERE trainee.id = '$thisId'";

$resThis = $conn->query($query);
$row = $resThis->fetch_array(MYSQL_NUM);

$thisName = $row[0];
$thisUsername = $row[1];
$thisEmail = $row[2];
$thisPhoneNum = $row[3];
$thisIelts = $row[4];
$thisDepart = (empty($row[5])) ? "N/A" : "$row[5] - $row[6]";
$thisDesc = $row[7];
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="shortcut icon" href="assets/img/fav.ico"/>
    <meta name="author" content="Hoang Minh Tu"/>

    <title>Details of Trainee ID <?php echo $thisId; ?></title>

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
                    Trainee Details
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
                                <td><h5 class=" font-weight-bold text-dark">Trainee ID</h5></td>
                                <td>
                                    <?php echo $thisId; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><h5 class=" font-weight-bold text-dark">Trainee Name</h5></td>
                                <td>
                                    <?php echo $thisName; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><h5 class=" font-weight-bold text-dark">Account Username</h5></td>
                                <td>
                                    <?php echo $thisUsername; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><h5 class=" font-weight-bold text-dark">Email Address</h5></td>
                                <td>
                                    <?php echo $thisEmail; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><h5 class=" font-weight-bold text-dark">Phone Number</h5></td>
                                <td>
                                    <?php echo $thisPhoneNum; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><h5 class=" font-weight-bold text-dark">IELTS Score</h5></td>
                                <td>
                                    <?php echo $thisIelts; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><h5 class=" font-weight-bold text-dark">Department</h5></td>
                                <td>
                                    <?php echo $thisDepart; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><h5 class=" font-weight-bold text-dark">Self-description</h5></td>
                                <td>
                                    <?php echo $thisDesc; ?>
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