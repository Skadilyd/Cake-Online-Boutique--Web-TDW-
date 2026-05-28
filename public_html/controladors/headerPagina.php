<?php 
    $imatge = "img/profile.jpg";
    if ($_SESSION[$_COOKIE["PHPSESSID"]] != "-1") {
        require_once __DIR__ . "/../models/connectaBD.php";
        $connexio = connectaBD();
        require_once __DIR__ . "/../models/consultaFotoUsuari.php";
        pg_close($connexio);
    }
    require_once __DIR__."/../vistes/mostraHeaderPagina.php"; 
?>