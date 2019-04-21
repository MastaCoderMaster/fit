<?php
if($_SERVER["REQUEST_METHOD"]=="GET"){
    $servername = "victorybringer.xyz";
    $username = "root";
    $password = "123456";
    $dbname = "mydb";
    // 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname);
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 

$email=$_COOKIE["email"];
$sql="SELECT * FROM information WHERE email='$email'";
$query1=mysqli_query($conn,$sql);
$result1=mysqli_fetch_assoc($query1);
$height=$result1["height"];
$weight=$result1['weight'];
$waist=$result1['waist'];
$age=$result1['age'];
$gender=$result1['gender'];
echo json_encode($result1);
}
?>