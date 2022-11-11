<?php
    session_start();

    if ($_SESSION['user']) {
        header('Location: /');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authorization</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>

<form id="authorization" action="request.php" method="post">
        <label>Login</label>
        <input type="text" name="login" placeholder="Enter your login">
        <span></span>
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter password">
        <span></span>
        <button id="aut" type="button">Log in</button>
        <p>
        Don't have an account? - <a href="/index.php">register</a>!
        </p>
        <p id="mess"></p>
</form>

    <script src="/scripts/main.js"></script>
    <script src="/scripts/authorization.js"></script>
</body>
</html>