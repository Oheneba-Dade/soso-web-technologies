<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- CSS -->
  <link rel="stylesheet" href="css/signup.css" />

  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
  <div class="container">
    <header>Sign Up</header>
    <form id="myform">


      <div class="field phone-field">
        <div class="input-field">
          <input type="text" name="username" placeholder="First Name" class="tel" />
        </div>
        <!-- <span class="error email-error">
            <i class="bx bx-error-circle error-icon"></i>
            <p class="error-text">Please enter a valid phone number</p>
          </span> -->
      </div>



      <div class="field email-field" id="email-field">
        <div class="input-field">
          <input type="email" name="useremail" placeholder="Enter your email" class="email" id="emailInput" />
        </div>
        <span class="error email-error">
          <i class="bx bx-error-circle error-icon"></i>
          <p class="error-text">Please enter a valid email</p>
        </span>
      </div>





      <div class="field create-password">
        <div class="input-field">
          <input type="password" placeholder="Create password" class="password" />
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


      <div class="field confirm-password">
        <div class="input-field">
          <input type="password" name="userpass" placeholder="Confirm password" class="cPassword" />
          <i class="bx bx-hide show-hide"></i>
        </div>
        <span class="error cPassword-error">
          <i class="bx bx-error-circle error-icon"></i>
          <p class="error-text">Password don't match</p>
        </span>
      </div>
    </form>

    <div class="input-field button">
      <input type="button" name="register" value="Submit" id="btn" />
    </div>

    <p>Already have an account? <a href="login.php">Login</a></p>

  </div>


  <script src="js/signup.js"></script>
</body>

</html>