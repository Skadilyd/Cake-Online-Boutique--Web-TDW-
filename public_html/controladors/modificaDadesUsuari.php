<?php   
    require_once __DIR__ . "/../models/connectaBD.php";
    $connexio = connectaBD();
    $returnText = "ok";
    if (isset($_FILES['profile_picture']) && !empty($_FILES['profile_picture'])) {
        require_once __DIR__ . "/../models/modificaFotoUsuari.php";
    }
    if ($returnText == "ok") {
        require_once __DIR__ . "/../models/ModificaDadesUsuari.php";
    }
    require_once __DIR__ . "/../vistes/mostraText.php";
    echoText($returnText);
    pg_close($connexio);
?>