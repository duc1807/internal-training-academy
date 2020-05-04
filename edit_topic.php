<?php
session_start();

if ($_SESSION['role'] != 'Training Staff') {
    header("location: ./index.php");
}

require_once("utils/connect.php");
$topicId = $_GET['id'];
$queryForThisTopic = " SELECT * FROM course_topic WHERE id ='" . $topicId . "'";
$result = $conn->query($queryForThisTopic);

$queryForCats = "SELECT id, name FROM course_category";
$result2 = $conn->query($queryForCats);

while ($row = $result->fetch_array(MYSQL_ASSOC)) {
    $topicName = $row['name'];
    $topicDesc = $row['description'];
    $topicCatId = $row['category_id'];
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
    <title>Edit Topic <?php echo $topicId; ?>::<?php echo $topicName; ?></title>
</head>
<body class="bg-dark">

<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card mt-5">
                <div class="card-title">
                    <h3 class="bg-success text-white text-center py-3">Edit Topic</h3>
                </div>
                <div class="card-body">
                    <form action="controllers/update_course.php?id=<?php echo $topicId; ?>" method="POST"
                          id="edit-topic">
                        <label for="topic-id">Topic ID (integer)</label>
                        <input type="text" class="form-control mb-2" id="topic-id" name="id"
                               value="<?php echo $topicId; ?>">
                        <label for="topic-name">Topic Name</label>
                        <input type="text" class="form-control mb-2" id="topic-name" name="name"
                               value="<?php echo $topicName; ?>">
                        <label for="topic-cat">Category</label>
                        <select class="custom-select mb-2" id="topic-cat" name="category" form="edit-topic">
                            <?php while ($row = $result2->fetch_array(MYSQL_NUM)) { ?>
                                <option
                                        value="<?php echo $row[0]; ?>"
                                    <?php if ($row[0] == $topicCatId) { ?> selected <?php }; ?>
                                >
                                    <?php echo $row[1]; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <label for="topic-desc">Description (optional)</label>
                        <input type="text" class="form-control mb-2" id="topic-desc"
                               placeholder="Description (optional)"
                               name="desc" value="<?php echo $topicDesc; ?>">
                        <div class="pb-2">
                            <em>Please note that you can't proceed if all information required hasn't been
                                inputted!</em>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <a href="topics.php" class="btn btn-dark text-white float-left" name="btnBack">
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