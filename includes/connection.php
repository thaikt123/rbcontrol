<?php
$server_username = "root"; // thông tin đăng nhập host
$server_password = ""; // mật khẩu, trong trường hợp này là trống
$server_host = "localhost"; // host là localhost
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