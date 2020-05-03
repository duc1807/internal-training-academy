<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<header class="default-header">
    <nav class="navbar navbar-expand-lg navbar-inverse">
        <div class="container">
            <div class="navbar-header navbar-brand"><a class="text-white" href="index.php">Internal Training Academy</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="lnr lnr-menu"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="dropdown" id="dropdown-list-accounts">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            Accounts
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="">Manage Training Staff</a>
                            <a class="dropdown-item" href="">Manage Trainers</a>
                            <a class="dropdown-item" href="">Manage Trainees</a>
                        </div>
                    </li>
                    <li class="dropdown" id="dropdown-list-courses">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            Courses
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="courses.php">Manage Courses</a>
                            <a class="dropdown-item" href="categories.php">Manage Categories</a>
                            <a class="dropdown-item" href="topics.php">Manage Topics</a>
                        </div>
                    </li>
                    <li class="dropdown" id="dropdown-list-classes">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            My Courses
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="">My Classes</a>
                            <a class="dropdown-item" href="#">My Assigned Topics</a>
                        </div>
                    </li>
                    <li class="dropdown" id="dropdown-list-organise">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            Organise
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="">Organise Classes</a>
                            <a class="dropdown-item" href="#">Assign Topic to Trainer</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#">
                            <i class="fa fa-user-circle"></i><?php echo $_SESSION['username']; ?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <a class="dropdown-item" href="controllers/logout_handler.php">Log Out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<script>
    var accountDropdown = document.querySelector('#dropdown-list-accounts');
    var staffLinker = accountDropdown.children[1].children[0];
    var trainerLinker = accountDropdown.children[1].children[1];
    var courseDropdown = document.querySelector('#dropdown-list-courses');
    var myCourseDropdown = document.querySelector('#dropdown-list-classes');
    var assignedTopicsLinker = myCourseDropdown.children[1].children[1];
    var organiseDropdown = document.querySelector('#dropdown-list-organise');

    <?php if ($_SESSION['role'] == "Admin") { ?>
    courseDropdown.parentNode.removeChild(courseDropdown);
    myCourseDropdown.parentNode.removeChild(myCourseDropdown);
    organiseDropdown.parentNode.removeChild(organiseDropdown);
    <?php } ?>

    <?php if ($_SESSION['role'] == "Training Staff") { ?>
    staffLinker.parentNode.removeChild(staffLinker);
    myCourseDropdown.parentNode.removeChild(myCourseDropdown);
    <?php } ?>

    <?php if ($_SESSION['role'] == "Trainee") { ?>
    assignedTopicsLinker.parentNode.removeChild(assignedTopicsLinker);
    <?php } ?>

    <?php if ($_SESSION['role'] == "Trainer" || $_SESSION['role'] == "Trainee") { ?>
    organiseDropdown.parentNode.removeChild(organiseDropdown);
    accountDropdown.parentNode.removeChild(accountDropdown);
    courseDropdown.parentNode.removeChild(courseDropdown);
    <?php } ?>
</script>