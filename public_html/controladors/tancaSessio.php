<?php
    $_SESSION[$_COOKIE["PHPSESSID"]] = -1;
    include_once __DIR__ . "/../vistes/mostraText.php";
    echoText("Logged out successfully :)");
?>