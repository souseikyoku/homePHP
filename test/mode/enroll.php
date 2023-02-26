<?php
require_once '../DB/conn.php';

$name = $_POST['name'];
$kana = $_POST['kana'];
$email = $_POST['email'];
$number = $_POST['number'];
$sex = $_POST['sex'];
$birthday = $_POST['birthday'];
$address = $_POST['address'];
$company = $_POST['company'];

$sql = "insert into list (uid, name, kana, email, number, sex, birthday, address, company) 
values ('1', '$name', '$kana', '$email', '$number', '$sex', '$birthday', '$address', '$company')";

if(mysqli_query($conn,$sql)){
    header('location:../list.php');
}


