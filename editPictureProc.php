<?php
//connect to database
include("database/db_connections.php");
$conn = OpenConn();

//get information from AJAX Request
$pid = $_GET['pid'];

//get the category id from pid and inner join with category table to get the category name
$sql = "SELECT category.category_name FROM product 
INNER JOIN category ON product.category_id = category.category_id 
WHERE product_id = '$pid'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

//get the category name
$category = $row['category_name'];

$picture_path = "assets/" . $category . "/" . $ppicture;

$target_file = $picture_path . basename($_FILES['ppicture']['name']);

//update product information
$sql2 = "UPDATE product SET picture_path = '$target_file' WHERE product_id = '$pid'";
$result2 = mysqli_query($conn, $sql2);

if ($result2) {
    move_uploaded_file($_FILES['ppicture']['tmp_name'], $target_file);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//close connection
CloseConn($conn);

header("Location: shoppingAdmin.php");
?>