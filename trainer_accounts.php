<?php
require_once("utils/connect.php");

$query =
    "SELECT trainer.id, trainer.name, system_user.username, trainer.email, trainer.phone_number, 
       department.name, department.location, system_user.id, trainer.is_contractor
    FROM trainer
    INNER JOIN system_user ON trainer.user_id = system_user.id
    LEFT JOIN department ON trainer.department_id = department.id
    ORDER BY trainer.id";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="shortcut icon" href="assets/img/fav.ico"/>
    <meta name="author" content="Hoang Minh Tu"/>

    <title>Manage Trainer Accounts</title>

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
                    Manage Trainer Accounts
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
                            <a class="btn btn-primary btn-block" role="button" href="new_trainer.php">
                                <i class="fa fa-plus-square"></i>
                                Register new Trainer
                            </a>
                        </div>

                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>Trainer ID</th>
                                <th>Full Name</th>
                                <th>Account Username</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Department</th>
                                <th>Contractor/Full-time?</th>
                                <th><em>Operational Tasks</em></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($row = $result->fetch_array(MYSQL_NUM)) {
                                //$row[8] :: tinyint
                                ?>
                                <tr>
                                    <td><?php echo $row[0]; ?></td>
                                    <td><?php echo $row[1]; ?></td>
                                    <td><?php echo $row[2]; ?></td>
                                    <td><?php echo $row[3]; ?></td>
                                    <td><?php echo $row[4]; ?></td>
                                    <td><?php echo $row[5] . " [" . $row[6] . ']'; ?></td>
                                    <td><?php if ($row[8]) { echo "Contractor"; } else {echo "Full-time"; } ?></td>
                                    <td>
                                        <div class="utilities-wrapper pb-1">
                                            <a class="btn btn-outline-info btn-sm" href="trainer_details.php?id=<?php echo $row[0]; ?>">
                                                See Details
                                            </a>
                                        </div>
                                        <div class="utilities-wrapper pb-1">
                                            <a class="btn btn-outline-primary btn-sm" href="edit_user.php?id=<?php echo $row[7]; ?>">
                                                Edit
                                            </a>
                                        </div>
                                        <div class="utilities-wrapper pb-1">
                                            <a class="btn btn-outline-danger btn-sm" href="controllers/delete_trainer.php?id=<?php echo $row[0]; ?>">
                                                Delete
                                            </a>
                                        </div>
                                    </td>
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