<?php

//connect to database
include("database/db_connections.php");
$conn = OpenConn();

//get information from AJAX Request
$product_name = $_POST['product_name'];
$quantity = $_POST['quantity'];
$weight = $_POST['weight'];
$price = $_POST['price'];
$description = $_POST['description'];
// $picture_path = $_FILES['picture_path'];
$category_id = $_POST['category_id'];


// echo "<script>console.log('picture_path: $picture_path')</script>";


//update product path variable
$sql_category_name = "SELECT category_name FROM category WHERE category_id = '$category_id'";
$result_category_name = mysqli_query($conn, $sql_category_name);
$row_category_name = mysqli_fetch_assoc($result_category_name);
$category_name = $row_category_name['category_name'];
$picture_path = "assets/" . $category_name . "/";
$target_file = $picture_path . basename($_FILES['picture_path']['name']);


//insert into product table
$sql = "INSERT INTO product (product_name, quantity, weight, description, picture_path, category_id, price) VALUES ('$product_name', '$quantity', '$weight', '$description', '$target_file', '$category_id', '$price')";

$result = mysqli_query($conn, $sql);
if ($result) {
    move_uploaded_file($_FILES['picture_path']['tmp_name'], $target_file);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//close connection
CloseConn($conn);
header("Location: shoppingAdmin.php");
?>