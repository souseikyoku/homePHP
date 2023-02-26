<?php
//DB位置，ユーザー名，パスワード，　位置：ipアドレス，localhost, 127.0.0.1
$conn = mysqli_connect('localhost','root','');
//DB名を指定する。
mysqli_select_db($conn,'address');
//UTF8を設定する
mysqli_query($conn,'set names utf8');



