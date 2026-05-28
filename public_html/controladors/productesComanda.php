<?php
    require_once __DIR__ . "/../models/connectaBD.php";
    $connexio = connectaBD();
    include_once __DIR__ . "/../models/consultaElementsComanda.php";
    //echo "<p>a</p>";
    include_once __DIR__ . "/../vistes/mostraElementsComanda.php";
    pg_close($connexio);
?>