<?php
include('config.php');
if (isset ($_POST['send']) && $_POST['send'] == 'Post') {
    $username = $mysqli->real_escape_string($_POST['username']);
    $message = $mysqli->real_escape_string($_POST['message']);
    $sql = $mysqli->query('insert into tchat(username, message) values("' . $username . '", "' . $message . '")');
    var_dump($username);
}
?>
<form action="response.php?" method="post">
    <table>
        <tr>
            <td>
                <label for="username"></label>
                <input type="text" name="username" value="username"
            </td>
        </tr>
        <tr>
            <td>
                <textarea name="message">message
                </textarea>
            </td>
        </tr>
        <tr>
            <td>
            <td style="align=right">
                <input type="submit" name="send" value="Post">
            </td>
        </tr>
    </table>
</form>
<div>
    <?php
    if (isset($_POST['username'])) echo($_POST['username']);
    ?>
    <br>
    <?php
    if (isset($_POST['message'])) echo($_POST['message']);
    ?>
</div>