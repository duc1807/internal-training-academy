<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
    <title>Registration Form</title>
</head>
<body class="bg-dark">

<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card mt-5">
                <div class="card-title">
                    <h3 class="bg-success text-white text-center py-3"> Registration Form in PHP</h3>
                </div>
                <div class="card-body">

                    <form action="insert_trainer.php" method="post">
                        <div class="form-group">
                            <input type="text-center" name="name" class="
                                 form-control form-control-lg" placeholder="User Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="
                                 form-control form-control-lg" placeholder="User Email" required>
                        </div>
                        <button class="btn btn-primary" name="submit">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>