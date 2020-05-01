<?php
require ("multirole.php");

?>

<!DOCTYPE html>
<html>
<head>
<title>login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<body>
    <div class="loginbox">
	<img src="anh/anh2.jpg" class="avatar"> 
	<h1> Login Here</h1>
<a align="center">
	<form action="" method="Post"> 
	<div class="form-group"> 
		<input type="text-center" name="user" class="
			form-control form-control-lg" placeholder="username" required>
	</div>
	<div class="form-group">
		<input type="text-center" name="pass" class="
			form-control form-control-lg" placeholder="password" required>
	</div>
	<input type="submit" name="btnLogin" value="Login">
    </form>
</a>
</body>
</head>
</html>