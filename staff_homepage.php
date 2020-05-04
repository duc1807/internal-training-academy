<?php
session_start();
require_once("utils/connect.php");

$queryForAllAccounts =
    "SELECT system_user.id, system_user.username, user_role.name 
    FROM system_user
    INNER JOIN user_role ON system_user.user_role_id = user_role.id";
$result = $conn->query($queryForAllAccounts);
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
                    Welcome back, <?php echo $_SESSION['username']; ?>!
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
                        All System Accounts
                    </h2>
                    <div class="table-responsive card-body" id="all-user-accounts">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Account ID</th>
                                <th>Username</th>
                                <th>Role</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($row = $result->fetch_array(MYSQL_NUM)) {
                                ?>
                                <tr>
                                    <td><?php echo $row[0]; ?></td>
                                    <td><?php echo $row[1]; ?></td>
                                    <td><?php echo $row[2]; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
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