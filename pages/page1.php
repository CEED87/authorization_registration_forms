<?php 
    session_start();
    if (!$_SESSION['user']) {
        header('Location: authorization.php');
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title><?= $_SESSION['user'] ?></title>
</head>
<body>
    <h1>Page №1</h1>
    <div class="profile">
        <h2 style="margin: 10px 0;"><?= $_SESSION['user']?></h2>
        <p><a href="signOutProfile.php" class="logout">Exit</a></p> 
        <div clas=link>
            <a href="page2.php">page2</a>
            <a href="page3.php">page3</a>
        </div>
    </div>
</body>
</html>