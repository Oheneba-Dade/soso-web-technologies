<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/editProduct.css">
    <title>Add Product</title>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
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
        <h1>Add Product</h1>
        <form method="POST" action="addProductProc.php" enctype="multipart/form-data">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" min=0>
            <label for="price">Price</label>
            <input type="number" name="price" min=0 step="any">
            <label for="weight">Weight</label>
            <input type="number" name="weight" min=0 step="any">
            <label for="description">Description</label>
            <input type="textarea" name="description">
            <label for="picture_path">Picture Path</label>
            <input type="file" name="picture_path">
            <label for="category_id">Category</label>
            <?php
            include('database/db_connections.php');
            $conn = OpenConn();
            $sql_categories = "SELECT * FROM category";
            $result_categories = $conn->query($sql_categories);
            if ($result_categories->num_rows > 0) {
                echo "<select name='category_id'>";
                while ($row_categories = $result_categories->fetch_assoc()) {
                    echo "<option value='$row_categories[category_id]'>$row_categories[category_name]</option>";
                }
                echo "</select>";
            }
            ?>
            <input type="submit" value="Add">
        </form>
    </div>
</body>

<script>
    // let submit = document.querySelector('input[type="submit"]');
    // submit.addEventListener('click', function (e) {
    //     e.preventDefault();
    //     let product_name = document.querySelector('input[name="product_name"]').value;
    //     let quantity = document.querySelector('input[name="quantity"]').value;
    //     let price = document.querySelector('input[name="price"]').value;
    //     let weight = document.querySelector('input[name="weight"]').value;
    //     let description = document.querySelector('input[name="description"]').value;
    //     let picture_path = document.querySelector('input[name="picture_path"]').value;
    //     let category_id = document.querySelector('select[name="category_id"]').value;

    //     //get rid of fakepath in picture_path
    //     let picture_path_array = picture_path.split('\\');
    //     picture_path = picture_path_array[picture_path_array.length - 1];

    //     let getURL = `addProductProc.php?product_name=${product_name}&quantity=${quantity}&price=${price}&weight=${weight}&description=${description}&picture_path=${picture_path}&category_id=${category_id}`;
    //     window.location.href = getURL;


    // })
</script>


</html>