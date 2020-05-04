<?php
session_start();

if ($_SESSION['role'] != 'Training Staff') {
    header("location: ./index.php");
}

require_once("utils/connect.php");
$catId = $_GET['id'];
$queryForThisCat = " SELECT * FROM course_category WHERE id ='$catId'";
$result = $conn->query($queryForThisCat);

while ($row = $result->fetch_array(MYSQL_ASSOC)) {
    $catName = $row['name'];
    $catDesc = $row['description'];
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
    <title>Edit Category <?php echo $catId; ?>::<?php echo $catName; ?></title>
</head>
<body class="bg-dark">

<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card mt-5">
                <div class="card-title">
                    <h3 class="bg-success text-white text-center py-3">Edit Category</h3>
                </div>
                <div class="card-body">
                    <form action="controllers/update_category.php?id=<?php echo $catId; ?>" method="POST"
                          id="edit-topic">
                        <label for="cat-id">Category ID (integer)</label>
                        <input type="text" class="form-control mb-2" id="cat-id" name="id"
                               value="<?php echo $catId; ?>">
                        <label for="cat-name">Topic Name</label>
                        <input type="text" class="form-control mb-2" id="cat-name" name="name"
                               value="<?php echo $catName; ?>">
                        <label for="cat-desc">Description (optional)</label>
                        <input type="text" class="form-control mb-2" id="cat-desc"
                               placeholder="Description (optional)"
                               name="desc" value="<?php echo $catDesc; ?>">
                        <div class="pb-2">
                            <em>Please note that you can't proceed if all information required hasn't been
                                inputted!</em>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <a href="categories.php" class="btn btn-dark text-white float-left" name="btnBack">
                                    ⮨ Back
                                </a>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary float-right" name="submit">
                                    <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                    Submit ➦
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>