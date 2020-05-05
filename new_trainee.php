<?php
session_start();
require_once("utils/connect.php");

if ($_SESSION['role'] != 'Training Staff' && $_SESSION['role'] != 'Admin') {
    header("location: ./index.php");
}

$queryForDepartments = "SELECT * FROM department";
$result = $conn->query($queryForDepartments);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="shortcut icon" href="assets/img/fav.ico"/>
    <meta name="author" content="Hoang Minh Tu"/>

    <title>Register new Trainee</title>

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
                    Register new Trainee
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
                <div class="card mt-5 ml-5 pt-3 pl-3">
                    <div class="card-body">
                        <form action="controllers/create_trainee.php" method="POST" id="new_trainee">
                            <div class="row">
                                <input type="text" class="form-control mb-2 mr-2" placeholder="Full Name (*)" name="name">
                                <input type="text" class="form-control mb-2 mr-2" placeholder="Account Username (*)" name="username">
                                <input type="password" class="form-control mb-2" placeholder="Account Password (*)" name="password">
                            </div>
                            <div class="row">
                                <input type="text" class="form-control mb-2 mr-2" placeholder="Email (*)" name="email">
                                <input type="text" class="form-control mb-2 mr-2" placeholder="Phone Number (*)" name="phone_number">
                            </div>
                            <div class="row selector-wrapper">
                                <select class="select form-control" name="department" form="new_trainee">
                                    <option selected> Department (*) </option>
                                    <?php while ($row = $result->fetch_array(MYSQL_NUM)) { ?>
                                        <option value="<?php echo $row[0]; ?>">
                                            <?php echo $row[1] . " [" . $row[2] . ']'; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="row mt-3">
                                <em>Please note that you can't proceed if all information required hasn't been inputted!</em>
                            </div>
                            <div class="row pt-3">
                                <div class="col-md-6">
                                    <a class="btn btn-dark text-white float-left" name="backBtn"
                                       href="trainee_accounts.php">
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

<script src="assets/js/jquery.ajaxchimp.min.js"></script>

<script src="assets/js/parallax.min.js"></script>

<script src="assets/js/jquery.sticky.js"></script>
<script src="assets/js/hexagons.min.js"></script>

<script src="assets/js/waypoints.min.js"></script>

<script src="assets/js/main.js"></script>
</body>

</html>