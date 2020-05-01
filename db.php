<?php 
$hostname= 'localhost';
// username and password is the account of phpmyadmin
$username= 'root';
$password= '';
$dbname= 'asm';
$port=3306;
function query($sql)
{
    global $hostname; // hàm truyền vào câu truy vấn mình muốn chạy 
    global $username;
    global $password;
    global $dbname;
    global $port;
$conn = new mysqli($hostname, $username, $password, $dbname, $port);
	if($conn-> connect_error)
   {
	// nếu như kết nối không thành công thì dừng chương trình 
	echo "Connection fail";
	//dừng chương trình
	die($conn-> connect_error);
   }
// chạy câu truy vấn lấy kết quả 
$result = $conn -> query($sql);
if(!$result)
   {
  //nếu không có kết quả ( $result = null ) thì dừng chương trình 
  echo "SQL excution fail";
  die ($conn -> error);
   }
// lấy tất cả các bản ghi từ kết quả 
$rows = mysqli_fetch_all($result);
return $rows;
}
?>