<?php
require_once '../DB/conn.php';

$email = $_POST['email'];
$password = $_POST['password'];

$pass = md5($password);

$sql = "select * from user where email='$email' and password='$pass'";

session_start();

if($result = mysqli_query($conn,$sql)){

    // $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){

        $_SESSION['name']= $row['name'];

        $_SESSION['loginTime']= date("Y/m/d H:i:s");

        header('location:../list.php');
        exit;
    }
}

    $_SESSION['loginErro'] = 'メールアドレスまたはパスワードが間違う';
    header('location:../login.php');




