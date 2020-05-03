<form action="controllers/update_trainer.php" method="POST" id="new_trainee">
    <div class="row">
        <input type="text" class="form-control mb-2 mr-2" placeholder="Full Name" name="name">
        <input type="text" class="form-control mb-2 mr-2" placeholder="Account Username" name="username">
        <input type="password" class="form-control mb-2" placeholder="Account Password" name="password">
    </div>
    <div class="row">
        <input type="text" class="form-control mb-2 mr-2" placeholder="Email" name="email">
        <input type="text" class="form-control mb-2 mr-2" placeholder="Phone Number" name="phone_number">
    </div>
    <div class="row selector-wrapper">
        <select class="custom-select" name="department" form="new_trainee">
            <option selected> Department </option>
            <?php while ($row = $result->fetch_array(MYSQL_NUM)) { ?>
                <option value="<?php echo $row[0]; ?>">
                    <?php echo $row[1] . " [" . $row[2] . ']'; ?>
                </option>
            <?php } ?>
        </select>
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