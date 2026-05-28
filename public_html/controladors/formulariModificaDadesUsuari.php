<?php 
    require_once __DIR__ . "/../models/connectaBD.php";
    $connexio = connectaBD();
    include_once __DIR__ . "/../models/consultaDadesUsuari.php";
    include_once __DIR__ . "/../vistes/mostraFormulariDadesUsuari.php";
    pg_close($connexio); 
?>