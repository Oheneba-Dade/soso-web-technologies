<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="shopping.css">
  <title>Shopping Page</title>
</head>

<body>
  <div class="container">
    <nav class="navbar">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html">Dua</a>
        <div class="d-flex" role="search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </div>
      </div>
    </nav>
    <main>

      <?php
      include('database/db_connections.php');

      $conn = OpenConn();
      $sql = "SELECT * FROM product WHERE category_id = 1";
      $result = $conn->query($sql);

      echo "<h2>Potted Plants</h2>";
      echo "<div class='categories'>";
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<div class='card'>";
          echo "<img src='$row[picture_path]' alt='' style='height: 70%;'>";
          echo "<p class='product-name'>" . $row['product_name'] . "</p>";
          echo "<p class='product-details'>" . $row['price'] . "Gp • " . $row['weight'] . "</p>";
          echo "</div>";
        }
      }
      echo "</div>";
      $sql = "SELECT * FROM product WHERE category_id = 2";
      $result = $conn->query($sql);
      echo "<h2>Bouquets</h2>";
      echo "<div class='categories'>";
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<div class='card'>";
          echo "<img src='$row[picture_path]' alt='' style='height: 70%;'>";
          echo "<p class='product-name'>" . $row['product_name'] . "</p>";
          echo "<p class='product-details'>" . $row['price'] . "Gp • " . $row['weight'] . "</p>";
          echo "</div>";
        }
      }



      CloseConn($conn);


      ?>
    </main>
  </div>

  <footer style="display: flex;">
    <div class="container">
      <p>Follow us on all our social media pages</p>
      <a href="">Twitter</a>
      <br>
      <a href="">Linkedin</a>
      <br>
      <a href="">Instagram</a>
      <br>
      <a href="">Youtube</a>
      <br>
      <a href="">Email</a>
    </div>
  </footer>

</body>

</html>