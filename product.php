<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/product.css">
    <title>Shopping Page</title>
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
                    </ul>
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
        echo "<img src='$row[picture_path]' alt='' class='img-fluid'>";
        echo "<div class='product-details'>";
        echo "<h1>" . $row['product_name'] . "</h1>";
        echo "<h2>" . $row['price'] . "Gp" . "</h2>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<br>";
        echo "<br>";
        echo "<button id='alternate-green'>Continue Shopping</button>";
        if ($row['quantity'] == 0) {
            echo "<button id='primary-green' disabled>Add to Cart</button>";
        } else {
            echo "<button id='primary-green'>Add to Cart</button>";
        }
        echo "<input type='number' name='quantity' id='quantity' min=0 max='$row[quantity]'>";
        if ($row['quantity'] == 0) {
            echo "<p style='color: red; margin-top: 1em;'>Out of Stock</p>";
        }
        echo "</div>";

        echo "</div>";
        ?>
    </div>

    <script>
        // collect the product id and quantity value when the add to cart button is clicked
        document.getElementById('primary-green').addEventListener('click', function () {
            let pid = <?php echo $pid; ?>;
            let quantity = document.getElementById('quantity').value;
            // send the product id and quantity value to the cart.php page
            window.location.href = "cart.php?pid=" + pid + "&quantity=" + quantity;
        });

        // redirect to the shopping page when the continue shopping button is clicked
        document.getElementById('alternate-green').addEventListener('click', function () {
            window.location.href = "shopping.php";
        });
    </script>

</body>