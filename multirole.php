<?php 
session_start();
require_once"connect.php";

$message ="Please re-check your login credentials!";
$role = "" ;

if(isset($_POST["btnLogin"]))
{
	$username = $_POST["user"];
	$password = $_POST["pass"];

	$query = 
	"SELECT * FROM account WHERE Username = '$username' 
		AND Password = '$password'";

	$result = mysqli_query($conn,$query);

	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			if($row["Role"]== "Admin")
			{
				$_SESSION['LoginUser'] = $row["Username"];
				$_SESSION['role'] = $row["Role"];
				header('location: admin.php');

			}
			if($row["Role"]== "User")
			{
				$_SESSION['LoginUser'] = $row["Username"];
				$_SESSION['role'] = $row["Role"];
				header('location: user.php');
			}
			if($row["Role"]== "Trainer")
			{
				$_SESSION['LoginUser'] = $row["Username"];
				$_SESSION['role'] = $row["Role"];
				header('location: trainer.php');
			}
		}
	}
				else
			{

		echo "<script> alert('$message')</script>";


}
}

?>