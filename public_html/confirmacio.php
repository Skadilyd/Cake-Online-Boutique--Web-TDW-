<?php 
    if ($_GET["type"] == "reg") {
        require_once __DIR__ . "/controladors/entraNouUsuari.php";
    }
    else if ($_GET["type"] == "login") {
        require_once __DIR__ . "/controladors/iniciSessio.php";
    }
    else if ($_GET["type"] == "logout") {
        require_once __DIR__ . "/controladors/tancaSessio.php";
    }
    else if ($_GET["type"] == "purchase") {
        require_once __DIR__ . "/controladors/confirmaCompra.php";
    }
    else if ($_GET["type"] == "empty") {
        require_once __DIR__ . "/controladors/buidaCarro.php";
    }
    else if ($_GET["type"] == "moduser") {
        require_once __DIR__ . "/controladors/modificaDadesUsuari.php";
    }
?>