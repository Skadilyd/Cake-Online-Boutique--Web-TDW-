<?php
    require_once __DIR__ . "/../vistes/mostraText.php";
    if ($_SESSION[$_COOKIE["PHPSESSID"]] != "-1") {
        require_once __DIR__ . "/../models/connectaBD.php";
        $connexio = connectaBD();
        include_once __DIR__ . "/../models/confirmaCompra.php";
        echoText("Purchase confirmed! Btw no refunds");
        pg_close($connexio);
    }
    else {
        echoText("Please, log in first");
    }
?>