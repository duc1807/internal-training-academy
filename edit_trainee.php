<?php

require_once("utils/connect.php");
$UserID = $_GET['GetID'];
$query = " SELECT * FROM trainee WHERE User_ID='" . $UserID . "'";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $UserID = $row['User_ID'];
    $UserName = $row['User_Name'];
    $UserEmail = $row['User_Email'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/fav.ico"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="assets/css/bootstrap.css"/>
    <style>
        body {
            background-image: url("https://cdn.suwalls.com/wallpapers/minimalistic/blurry-far-away-lights-51461-2880x1800.jpg");
            background-color: #cccccc;
        }
    </style>
    <title>Edit Trainee <?php echo courseId; ?></title>
</head>
<body class="bg-dark">

<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card mt-5">
                <div class="card-title">
                    <h2 class="bg-primary text-white text-center py-3">
                        ⊕ Create New Course ⊕
                    </h2>
                </div>
                <div class="card-body">

                    <form action="controllers/update_trainee.php?ID=<?php echo $UserID ?>" method="post">
                        <input type="text" class="form-control mb-2" placeholder=" User Name " name="name"
                               value="<?php echo $UserName ?>">
                        <input type="email" class="form-control mb-2" placeholder=" User Email " name="email"
                               value="<?php echo $UserEmail ?>">
                        <button class="btn btn-primary" name="update">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>