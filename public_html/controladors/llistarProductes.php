<?php
    require_once __DIR__."/../models/connectaBD.php";
    require_once __DIR__."/../models/consultaProductes.php";
    $connexio = connectaBD();
    $productes = getProductes($connexio, $_GET["id"]);
    require_once __DIR__."/../vistes/mostraProductes.php";
    pg_close($connexio);
?>