<?php
    require_once __DIR__ . "/../vistes/mostraText.php";
    require_once __DIR__ . "/../models/connectaBD.php";
    $connexio = connectaBD();
    require_once __DIR__ . "/../models/eliminaElementsCarro.php";
    pg_close($connexio);
    echoText("Erased.")
?>