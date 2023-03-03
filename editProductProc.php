<?php
//connect to database
include("database/db_connections.php");
$conn = OpenConn();


//get information from AJAX Request
$pid = $_POST['pid'];
$pname = $_POST['pname'];
$pprice = $_POST['pprice'];
$pweight = $_POST['pweight'];
$quantity = $_POST['quantity'];
$pdesc = $_POST['pdesc'];
$pcid = $_POST['pcid'];



//update product information
$sql = "UPDATE product SET product_name = '$pname', price = '$pprice', weight = '$pweight', description = '$pdesc', quantity = '$quantity', category_id = '$pcid' WHERE product_id = '$pid'";
$result = mysqli_query($conn, $sql);

//close connection
CloseConn($conn);
header("Location: shoppingAdmin.php");
?>