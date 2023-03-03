<?php
include('database/db_connections.php');
$conn = OpenConn();

session_start();

$sql = "UPDATE `users` SET `user_stat`= 2  WHERE `user_id` = '$_SESSION[userid]'";
$result = mysqli_query($conn, $sql);

unset($_SESSION['userid']);
unset($_SESSION['urrole']);
unset($_SESSION['cart']);
header("location: login.php");

?>