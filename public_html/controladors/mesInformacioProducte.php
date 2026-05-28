<?php
    session_start();
    require_once __DIR__."/../models/connectaBD.php";
    require_once __DIR__."/../models/consultaDescripcioProducte.php";
    $connexio = connectaBD();
    $descripcio = getDescripcio($connexio, $_GET["id"]);
    require_once __DIR__."/../vistes/mostraText.php";
    echoText($descripcio);
    if ($_SESSION[$_COOKIE["PHPSESSID"]] != "-1"){
        require_once __DIR__."/../vistes/mostraElementAfegirCarro.php";
    }
    pg_close($connexio);
?>