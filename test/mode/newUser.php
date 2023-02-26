<?php
require_once '../DB/conn.php';

// $id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$number = $_POST['number'];
$birthday = $_POST['birthday'];

$pass = md5($password);

$sql = "insert into user(name, email, password, number, birthday) 
values ('$name', '$email', '$pass', '$number', '$birthday')";

if(mysqli_query($conn,$sql)){

    session_start();
    $_SESSION['name']= $name;

    $_SESSION['loginTime']= date("Y/m/d H:i:s");

    header('location:../list.php');
}


