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

$emailErr = "";
$email=$password="";
$email = $_POST["email"];
$password = $_POST["password"];

if (empty($_POST["email"])){
    echo "输入邮箱不能为空";   
}
else {
    $sql="SELECT*FROM myde WHERE email='$email'";
    $query=mysqli_query($conn,$sql);
    $result=mysqli_num_rows($query);
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
    {
        echo "邮箱格式不合法";  
    }
    else if(empty($_POST["password"])){ 
        echo "密码输入不能为空";
    }
        else if($result==0){
        echo "该邮箱未注册"; 
    }
    else{
        setcookie("email",$email,time()+3600);
         $sql1="SELECT * FROM myde WHERE email='$email'";
         $query1=mysqli_query($conn,$sql1);
         $result1=mysqli_fetch_assoc($query1);
         $sql2="SELECT * FROM information WHERE email='$email'";
         $query2=mysqli_query($conn,$sql2);
         $result2=mysqli_num_rows($query2);
         if($result1['code']==$password){
            if($result2==1){
                echo'1';
            }
            else{
                echo'2';
            }    
            }
        else{
            echo"密码错误";
        }
        }

}
$conn->close();

}
?>