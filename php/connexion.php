<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
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
            <button id="log">Sign In</button>
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
<?php
if (isset($_SESSION['username'])) {
    unset($_SESSION['username'], $_SESSION['userid']);
    ?>
    <div class="message">Vous avez bien &eacute;t&eacute; d&eacute;connect&eacute;.<br/>
        <a href="<?php echo $url_home; ?>">Homepage</a></div>
    <?php
} else {
    $ousername = '';
    if (isset($_POST['username'], $_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $req = $mysqli->query('select password,id from users where username="' . $username . '"');
        $dn = mysqli_fetch_array($req);
        if ($dn['password'] == $password and mysqli_num_rows($req) > 0) {
            $form = false;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['userid'] = $dn['id'];
            ?>
            <div class="message">Vous avez bien &eacute;t&eacute; connect&eacute;. Vous pouvez acc&eacute;der &agrave;
                votre espace membre.<br/>
                <a href="<?php echo $url_home; ?>">Accueil</a></div>
            <?php
        } else {
            $form = true;
            $message = 'La combinaison que vous avez entr&eacute; n\'est pas bonne.';
        }
    } else {
        $form = true;
    }
    if ($form) {
        if (isset($message)) {
            echo '<div class="message">' . $message . '</div>';
        }
        ?>
        <div class="content">
            <form action="connexion.php" method="post">
                <h1>Connexion</h1><br/>
                <div class="center">
                    <label for="username">Nom d'utilisateur</label><input type="text" name="username" id="username"
                                                                          value="<?php echo htmlentities($ousername, ENT_QUOTES, 'UTF-8'); ?>"/><br/><br/>
                    <label for="password">Mot de passe</label><input type="password" name="password"
                                                                     id="password"/><br/><br/>
                    <input type="submit" value="Connection"/>
                </div>
            </form>
        </div>
        <?php
    }
}
?>
<body>
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