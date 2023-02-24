<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="css/shopping.css">
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
    <main>
      <input type="search" style="float: right;">

      <?php
      include('database/db_connections.php');

      $conn = OpenConn();
      $sql = "SELECT * FROM product WHERE category_id = 1";
      $result = $conn->query($sql);

      echo "<h2>Potted Plants</h2>";
      echo "<div class='categories'>";
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $id = $row['product_id'];
          echo "<a class='shop-item' href='product.php?pid=$id'>";
          echo "<div class='card'>";
          echo "<img src='$row[picture_path]' alt='' style='height: 70%;'>";
          echo "<p class='product-name'>" . $row['product_name'] . "</p>";
          echo "<p class='product-details'>" . $row['price'] . "Gp • " . $row['weight'] . "</p>";
          echo "</div>";
          echo "</a>";
        }
      }
      echo "</div>";
      $sql = "SELECT * FROM product WHERE category_id = 2";
      $result = $conn->query($sql);
      echo "<h2>Bouquets</h2>";
      echo "<div class='categories'>";
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $id = $row['product_id'];
          echo "<a class='shop-item' href='product.php?pid=$id'>";
          echo "<div class='card'>";
          echo "<img src='$row[picture_path]' alt='' style='height: 70%;'>";
          echo "<p class='product-name'>" . $row['product_name'] . "</p>";
          echo "<p class='product-details'>" . $row['price'] . "Gp • " . $row['weight'] . "</p>";
          echo "</div>";
          echo "</a>";
        }
      }

      echo "</div>";
      $sql = "SELECT * FROM product WHERE category_id = 3";
      $result = $conn->query($sql);
      echo "<h2>Vases</h2>";
      echo "<div class='categories'>";
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $id = $row['product_id'];
          echo "<a class='shop-item' href='product.php?pid=$id'>";
          echo "<div class='card'>";
          echo "<img src='$row[picture_path]' alt='' style='height: 70%;'>";
          echo "<p class='product-name'>" . $row['product_name'] . "</p>";
          echo "<p class='product-details'>" . $row['price'] . "Gp • " . $row['weight'] . "</p>";
          echo "</div>";
          echo "</a>";
        }
      }



      CloseConn($conn);


      ?>
    </main>
  </div>

  <footer>
    <div class="content">
      <div class="left box">
        <div class="upper">
          <div class="topic">About us</div>
          <p>Dua is a start up focused on meeting all your plant needs. </p>
        </div>
        <div class="lower">
          <div class="topic">Contact us</div>
          <div class="phone">
            <a href="#"><i class="fas fa-phone-volume"></i>+007 9089 6767</a>
          </div>
          <div class="email">
            <a href="#"><i class="fas fa-envelope"></i>dua@gmail.com</a>
          </div>
        </div>
      </div>
      <div class="middle box">
        <div class="topic">Our Services</div>
        <div><a href="#">Potted Plants</a></div>
        <div><a href="#">Bouquets</a></div>
        <div><a href="#">Vases</a></div>
      </div>
      <div class="right box">
        <div class="topic">Subscribe us</div>
        <form action="#">
          <input type="text" placeholder="Enter email address">
          <input type="submit" name="" value="Send">
          <div class="media-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </form>
      </div>
    </div>
    <div class="bottom">
      <p>Copyright © 2020 Dua All rights reserved</p>
    </div>
  </footer>

  <script>
    const search = document.querySelector('input');
    const cards = document.querySelectorAll('.shop-item');
    search.addEventListener('keyup', (e) => {
      const searchString = e.target.value.toLowerCase();
      for (let card of cards) {
        const title = card.querySelector('.product-name').textContent;
        if (title.toLowerCase().includes(searchString)) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      }
    })
  </script>

</body>

</html>