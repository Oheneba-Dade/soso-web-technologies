<?php
//connect to database
include("database/db_connections.php");
$conn = OpenConn();

//get information from AJAX Request
$pid = $_GET['pid'];

//delete product
$sql = "DELETE FROM product WHERE product_id = $pid";
$result = mysqli_query($conn, $sql);

//check if result is true

header("Location: shoppingAdmin.php");

//close connection
CloseConn($conn);
?>