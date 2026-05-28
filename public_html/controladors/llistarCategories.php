<?php
    require_once __DIR__."/../models/connectaBD.php";
    require_once __DIR__."/../models/consultaCategories.php";
    $connexio = connectaBD();
    $categories = getCategories($connexio);
    require_once __DIR__."/../vistes/mostraCategories.php";
    pg_close($connexio);
?>