<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/cart.css">
    <title>Your Cart</title>
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
        //obtain information coming from the product.php page and add to session array of cart items
        session_start();
        if (isset($_GET['pid'])) {
            $pid = $_GET['pid'];
            $quantity = $_GET['quantity'];
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }
            $_SESSION['cart'][$pid] = $quantity;
        }
        foreach ($_SESSION['cart'] as $key => $value) {
            echo $key . " " . $value;
        }



        ?>
    </div>
</body>

</html>