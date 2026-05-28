<?php
    require_once __DIR__."/../models/connectaBD.php";
    $connexio = connectaBD();
    $contrasenya= $_POST["contrasenya"];
    $correu= $_POST["correu"];
    require_once __DIR__."/../models/comprovaIniciSessio.php";
    $resultat = comprovaIniciSessio($connexio, $correu, $contrasenya);
    require_once __DIR__ . "/../vistes/mostraText.php";
    if ($resultat >= 0) {
        /*
        $cookie_name = 'cake_idUsuari';
        $cookie_value = rand();
        echo $cookie_value;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        $_SESSION[strval($cookie_value)] = $resultat;
        */
        $_SESSION[$_COOKIE["PHPSESSID"]] = $resultat;
        echoText("Logged in correctly :)");
    }
    else {
        echoText("Please, log in again");
    }
    pg_close($connexio);
?>
