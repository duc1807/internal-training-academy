<?php
$trainee_user_id = $_GET['id'];
$queryThisTrainee =
    "SELECT trainee.name, system_user.username, system_user.password, trainee.email, 
       trainee.phone_number, department.id, trainee.ielts_score, trainee.self_description
    FROM system_user
    INNER JOIN trainee ON trainee.user_id = system_user.id
    INNER JOIN department ON trainee.department_id = department.id
    WHERE system_user.id = '$trainee_user_id'";
$resultThisTrainee = $conn->query($queryThisTrainee);
while ($rowTrainee = $resultThisTrainee->fetch_array(MYSQL_NUM)) {
    $traineeName = $rowTrainee[0];
    $username = $rowTrainee[1];
    $password = $rowTrainee[2];
    $email = $rowTrainee[3];
    $phoneNum = $rowTrainee[4];
    $selectedDepartmentId = $rowTrainee[5];
    $ielts = $rowTrainee[6];
    $desc = $rowTrainee[7];
}
?>
<form action="controllers/update_trainee.php?user_id=<?php echo $trainee_user_id; ?>" method="POST" id="edit_trainee">
    <div class="row">
        <label for="fullname">Full Name (*)</label>
        <input type="text" class="form-control mb-2 mr-2" id="fullname"
               name="name" value="<?php echo $traineeName; ?>">
        <label for="username">Account Username (*)</label>
        <input type="text" class="form-control mb-2 mr-2" id="username"
               name="username" value="<?php echo $username; ?>">
        <label for="password">Account Password (*)</label>
        <input type="password" class="form-control mb-2" id="password"
               name="password" value="<?php echo $password; ?>">
    </div>
    <div class="row">
        <label for="email">Email (*)</label>
        <input type="text" class="form-control mb-2 mr-2" id="email"
                name="email" value="<?php echo $email; ?>">
        <label for="phone">Phone Number (*)</label>
        <input type="text" class="form-control mb-2 mr-2" id="phone"
               name="phone_number" value="<?php echo $phoneNum; ?>">
    </div>
    <div class="row selector-wrapper">
        <label for="depart">Department (*)</label>
        <select class="custom-select" id="depart" name="department" form="edit_trainee">
            <option selected> Department </option>
            <?php while ($row = $resultDepartments->fetch_array(MYSQL_NUM)) { ?>
                <option value="<?php echo $row[0]; ?>"
                    <?php if ($row[0] == $selectedDepartmentId) { ?> selected <?php }; ?>
                >
                    <?php echo $row[1] . " [" . $row[2] . ']'; ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <div class="row">
        <label for="ielts">IELTS Score (optional)</label>
        <input type="text" class="form-control mb-2 mr-2" id="ielts"
               name="ielts" value="<?php echo $ielts; ?>">
        <label for="desc">Self Description (optional)</label>
        <input type="text" class="form-control mb-2 mr-2" id="desc"
               name="desc" value="<?php echo $desc; ?>">
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

<script>
    document.title = "Edit User Information::<?php echo $traineeName; ?>";
    document.querySelector("#banner-header").innerHTML = "Edit User Information for <em><?php echo $traineeName; ?></em>"
</script>