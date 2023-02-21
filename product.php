<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="product.css">
    <title>Shopping Page</title>
</head>

<body>
    <div class="container">
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Dua</a>
                <div class="d-flex" role="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </div>
            </div>
        </nav>
        <?php

        if (isset($_GET['pid'])) {
            $pid = $_GET['pid'];
        }

        include('database/db_connections.php');
        $conn = OpenConn();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM product WHERE product_id = $pid";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        echo "<div class='product'>";
        echo "<img src='$row[picture_path]' alt=''>";
        echo "<div class='product-details'>";
        echo "<h1>" . $row['product_name'] . "</h1>";
        echo "<h2>" . $row['price'] . "Gp" . "</h2>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<br>";
        echo "<br>";
        echo "<a href='' class='alternate-green'>Continue Shopping</a>";
        echo "<a href='' class='primary-green'>Add to Cart</a>";
        echo "<input type='number' name='quantity' id='quantity' min='1' max='10' value='1'>";
        echo "</div>";

        echo "</div>";
        ?>

</body>