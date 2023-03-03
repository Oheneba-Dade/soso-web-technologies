<?php

$pid = $_GET['pid'];
include('database/db_connections.php');
$conn = OpenConn();

//create a form with information from the database
$sql = "SELECT * FROM product WHERE product_id = $pid";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/editProduct.css">
    <title>Update Product</title>
</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Dua</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="shopping.php" style="color: #165166;">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php" style="color: #165166;">Cart</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            session_start();
                            if (isset($_SESSION['userid'])) {
                                echo '<a class="nav-link" href="logout.php">Logout</a>';
                            } else {
                                echo '<a class="nav-link" href="login.php">Login</a>';
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <h1>Update Product</h1>
        <form>
            <?php
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<input type='hidden' name='pid' value='$row[product_id]'>";
                echo "<label for='pname'>Product Name</label>";
                echo "<input type='text' name='pname' value='$row[product_name]'>";
                echo "<label for='pprice'>Price</label>";
                echo "<input type='number' name='pprice' value='$row[price]'>";
                echo "<label for='quantity'>Quantity</label>";
                echo "<input type='number' name='quantity' value='$row[quantity]'>";
                echo "<label for='pweight'>Weight (oz)  </label>";
                echo "<input type='number' name='pweight' value='$row[weight]'>";
                echo "<label for='pdesc'>Description</label>";
                echo "<input type='textarea' name='pdesc' value='$row[description]'>";
                echo "<label for='pcid'>Category</label>";
                //echo dropdown list of categories - potted plant, bouquets and vases
                echo "<select name='pcid'>";
                //get category name from category table
                $sql_categories = "SELECT * FROM category";
                $result_categories = $conn->query($sql_categories);
                if ($result_categories->num_rows > 0) {
                    while ($row_categories = $result_categories->fetch_assoc()) {
                        if ($row_categories['category_id'] == $row['category_id']) {
                            echo "<option value='$row_categories[category_id]' selected>$row_categories[category_name]</option>";
                        } else {
                            echo "<option value='$row_categories[category_id]'>$row_categories[category_name]</option>";
                        }
                    }
                }
                echo "</select>";
            }
            ?>
            <input type="submit" value="Update">
        </form>
    </div>
</body>

<script>
    let submit = document.querySelector('input[type="submit"]');
    submit.addEventListener('click', function (e) {
        e.preventDefault();
        //make an Ajax request to edit processing page with form Data
        let form = document.querySelector('form');
        let formData = new FormData(form);
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'editProductProc.php', true);
        xhr.send(formData);
        xhr.onload = function () {
            if (this.status == 200) {
                window.location.href = 'shoppingAdmin.php';
            }
        }
    })
</script>

</html>