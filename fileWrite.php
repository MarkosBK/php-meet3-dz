<?php
if (isset($_POST["accept"])) {
    $login = $_POST["login"];
    $email = $_POST["email"];
    if (mb_strlen($email) !== 0 && mb_strlen($login) !== 0) {
        $fd = fopen("accounts.txt", "a+") or die("Error");
        fwrite($fd, $_POST["login"] . '&' . $_POST["email"] . '|');
        fclose($fd);
        header('Location: /FileExample.php');
    }
}