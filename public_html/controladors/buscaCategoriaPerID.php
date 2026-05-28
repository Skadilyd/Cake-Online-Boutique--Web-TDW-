<?php
    require_once __DIR__."/../models/connectaBD.php";
    require_once __DIR__."/../models/consultaCategoriaPerID.php";
    $connexio = connectaBD();
    $categoria = getCategoriaPerID($connexio, $_GET["id"]);
    require_once __DIR__."/../vistes/mostraText.php";
    echoText($categoria);
    pg_close($connexio);
?>