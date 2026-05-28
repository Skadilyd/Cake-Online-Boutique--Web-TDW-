<?php   
    require_once __DIR__ . "/../models/connectaBD.php";
    $connexio = connectaBD();
    require_once __DIR__ . "/../models/entraDadesNouUsuari.php";
    require_once __DIR__ . "/../vistes/mostraText.php";
    echoText($returnText);
    pg_close($connexio);
?>