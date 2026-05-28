<?php 
    session_start();
    require_once __DIR__ . "/../models/connectaBD.php";
    $connexio = connectaBD();
    include_once __DIR__ . "/../models/mostraResumCarro.php";
    $resultat = mostraResumCarro($connexio, $_SESSION[$_COOKIE["PHPSESSID"]]);
    include_once __DIR__ . "/../vistes/mostraCarro.php";
    pg_close($connexio);
?>