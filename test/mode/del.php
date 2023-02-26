<?php
require_once '../DB/conn.php';

$id = $_GET['id'];

if($id > 0 && $id != '*'){
    //削除SQL
    $sql = "delete from list where id =".$id;
    if(mysqli_query($conn,$sql)){
        header('location:../list.php');
    }
}





