<?php 
    $regex_lletresEspais = "/^[a-zA-Z\s]*$/";
    $regex_cincNumeros = "/^[0-9]{5}$/";
    $regex_menysDeTrentaCaracters = "/^.{0,30}$/";
    $returnText = "";
    $username = $_POST["nomusuari"];
    $returnValue = (preg_match($regex_lletresEspais, $username) == 1);
    $correu = $_POST["correu"];
    $comprovaCorreuUnicQuery = "SELECT mail, id_usuari from usuari where mail=$1;";
    $mateixCorreu = false;
    $resultatQuery = pg_query_params($connexio, $comprovaCorreuUnicQuery, array($correu));
    if (pg_num_rows($resultatQuery) > 0) {
        $correuUsuari = pg_fetch_all($resultatQuery);
        if ($correuUsuari[0]["id_usuari"] == $_SESSION[$_COOKIE["PHPSESSID"]]) {
            $mateixCorreu = true;
        }
    }
    if ((pg_num_rows($resultatQuery) == 0) || $mateixCorreu) {
        $returnValue = $returnValue && (filter_var($correu, FILTER_VALIDATE_EMAIL));
        $contrasenya = password_hash($_POST["contrasenya"], PASSWORD_DEFAULT);
        $adreca = $_POST["adreca"];
        $returnValue = $returnValue && (preg_match($regex_lletresEspais, $adreca) + preg_match($regex_menysDeTrentaCaracters, $adreca) == 2);
        $poblacio = $_POST["poblacio"];
        $returnValue = $returnValue && (preg_match($regex_lletresEspais, $poblacio) + preg_match($regex_menysDeTrentaCaracters, $poblacio) == 2);
        $codipostal = $_POST["codipostal"];
        $returnValue = $returnValue && (preg_match($regex_cincNumeros, $codipostal) == 1);
        if($returnValue == true) {
            $query = "";
            $params = array();
            if ($_POST["contrasenya"] == "") {
                $query = "UPDATE usuari SET nom=$1, mail=$2, direccio=$3, poblacio=$4, codipostal=$5 WHERE id_usuari=" . $_SESSION[$_COOKIE["PHPSESSID"]];
                $params=array($username, $correu, $adreca, $poblacio, strval($codipostal));
            }
            else {
                $query = "UPDATE usuari SET nom=$1, mail=$2, direccio=$3, poblacio=$4, codipostal=$5, contrasenya=$6 WHERE id_usuari=" . $_SESSION[$_COOKIE["PHPSESSID"]];
                $params=array($username, $correu, $adreca, $poblacio, strval($codipostal), $contrasenya);
            }
            $resultat = pg_query_params($connexio,$query,$params);
            $returnText = "Data modified correctly :)";
        }
        else {
            $returnText = "Womp womp :(";
        }
    }
    else $returnText = "Email already registered srry :)";
    
?>