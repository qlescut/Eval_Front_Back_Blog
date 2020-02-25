<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
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
if (isset($_POST['username'], $_POST['password'], $_POST['passverif'], $_POST['email']) and $_POST['username'] != '') {
    if (get_magic_quotes_gpc()) {
        $_POST['username'] = stripslashes($_POST['username']);
        $_POST['password'] = stripslashes($_POST['password']);
        $_POST['passverif'] = stripslashes($_POST['passverif']);
        $_POST['email'] = stripslashes($_POST['email']);
    }
    if ($_POST['password'] == $_POST['passverif']) {
        if (strlen($_POST['password']) >= 6) {
            if (preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i', $_POST['email'])) {
                $username = $mysqli->real_escape_string($_POST['username']);
                $password = $mysqli->real_escape_string($_POST['password']);
                $email = $mysqli->real_escape_string($_POST['email']);
                $dn = mysqli_num_rows($mysqli->query('select id from users where username="' . $username . '"'));
                if ($dn == 0) {
                    $dn2 = mysqli_num_rows($mysqli->query('select id from users'));
                    $id = $dn2 + 1;
                    if ($mysqli->query('insert into users(id, username, password, email) values (' . $id . ', "' . $username . '", "' . $password . '", "' . $email . '")')) {
                        $form = false;
                        ?>
                        <div class="message">Vous avez bien &eacute;t&eacute; inscrit. Vous pouvez dor&eacute;navant
                            vous connecter.<br/>
                            <a href="connexion.php">Se connecter</a></div>
                        <?php
                    } else {
                        $form = true;
                        $message = 'Une erreur est survenue lors de l\'inscription.';
                    }
                } else {
                    $form = true;
                    $message = 'Un autre utilisateur utilise d&eacute;j&agrave; le nom d\'utilisateur que vous d&eacute;sirez utiliser.';
                }
            } else {
                $form = true;
                $message = 'L\'email que vous avez entr&eacute; n\'est pas valide.';
            }
        } else {
            $form = true;
            $message = 'Le mot de passe que vous avez entr&eacute; contien moins de 6 caract&egrave;res.';
        }
    } else {
        $form = true;
        $message = 'Les mots de passe que vous avez entr&eacute; ne sont pas identiques.';
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
        <form action="sign_up.php" method="post">
            <h1>Inscription</h1><br/>
            <div class="center">
                <label for="username">Nom d'utilisateur</label><input type="text" name="username"
                                                                      value="<?php if (isset($_POST['username'])) {
                                                                          echo htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
                                                                      } ?>"/><br/><br/>
                <label for="password">Mot de passe<span class="small">(6 caract&egrave;res min.)</span></label><input
                        type="password" name="password"/><br/><br/>
                <label for="passverif">Mot de passe<span class="small">(v&eacute;rification)</span></label><input
                        type="password" name="passverif"/><br/><br/>
                <label for="email">Email</label><input type="text" name="email"
                                                       value="<?php if (isset($_POST['email'])) {
                                                           echo htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
                                                       } ?>"/><br/><br/>
                <input type="submit" value="Envoyer"/>
            </div>
        </form>
    </div>
    <?php
}
?>
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