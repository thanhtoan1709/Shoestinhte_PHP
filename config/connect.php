<?php 
// Kết nối cơ sở dữ liệu
$connect = new mysqli('localhost','root','','learn_course');


// Kiểm tra kết nối
if ($connect->connect_error) {
    die('Kết nối cơ sở dữ liệu không thành công: ' . $connect->connect_error);
}
?>