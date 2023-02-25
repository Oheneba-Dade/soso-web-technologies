<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
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
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-2">
                <h3>Name</h3>
            </div>
            <div class="col-2">
                <h3>Quantity</h3>
            </div>
            <div class="col-2">
                <h3>Price</h3>
            </div>
            <div class="col-2">
                <h3>Total</h3>
            </div>
        </div>
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
        include('database/db_connections.php');
        $conn = OpenConn();
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                //obtain product information from database
                $sql = "SELECT * FROM product WHERE product_id = $key";
                //execute query
                $result = $conn->query($sql);
                //check if there are any results
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    //echo all information in $row
                    echo "<div id=" . 'item' . "$key" . " class='row'>";
                    echo "<div class='col-2'>";
                    echo "<img src=" . $row['picture_path'] . " alt='product image' class='img-fluid'>";
                    echo "</div>";
                    echo "<div class='col-2'>";
                    echo "<h3>" . $row['product_name'] . "</h3>";
                    echo "</div>";
                    echo "<div class='col-2'>";
                    //echo an input tyoe number with the value of the quantity
                    echo "<input id=" . 'input' . "$key" . " type='number' min=1 name='quantity' value=" . $value . " >";
                    echo "</div>";
                    echo "<div class='col-2'>";
                    echo "<h3 id=" . 'price' . "$key" . '>' . "" . $row['price'] . "Gp</h3>";
                    echo "</div>";
                    echo "<div class='col-2'>";
                    //echo the product of the input value and the price
                    echo "<h3 id=" . 'total' . "$key" . '>' . $row['price'] * $value . "Gp</h3>";
                    echo "</div>";
                    echo "<div class='col-2'>";
                    //echo a bootstrap icon that will remove the item from the cart
                    echo "<i id=" . 'delete' . "$key" . " class='bi bi-trash'></i>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        }


        ?>
    </div>
    <script>
        let inputs = document.querySelectorAll("input[type='number']");
        inputs.forEach(input => {
            input.addEventListener('change', () => {
                let inputId = input.id.slice(5);
                let correspondingTotal = 'total' + inputId;
                let correspondingPrice = 'price' + inputId;
                let total = document.getElementById(correspondingTotal).innerText;
                let price = document.getElementById(correspondingPrice).innerText;
                total = total.slice(0, -2);
                price = price.slice(0, -2);
                let newTotal = price * input.value;
                document.getElementById(correspondingTotal).innerText = newTotal + "Gp";
            })
        })

        let deleteButtons = document.querySelectorAll(".bi-trash");
        deleteButtons.forEach(deleteButton => {
            deleteButton.addEventListener('click', () => {
                let deleteButtonId = deleteButton.id.slice(6);
                let correspondingItem = 'item' + deleteButtonId;
                document.getElementById(correspondingItem).remove();
                let xhr = new XMLHttpRequest();
                xhr.open('GET', 'remove.php?pid=' + deleteButtonId, true);
                xhr.send();
            })
        })
    </script>


</body>

</html>