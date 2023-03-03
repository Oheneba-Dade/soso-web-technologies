<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="css/index.css">

  <!-- favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="/assets/favicon/site.webmanifest">

  <title>Dua || Home of Your Plant Needs</title>
</head>

<body>
  <main>
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
                <a class="nav-link" href="shopping.php" style="color: white;">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cart.php" style="color: white;">Cart</a>
              </li>
              <li class="nav-item">
                <?php
                session_start();
                if (isset($_SESSION['userid'])) {
                  echo '<a class="nav-link" href="logout.php" style="color: white;">Logout</a>';
                } else {
                  echo '<a class="nav-link" href="login.php" style="color: white;">Login</a>';
                }
                ?>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <section id="hero">
        <div>
          <h1>Home Of All Your <span class="green-highlight">Plant</span> Needs</h1>
          <a href="shopping.php"><button>Shop Now</button></a>
          <div style="display: flex;">
            <div class="analytics"> <span class="green-highlight analytics-head">250+</span><br><span
                class="analytics-text">Deliveries</span></div>
            <div class="analytics"> <span class="green-highlight analytics-head">30+</span><br><span
                class="analytics-text">Products</span></div>
            <div class="analytics"> <span class="green-highlight analytics-head">∞</span> <br><span
                class="analytics-text">Lives Changed</span></div>
          </div>
        </div>
        <div id="round_img">
          <img src="assets/hero_image.jpg" alt="hero image" class="img-fluid"
            style="height: 400px; border-radius: 30% 70% 77% 23% / 47% 55% 45% 53%; margin-top: 3em;">
        </div>
      </section>
    </div>
  </main>

  <section class="secondary-section">
    <div class="container">
      <h2>Featured Products</h2>
      <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1" style="background-color: #165166;"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"
            style="background-color: #165166;"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"
            style="background-color: #165166;"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/potted_plants/long_pot.png" class="d-block carousel-img" alt="...">
          </div>
          <div class="carousel-item">
            <img src="assets/potted_plants/long_pot.png" class="d-block carousel-img" alt="...">
          </div>
          <div class="carousel-item">
            <img src="assets/potted_plants/long_pot.png" class="d-block carousel-img" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #165166;"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #165166;"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <a href="shopping.php">See More</a>

      <h2>Reviews</h2>
      <div style="display: flex;">
        <p class="reviews">"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident delectus magnam
          quibusdam aliquid commodi amet iste, sit soluta enim voluptates excepturi repellendus quis illum odio. Esse
          pariatur eum repellat tenetur."</p>
        <p class="reviews">"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident delectus magnam
          quibusdam aliquid commodi amet iste, sit soluta enim voluptates excepturi repellendus quis illum odio. Esse
          pariatur eum repellat tenetur."</p>
        <p class="reviews">"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident delectus magnam
          quibusdam aliquid commodi amet iste, sit soluta enim voluptates excepturi repellendus quis illum odio. Esse
          pariatur eum repellat tenetur."</p>
      </div>
    </div>
  </section>


  <!-- <footer>
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
  </footer> -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>