<?php

require_once("utils/connect.php");
$TopicID = $_GET['GetID'];
$query = " SELECT * FROM topic WHERE Topic_ID='" . $TopicID . "'";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $TopicID = $row['Topic_ID'];
    $TopicName = $row['Topic_Name'];
    $TopicExplain = $row['Topic_Explain'];
    $TopicDate = $row['Topic_Datecreate'];
    $TopicExpired = $row['Topic_Expired'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
    <title>Document</title>
</head>
<body class="bg-dark">

<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card mt-5">
                <div class="card-title">
                    <h3 class="bg-success text-white text-center py-3"> Update Form in PHP</h3>
                </div>
                <div class="card-body">

                    <form action="controllers/update_topic.php?ID=<?php echo $TopicID ?>" method="post">
                        <input type="text" class="form-control mb-2" placeholder=" Topic Name " name="topicname"
                               value="<?php echo $TopicName ?>" required>
                        <textarea type="text" class="form-control mb-2" placeholder=" Topic Explain "
                                  name="topicexplain" value="<?php echo $TopicExplain ?>"></textarea>
                        <input type="date" class="form-control mb-2" placeholder=" Topic Date " name="topicdate"
                               value="<?php echo $TopicDate ?>">
                        <input type="date" class="form-control mb-2" placeholder=" Topic Expired " name="topicexpired"
                               value="<?php echo $TopicExpired ?>">
                        <button class="btn btn-primary" name="update">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>