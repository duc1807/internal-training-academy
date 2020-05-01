<?php

    $conn=mysqli_connect("localhost","root","","asm");
    if(!$conn)
    {
        die(" Connection Error ");
    }
// or die là phương thức để kiểm tra kết nối 
//mysqli_query($conn); "SET NAMES 'UTF8'" // có thể thêm hoặc k dùng tr trường hợp cơ sở dữ liệu có kí tự đặc biệt dạng uft-8 thì truy vấn hoặc cập nhật k bị lỗi font.
?> 
