<?php
$server_username = "dbmasteruser"; // thông tin đăng nhập host
$server_password = "i1;BF~wH#U(O5_c3HDqk]5}=h*d-B)my"; // mật khẩu, trong trường hợp này là trống
$server_host = "ls-949ad5ea5968f5d8446ca7148dc3f318c89cfdd4.coiqqpvdjaju.ap-south-1.rds.amazonaws.com"; // host là localhost
$database = 'gadatacontrol'; // 

// Tạo kết nối đến database dùng mysqli_connect()
// $conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("can not connect database");
// // Thiết lập kết nối ủa chúng ta khi truy vấn là dạng UTF8 trong trường hợp dữ liệu là tiếng việt có dâu
// mysqli_query($conn,"SET NAMES 'UTF8'");

$conn = new mysqli($server_host,$server_username,$server_password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

?>