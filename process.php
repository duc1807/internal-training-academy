
<!DOCTYPE html>
<html>
<head>
<title>Admin page</title>

</head>
<body>
<?php
require_once './db.php';

 // Lấy dự liệu gửi lên từ client dùng biến toàn cục $_GET hoặc $_POST
 // Isset: kiểm tra xem tài khoản có tồn tại không 
        if(isset($_POST['user']) && isset($_POST['pass']))
{
	    $user = $_POST['user'];
	    $pass = $_POST['pass'];
	// tạo kết nối tới cơ sở dữ liệu bằng mysql
	    $conn = new mysqli($hostname, $username, $password, $dbname, $port);
	    if($conn-> connect_error)
   {
	// nếu như kết nối không thành công thì dừng chương trình 
	    echo "Failed connection";
	//dừng chương trình
	   die($conn-> connect_error);
}
// tạo câu truy vấn 
$sql = "SELECT * FROM account where username ='" .$user 
. "' and password='" . $pass . "'";

$rows = query($sql);

if(count($rows)>0)
include("index.php");
else
	echo "<h1>Username or Password incorrect</h1>";
}
else
	echo "<h1>Your account has no system</h1>";

?>
<!-- liệt kê các tài khoản ra 1 bảng -->
<!-- <table border="1">
	<tr>
		<th>ID</th>
		<th>User name</th>
		<th>Password</th>
	</tr>
<?php
	$sql =" SELECT * FROM account ";
	$rows = query($sql);
	for ($i=0; $i<count($rows); $i++)
{
?>
	<tr>
		<td><?=$rows[$i][0]?></td>
		<td><?=$rows[$i][1]?></td>
		<td><?=$rows[$i][2]?></td>
	</tr>
<?php
}
?> -->
</table>
</body>
</html>