<?php
require_once("connect.php");

if (isset($_POST['submit'])) {
    foreach ($_POST['attendance_status'] as $id => $attendance_status) {
        $roll_no = $_POST['roll_no'][$id];
        $student_name = $_POST['student_name'][$id];
        $date_created = date('Y-m-d H:i:s');
        $date_modified = date('Y-m-d H:i:s');

        $attendance = $conn->prepare("INSERT INTO attendance (roll_no, student_name, date_created, date_modified, attendance_status) VALUES (?, ?, ?, ?, ?)");
        $attendance->bind_param("issss", $roll_no, $student_name, $date_created, $date_modified, $attendance_status);
        $attendance->execute();
    }

    if ($conn->affected_rows == 1) {
        $message = "Attendance has been added successfully";
        echo "<script> alert('$message')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/fav.png"/>
    <!-- Author Meta -->
    <meta name="author" content="colorlib"/>
    <!-- Meta Description -->
    <meta name="description" content=""/>
    <!-- Meta Keyword -->
    <meta name="keywords" content=""/>
    <!-- meta character set -->
    <meta charset="UTF-8"/>
    <!-- Site Title -->
    <title>FPT Education</title>

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:900|Roboto:400,400i,500,700" rel="stylesheet"/>
    <!--
        CSS
        =============================================
      -->
    <link rel="stylesheet" href="css/linearicons.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="css/magnific-popup.css"/>
    <link rel="stylesheet" href="css/owl.carousel.css"/>
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/hexagons.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css"/>
    <link rel="stylesheet" href="css/main.css"/>
</head>

<body>
<!-- ================ Start Header Area ================= -->
<header class="default-header">
    <nav class="navbar navbar-expand-lg  navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="img/gr.png" alt=""/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="lnr lnr-menu"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li><a href="trainer.php">Home</a></li>
                    <!-- Dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            attendance
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="attendance.php">GCH0705</a>
                            <a class="dropdown-item" href="">GCH0705</a>
                            <a class="dropdown-item" href="">GCH0705</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            topic
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="view_topic.php">GCH0705</a>
                            <a class="dropdown-item" href="course-details.html">GCH0508</a>
                            <a class="dropdown-item" href="elements.html">GCH0809</a>
                        </div>

                    </li>
                    <li><a href="logout.php">logout</a></li>

                    <li>
                        <button class="search">
                            <span class="lnr lnr-magnifier" id="search"></span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="search-input" id="search-input-box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search-input" placeholder="Search Here"/>
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close-search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- ================ End Header Area ================= -->

<!-- ================ start banner Area ================= -->
<section class="home-banner-area">
    <div class="container">
        <div class="row justify-content-center fullscreen align-items-center">
            <div class="col-lg-5 col-md-8 home-banner-left">
                <h1 class="text-white">
                </h1>
                <p class="mx-auto text-white  mt-20 mb-40"></p>
            </div>
            <div class="offset-lg-2 col-lg-5 col-md-12 home-banner-right">
                <img class="img-fluid" src="img/header-img.png" alt=""/>
            </div>
        </div>
    </div>
</section>
<!-- ================ End banner Area ================= -->
<body class="records">
<form action="" method="post">
    <div class="container">
        <div class="row">
            <div class="col m-auto">
                <div class="card mt-5">
                    <table class="table table-bordered">
                        <tr>
                            <td>S.I</td>
                            <td>Student ID</td>
                            <td>Student Name</td>
                            <td>Attendance</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>
                                GCH17522
                                <input type="hidden" name="roll_no[]" value="GCH17522"/>
                            </td>
                            <td>
                                Truong the Dat
                                <input type="hidden" name="student_name[]" value="Truong the Dat"/>
                            </td>
                            <td>
                                <label for="present0">
                                    <input type="radio" id="present0" name="attendance_status[0]" value="Present">
                                    Present
                                </label>
                                <label for="absent0">
                                    <input type="radio" id="absent0" name="attendance_status[0]" value="Absent"> Absent
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                                GCH17523
                                <input type="hidden" name="roll_no[]" value="GCH0705"/>
                            </td>
                            <td>
                                Doan manh Chinh
                                <input type="hidden" name="student_name[]" value="Doan manh Chinh"/>
                            </td>
                            <td>
                                <label for="present1">
                                    <input type="radio" id="present1" name="attendance_status[1]" value="Present">
                                    Present
                                </label>
                                <label for="absent1">
                                    <input type="radio" id="absent1" name="attendance_status[1]" value="Absent"> Absent
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>
                                GCH17421
                                <input type="hidden" name="roll_no[]" value="GCH17521"/>
                            </td>
                            <td>
                                Nguyen thu Thuy
                                <input type="hidden" name="student_name[]" value="Nguyen thu Thuy"/>
                            </td>
                            <td>
                                <label for="present2">
                                    <input type="radio" id="present2" name="attendance_status[2]" value="Present">
                                    Present
                                </label>
                                <label for="absent2">
                                    <input type="radio" id="absent2" name="attendance_status[2]" value="Absent"> Absent
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>
                                GCH175300
                                <input type="hidden" name="roll_no[]" value="GCH17534"/>
                            </td>
                            <td>
                                invisible man
                                <input type="hidden" name="student_name[]" value="invisible man"/>
                            </td>
                            <td>
                                <label for="present3">
                                    <input type="radio" id="present3" name="attendance_status[3]" value="Present">
                                    Present
                                </label>
                                <label for="absent3">
                                    <input type="radio" id="absent3" name="attendance_status[3]" value="Absent"> Absent
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>
                                GCH142323
                                <input type="hidden" name="roll_no[]" value="GCH142323"/>
                            </td>
                            <td>
                                Arthur morgan
                                <input type="hidden" name="student_name[]" value="Arthur morgan"/>
                            </td>
                            <td>
                                <label for="present4">
                                    <input type="radio" id="present4" name="attendance_status[4]" value="Present">
                                    Present
                                </label>
                                <label for="absent4">
                                    <input type="radio" id="absent4" name="attendance_status[4]" value="Absent"> Absent
                                </label>
                            </td>
                        </tr>
                    </table>

                    <br/>
                    <input type="submit" name="submit" value="Mark Attendance"/>
                    <li><a href="mark_attendance.php">check attendance today</a></li>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- ================ start footer Area ================= -->
<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4>Top Products</h4>
                <ul>
                    <li><a href="#">Managed Website</a></li>
                    <li><a href="#">Manage Reputation</a></li>
                    <li><a href="#">Power Tools</a></li>
                    <li><a href="#">Marketing Service</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#">Brand Assets</a></li>
                    <li><a href="#">Investor Relations</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4>Features</h4>
                <ul>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#">Brand Assets</a></li>
                    <li><a href="#">Investor Relations</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4>Resources</h4>
                <ul>
                    <li><a href="#">Guides</a></li>
                    <li><a href="#">Research</a></li>
                    <li><a href="#">Experts</a></li>
                    <li><a href="#">Agencies</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 single-footer-widget">
                <h4>Newsletter</h4>
                <p>You can trust us. we only send promo offers,</p>
                <div class="form-wrap" id="mc_embed_signup">
                    <form target="_blank"
                          action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                          method="get" class="form-inline">
                        <input class="form-control" name="EMAIL" placeholder="Your Email Address"
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
                               required="" type="email">
                        <button class="click-btn btn btn-default text-uppercase">subscribe</button>
                        <div style="position: absolute; left: -5000px;">
                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                        </div>

                        <div class="info"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-bottom row align-items-center">
            <p class="footer-text m-0 col-lg-8 col-md-12">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a
                        href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            <div class="col-lg-4 col-md-12 footer-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
            </div>
        </div>
    </div>
</footer>
<!-- ================ End footer Area ================= -->

<script src="js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/parallax.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/hexagons.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>