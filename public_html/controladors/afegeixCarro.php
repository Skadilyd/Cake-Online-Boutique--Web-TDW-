<?php
    session_start();
    require_once __DIR__ . "/../models/connectaBD.php";
    $connexio = connectaBD();
    $resultat = 0;
    require_once __DIR__ . "/../models/afegeixProducteCarro.php";
    require_once __DIR__ . "/carroCompra.php";
    pg_close($connexio);
?>