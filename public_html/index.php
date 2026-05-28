<?php 
    session_start(); 
    /*
    if(!isset($_COOKIE['cake_idUsuari'])){
        $cookie_name = 'cake_idUsuari';
        $cookie_value = 0;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        $_SESSION[strval($cookie_value)] = -1;
        echo $_SESSION[strval($cookie_value)];
    }
    */

    if (!isset($_SESSION[$_COOKIE["PHPSESSID"]])) {
        $_SESSION[$_COOKIE["PHPSESSID"]] = -1;
    }

    $filesAbsolutePath = '/home/TDIW/tdiw-f1/public_html/img/uploadedFiles/';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/> 
        <title> Cake(?) </title> 
        <link rel="stylesheet" type="text/css" href="css/maincss.css">
        <script src="js/jquery-3.7.1.js"></script>
        <script src="js/funcions.js"></script>
        <link rel="icon" type="image/x-icon" href="/img/Logo.jpg">
    </head>
    <body>
        <div id="layoutPaginaPrincipal">

            <?php
                if (isset($_GET["page"])){
                    if ($_GET["page"] == "profile"){
                        require_once "mostraUsuari.php"; 
                    }
                    else if ($_GET["page"] == "modprofile") {
                        require_once "modificarDadesUsuari.php";
                    }
                    else if ($_GET["page"] == "register"){
                        require_once "registre.php"; 
                    }
                    else if ($_GET["page"] == "login"){
                        require_once "iniciSessio.php"; 
                    }
                    else if ($_GET["page"] == "confirmation"){
                        require_once "confirmacio.php"; 
                    }
                    else if ($_GET["page"] == "cart"){
                        require_once "carro-compra.php";
                    }
                    else if ($_GET["page"] == "purchases"){
                        require_once "comandesRealitzades.php";
                    }
                }
                else {
                    require_once "paginaPrincipal.php"; 
                }
            ?>
            <?php include_once __DIR__ . "/controladors/headerPagina.php"; ?>
            <aside id="infoCarro"><?php include_once __DIR__ . "/controladors/carroCompra.php"; ?></aside>
            <?php include_once __DIR__ . "/controladors/footerPagina.php"; ?>
        </div>
    </body>
</html>