<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log In</title>

  <!-- CSS -->
  <link rel="stylesheet" href="css/login.css" />

  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
  <div class="container">
    <header>Login</header>
    <form id="logform">


      <div class="field email-field" id="email-field">
        <div class="input-field">
          <input type="email" name="logemail" placeholder="Email" class="email" id="emailInput" />
        </div>
        <span class="error email-error">
          <i class="bx bx-error-circle error-icon"></i>
          <p class="error-text">Please enter a valid email</p>
        </span>
      </div>



      <div class="field create-password">
        <div class="input-field">
          <input type="password" name="logpass" placeholder="Enter password" class="password" />
          <i class="bx bx-hide show-hide"></i>
        </div>
        <span class="error password-error">
          <i class="bx bx-error-circle error-icon"></i>
          <p class="error-text">
            Please enter atleast 8 character with number, symbol, small and
            capital letter.
          </p>
        </span>
      </div>


      <div class="input-field button">
        <input type="button" name="register" value="Submit" id="btn" />
      </div>

      <p>Don't have an account? <a href="signup.php">Sign Up</a></p>

  </div>


  <script src="js/login.js"></script>
</body>

</html>