<?php 
    if ($_SESSION[$_COOKIE["PHPSESSID"]] != "-1") {
        require_once __DIR__ . "/../models/connectaBD.php";
        $connexio = connectaBD();
        include_once __DIR__ . "/../models/consultaElementsCarro.php";
        include_once __DIR__ . "/../vistes/mostraPaginaCarroCompra.php";
        pg_close($connexio);
    }
    else {
        require_once __DIR__ . "/../vistes/mostraText.php";
        echoText("You shouldn't be here >:(");
    }
?>