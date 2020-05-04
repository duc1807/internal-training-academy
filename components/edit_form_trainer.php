<?php
$trainerUserId = $_GET['id'];
$queryThisTrainer =
    "SELECT trainer.name, system_user.username, system_user.password, trainer.email, 
       trainer.phone_number, department.id, trainer.is_contractor, trainer.self_description
    FROM system_user
    INNER JOIN trainer ON trainer.user_id = system_user.id
    LEFT JOIN department ON trainer.department_id = department.id
    WHERE system_user.id = '$trainerUserId'";
$resultThisTrainer = $conn->query($queryThisTrainer);
while ($rowTrainer = $resultThisTrainer->fetch_array(MYSQL_NUM)) {
    $trainerName = $rowTrainer[0];
    $username = $rowTrainer[1];
    $password = $rowTrainer[2];
    $email = $rowTrainer[3];
    $phoneNum = $rowTrainer[4];
    $selectedDepartmentId = $rowTrainer[5];
    $isContractor = $rowTrainer[6];
    $desc = $rowTrainer[7];
}
?>
<form action="controllers/update_trainer.php?user_id=<?php echo $trainerUserId; ?>" method="POST" id="edit_trainer">
    <div class="row">
        <label for="fullname">Full Name (*)</label>
        <input type="text" class="form-control mb-2 mr-2" id="fullname"
               name="name" value="<?php echo $trainerName; ?>">
        <label for="username">Account Username (*)</label>
        <input type="text" class="form-control mb-2 mr-2" id="username"
               name="username" value="<?php echo $username; ?>">
        <div class="form-group">
            <label for="password">Account Password (*)</label>
            <input type="password" class="form-control mb-2" id="password"
                   name="password" value="<?php echo $password; ?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="email">Email (*)</label>
            <input type="text" class="form-control mb-2 mr-2" id="email"
                   name="email" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
            <label for="phone">Phone Number (*)</label>
            <input type="text" class="form-control mb-2 mr-2" id="phone"
                   name="phone_number" value="<?php echo $phoneNum; ?>">
        </div>
    </div>
    <div class="row">
        <div class="row selector-wrapper pt-2 ml-2">
            <div class="form-group">
                <label class="col-form-label mr-3" for="depart">Department (*)</label>
                <select class="select form-control" id="depart" name="department" form="edit_trainer">
                    <option selected> Department</option>
                    <?php while ($row = $resultDepartments->fetch_array(MYSQL_NUM)) { ?>
                        <option value="<?php echo $row[0]; ?>"
                            <?php if ($row[0] == $selectedDepartmentId) { ?> selected <?php }; ?>
                        >
                            <?php echo $row[1] . " [" . $row[2] . ']'; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="row selector-wrapper pt-2 ml-2 pb-2">
                <label class="col-form-label mr-3" for="is-contractor">Full-time/Contractor? (*)</label>
                <select class="select form-control" name="is_contractor" id="is-contractor" form="edit_trainer">
                    <option value="0" <?php if ($isContractor == 0) { ?> selected <?php }; ?>>Full-time</option>
                    <option value="1" <?php if ($isContractor == 1) { ?> selected <?php }; ?>>Contractor</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row selector-wrapper">
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
               href="trainer_accounts.php">
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
    document.title = "Edit User Information::<?php echo $trainerName; ?>";
    document.querySelector("#banner-header").innerHTML = "Edit User Information for <em><?php echo $trainerName; ?></em>"
</script>