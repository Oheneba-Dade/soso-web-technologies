<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <title>Log In - Dua</title>



    <link rel="stylesheet" href="login.css">
</head>


<body>


<div class="container">
    <div class = "form-container">

        <div class = "header">
        <p class = "logo">Dua</p>

        <p class="heading" id="trial">Log In</p>
        
</div>


        <form name="form" action="process.php" method="POST" >
            <div class = "inputs">

                <div class="inputfield">
                <input type="text" placeholder="Username" name = "uname" id="uname" required>
                </div>

                <div class="inputfield">
                    <input type="email" placeholder="Email" name = "email" id="email" required>
                </div>

                <div class="inputfield" >
                    <input type="password" placeholder="Password" name = "pass1"  id="pass" required>
                </div>

                <div class="inputfield">
                    <input type="password" placeholder="Confirm Password" name = "pass2" id="pass2" required>
                </div>

            
                <div class = "btn-field">
                    <input id="signin" type="submit" value="Submit" onclick="validateEmail(document.form.email);validatePass(document.form.password)">
                </div>

                <p class="noaccount">Already have an account? Log in
                    <a href="login.php">here</a>
                </p>

            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="register.js"></script>
    
</body>
</html>