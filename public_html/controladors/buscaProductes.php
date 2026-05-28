<?php
    require_once __DIR__ . "/../models/connectaBD.php";
    $connexio = connectaBD();
    require_once __DIR__ . "/../models/buscaProductes.php";
    require_once __DIR__ . "/../vistes/mostraProductes.php";
    pg_close($connexio);