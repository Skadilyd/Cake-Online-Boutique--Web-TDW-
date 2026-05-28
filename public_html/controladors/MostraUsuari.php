<?php 
    require_once __DIR__ . "/../models/connectaBD.php";
    $connexio = connectaBD();
    require_once __DIR__ . "/../models/consultaDadesUsuari.php";
    require_once __DIR__ . "/../vistes/mostraUsuari.php";
    pg_close($connexio);
?>