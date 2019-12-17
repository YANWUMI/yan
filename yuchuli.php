<?php
header("Content-Type: text/html;charset=utf-8");
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myDBPDO";
 
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
 
// 预处理及绑定
$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);
 
// 设置参数并执行

$firstname = $_POST["fname"];
$lastname = $_POST["age"];
$email = $_POST["ema"];
$stmt->execute();
  
echo "新记录插入成功";

$stmt->close();
$conn->close();
?>