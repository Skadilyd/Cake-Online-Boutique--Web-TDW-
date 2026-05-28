<?php
    session_start();
    require_once __DIR__ . "/../models/connectaBD.php";
    $connexio = connectaBD();
    $resposta = "not ok";
    require_once __DIR__ . "/../models/eliminaProducteCarro.php";
    echo $resposta;
    pg_close($connexio);
?>