<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="index.css">
  <title>Dua || Home of Your Plant Needs</title>
</head>

<body>
  <main>
    <div class="container">
      <nav class="navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Dua</a>
          <div class="d-flex" role="search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </div>
        </div>
      </nav>
      <section id="hero">
        <div>
          <h1>Home Of All Your <span class="green-highlight">Plant</span> Needs</h1>
          <button>Shop Now</button>
          <div style="display: flex;">
            <div class="analytics"> <span class="green-highlight analytics-head">250+</span><br><span
                class="analytics-text">Deliveries</span></div>
            <div class="analytics"> <span class="green-highlight analytics-head">30+</span><br><span
                class="analytics-text">Products</span></div>
            <div class="analytics"> <span class="green-highlight analytics-head">∞</span> <br><span
                class="analytics-text">Lives Changed</span></div>
          </div>
        </div>
        <div>
          <img src="assets/hero_image.jpg" alt="hero image"
            style=" width: 600px; height: 400px; border-radius: 30% 70% 77% 23% / 47% 55% 45% 53%; margin-top: 3em;">
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
      <a href="">See More</a>

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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>