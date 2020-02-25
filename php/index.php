<?php
include('config.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
    <link rel="stylesheet" href="../style.css">
    <script src="https://kit.fontawesome.com/f3b1ef72aa.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container1">
    <a href="index.php" id="title">TITLE</a>
</div>

<div class="container2">
    <div>space</div>
</div>

<div class="container3">
    <a href="https://www.facebook.com/" id="sr1"><i class="fab fa-facebook-square"></i></a>
    <a href="https://www.twitter.com/" id="sr2"><i class="fab fa-twitter-square"></i></i></a>
    <a href="https://www.instagram.com/" id="sr3"><i class="fab fa-instagram"></i></a>
    <a href="https://www.youtube.com/" id="sr4"><i class="fab fa-youtube"></i></a>
    <a id="space1">.</a>
    <?php
    if (isset($_SESSION['username'])) {
        ?>
        <a href="connexion.php">
            <button id="log">Log Out</button>
        </a>
        <?php
    } else if (!isset($_SESSION['username'])) {
        ?>
        <a href="connexion.php">
            <button id="log">Log In</button>
        </a>
        <a href="connexion.php"></a>
        <?php
    } else {
        ?>
        <a href="sign_up.php">(
            <button id="log">Sign Up</button>
        </a>
        <a href="connexion.php"></a>
        <?php
    }
    ?>
</div>
<a id="space2">.</a>
</div>

<div class="container4">
    <a href="article1.php" id="a1">.</a>
    <a href="article2.php" id="a2">.</a>
    <a href="article3.php" id="a3">.</a>
</div>
<div class="container4b">
    <a href="article1.php">Article 1</a>
    <a href="article2.php">Article 2</a>
    <a href="article3.php">Article 3</a>
</div>

<div class="container5">
    <div id="p1">.</div>
    <div id="p2">.</div>
    <div id="p3">.</div>
    <div id="p4">.</div>
    <div id="p5">.</div>
    <div id="p6">.</div>
    <div id="p7">.</div>
    <div id="p8">.</div>
    <div id="p9">.</div>
    <div id="p10">.</div>
    <div id="p11">.</div>
    <div id="p12">.</div>
</div>

<div class="container6">
    <iframe id="player" src="https://www.youtube.com/embed/pRG__yFg-zM" frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>


<div class="container7">
    <div>space</div>
</div>

<div class="container8">
    <a href="about.php" id="about">About</a>
    <a href="contact.php" id="contact">Contact</a>
    <a href="terms.php" id="terms">Terms</a>
    <a href="privacy.php" id="privacy">Privacy</a>
</div>

<div class="container9">
    <a>Society</a>
</div>
</body>
</html>