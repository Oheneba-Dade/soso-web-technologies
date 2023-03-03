<?php
//connect to database
include("database/db_connections.php");
$conn = OpenConn();

//get information from GET URL
$pid = $_GET['pid'];

//query for the path image of the product
$sql = "SELECT picture_path FROM product WHERE product_id = '$pid'";
$result = mysqli_query($conn, $sql);

//get the path of the image
$row = mysqli_fetch_assoc($result);
$path = $row['picture_path'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/updateImage.css">
    <title>Update Product Picture</title>
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
        <h1 style="text-align: center;">Update Product Picture</h1>
        <div class="container">

            <form class="row" action="editPictureProc.php" method="POST" enctype="multipart/form-data">
                <div class="col-6">
                    <img id="oldImage" src="<?php echo $path; ?>" alt="product picture"
                        style="width: 500px; height: 500px;">
                    <h2>Current Picture</h2>
                </div>
                <div class="col-6">
                    <div id="newImageDiv"></div>
                    <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                    <label for="ppicture">Product Picture</label>
                    <input type="file" name="ppicture" value="<?php echo $path; ?>">
                    <input type="submit" value="Update">
                </div>
            </form>

        </div>
</body>


<script>
    //get the file path of the image in the input type File
    let submit = document.querySelector("input[type='submit']");
    let file = document.querySelector("input[type='file']");
    let oldImage = document.getElementById("oldImage");

    file.addEventListener("change", function () {
        let file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function () {
                let result = reader.result;
                let img = document.createElement("img");
                img.src = result;
                img.id = "newImage";
                let newImageDiv = document.getElementById("newImageDiv");
                newImageDiv.appendChild(img);

                //let the newImage have the same width and height as old Image
                let newImage = document.getElementById("newImage");
                newImage.style.width = oldImage.offsetWidth + "px";
                newImage.style.height = oldImage.offsetHeight + "px";

            }
            reader.readAsDataURL(file);
        }
    });

</script>

</html>