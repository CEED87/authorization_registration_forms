<?php

    session_start();

    if ($_SESSION['user']) {
       header('Location: /pages/userAccount.php');
   }
?>
<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Авторизация и регистрация</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>

   <form id="register"  method="POST">
       <label>Login</label>
       <input type="text" name="login" placeholder="Enter your login">
       <span></span>
       <label>Password</label>
       <input type="password" name="password" placeholder="Enter password">
       <span></span>
       <label>Confirm password</label>
       <input type="password" name="confirm_password" placeholder="Confirm the password">
       <span></span>
       <label>Email</label>
       <input type="email" name="email" placeholder="Enter your email address">
       <span></span>
       <label>Name</label>
       <input type="text" name="name" placeholder="Enter your full name">
       <span></span>
       <button id="reg" type="button">Registration</button>
       <p>
       Do you already have an account? - <a href="/pages/authorization.php">log in</a>!
       </p>
       <p id="mess"></p>
   </form>

   <script src="/scripts/main.js"></script>
   <script src="/scripts/registration.js"></script>
   
</body>
</html>





