<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
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

$email2=$_COOKIE['email'];
$height = $_POST["height"];
$waist = $_POST["waist"];
$weight = $_POST["weight"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$bmi = $_POST["bmi"];
$plan = $_POST["plan"];
$sql="SELECT*FROM information WHERE email='$email2' ";
$query=mysqli_query($conn,$sql);
$result=mysqli_num_rows($query);
if($result==0){ 
    $sql="INSERT INTO information (email,height,waist,weight,age,gender,bmi,plan)
                 VALUES ('$email2','$height','$waist','$weight','$age','$gender','$bmi','$plan')";
                mysqli_query($conn,$sql);
                echo"1";
}
else{  
 $sql = "UPDATE information
          SET height='$height', waist='$waist',weight='$weight', age='$age', gender='$gender',bmi='$bmi',plan='$plan'
          WHERE email ='$email2' ";
          mysqli_query($conn,$sql);
          echo"1";
}
$conn->close();
}
?>