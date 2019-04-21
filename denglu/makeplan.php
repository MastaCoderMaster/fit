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
    $query=mysqli_query($conn,$sql);
    $result1=mysqli_fetch_assoc($query);
    $gender=$result1['gender'];
    $plan=$result1['plan'];
    $sql1="SELECT * FROM plan WHERE kind='$plan' AND gender='$gender' ";
    $query1=mysqli_query($conn,$sql1);
    $result2=mysqli_fetch_assoc($query1);
    echo json_encode($result2);
}
?>