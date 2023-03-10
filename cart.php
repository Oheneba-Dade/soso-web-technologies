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
        // session_start();
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
            if (!empty($_SESSION['cart'])) {
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
                        echo "<input id=" . 'input' . "$key" . " type='number' onkeydown='return false' min=1 max='$row[quantity]' name='quantity' value=" . $value . " >";
                        echo "</div>";
                        echo "<div class='col-2'>";
                        echo "<h3 id=" . 'price' . "$key" . '>' . "" . number_format($row['price'], 2) . "Gp</h3>";
                        echo "</div>";
                        echo "<div class='col-2'>";
                        //echo the product of the input value and the price
                        echo "<h3 id=" . 'total' . "$key" . '>' . number_format($row['price'] * $value, 2) . "Gp</h3>";
                        echo "</div>";
                        echo "<div class='col-2'>";
                        //echo a bootstrap icon that will remove the item from the cart
                        echo "<i id=" . 'delete' . "$key" . " class='bi bi-trash'></i>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                echo "<div class='row'>";
                echo "<div class='col-2'>";
                echo "</div>";
                echo "<div class='col-2'>";
                echo "</div>";
                echo "<div class='col-2'>";
                echo "</div>";
                echo "<div class='col-2'>";
                echo "<h3>Total Price:</h3>";
                echo "</div>";
                echo "<div class='col-2'>";
                echo "<h3 id='total'></h3>";
                echo "</div>";
                echo "</div>";

                echo "<div class='row' style='margin-top: 3em;'>";
                echo "<div class='col-2'>";
                echo "</div>";
                echo "<div class='col-2'>";
                echo "</div>";
                echo "<div class='col-2'>";
                echo "</div>";
                echo "<div class='col-2'>";
                echo "<button class='alternate-green'>Continue Shopping</button>";
                echo "</div>";
                echo "<div class='col-2'>";
                echo "<button class='primary-green'>Checkout</button>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<h3 id='centered'>Your cart is empty <i class='bi bi-emoji-frown'></i></h3>";
            }
        }

        ?>
    </div>
    <script>

        if (document.querySelector('.primary-green')) {
            document.querySelector('.alternate-green').addEventListener('click', () => {
                window.location.href = 'shopping.php';
            })

        }

        if (document.querySelector('.primary-green')) {
            document.querySelector('.primary-green').addEventListener('click', () => {
                window.location.href = 'checkoutProc.php';
            })
        }

        let inputs = document.querySelectorAll("input[type='number']");
        let totalSum = document.getElementById('total');

        //calculate total price
        let sum = 0;
        inputs.forEach(input => {
            let inputId = input.id.slice(5);
            let correspondingTotal = 'total' + inputId;
            let total = document.getElementById(correspondingTotal).innerText;
            total = total.slice(0, -2);
            total = parseFloat(total);
            sum += total;
            console.log(sum);
            totalSum.innerText = sum.toFixed(2) + "Gp";
        })

        inputs.forEach(input => {
            input.addEventListener('change', () => {
                let newSum = 0;
                inputs.forEach(input => {
                    let inputId = input.id.slice(5);
                    let correspondingTotal = 'total' + inputId;
                    let total = document.getElementById(correspondingTotal).innerText;
                    total = total.slice(0, -2);
                    total = parseFloat(total);
                    newSum += total;
                    console.log(newSum);
                    totalSum.innerText = newSum.toFixed(2) + "Gp";
                })
            })
        })

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
                document.getElementById(correspondingTotal).innerText = newTotal.toFixed(2) + "Gp";
                let xhr = new XMLHttpRequest();
                xhr.open('GET', `cartUpdate.php?pid=${inputId}&quantity=${input.value}`, true);
                xhr.send();
            })
        })

        //ensure that only numbers can be placed into input
        inputs.forEach(input => {
            input.addEventListener('keydown', (e) => {
                let inputId = input.id.slice(5);
                if (e.key === 'e' || e.key === 'E' || e.key === '+' || e.key === '-') {
                    e.preventDefault();
                }
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