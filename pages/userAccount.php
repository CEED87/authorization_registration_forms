<?php
    session_start();
    if (!$_SESSION['user']) {
        header('Location: authorization.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Area <?= $_SESSION['user']?></title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <div>
        <h1 style="margin: 10px 0;">Hello <?= $_SESSION['user']?></h1>
        <a href="signOutProfile.php" class="logout">Exit</a>
        <div clas=link>
            <a href="/pages/page1.php">page1</a>
            <a href="/pages/page2.php">page2</a>
            <a href="/pages/page3.php">page3</a>
        </div>
    </div>
    
</body>
</html>