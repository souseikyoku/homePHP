<?php
require_once '../DB/conn.php';
$id = $_POST['id'];
$name = $_POST['name'];
$kana = $_POST['kana'];
$email = $_POST['email'];
$number = $_POST['number'];
$sex = $_POST['sex'];
$birthday = $_POST['birthday'];
$address = $_POST['address'];
$company = $_POST['company'];

// echo $id.$name.$kana.$email.$number.$sex.$birthday.$address.$company;

$sql = "update list set name='$name',kana='$kana',email='$email',
        number='$number',sex='$sex',birthday='$birthday',
        address='$address',company='$company' where id=".$id;

if(mysqli_query($conn,$sql)){
    header('location:../list.php');
}




