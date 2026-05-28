<?php 
    $regex_lletresEspais = "/^[a-zA-Z\s]*$/";
    $regex_cincNumeros = "/^[0-9]{5}$/";
    $regex_menysDeTrentaCaracters = "/^.{0,30}$/";
    $returnText = "";
    $username = $_POST["nomusuari"];
    $returnValue = (preg_match($regex_lletresEspais, $username) == 1);
    $correu = $_POST["correu"];
    $comprovaCorreuUnicQuery = "SELECT 'mail' from usuari where mail=$1";
    if (pg_num_rows(pg_query_params($connexio, $comprovaCorreuUnicQuery, array($correu))) == 0) {
        $returnValue = $returnValue && (filter_var($correu, FILTER_VALIDATE_EMAIL));
        $contrasenya = password_hash($_POST["contrasenya"], PASSWORD_DEFAULT);
        $adreca = $_POST["adreca"];
        $returnValue = $returnValue && (preg_match($regex_lletresEspais, $adreca) + preg_match($regex_menysDeTrentaCaracters, $adreca) == 2);
        $poblacio = $_POST["poblacio"];
        $returnValue = $returnValue && (preg_match($regex_lletresEspais, $poblacio) + preg_match($regex_menysDeTrentaCaracters, $poblacio) == 2);
        $codipostal = $_POST["codipostal"];
        $returnValue = $returnValue && (preg_match($regex_cincNumeros, $codipostal) == 1);
        if($returnValue == true) {
            $id = pg_fetch_all(pg_query($connexio, "SELECT id_usuari FROM Usuari ORDER BY id_usuari desc LIMIT 1"));
            $id = intval($id[0]["id_usuari"]) + 1;
            $query = "INSERT INTO usuari(id_usuari, nom, mail, contrasenya, direccio, poblacio, codipostal, foto) VALUES ($1,$2,$3,$4,$5,$6,$7,'img/profile.jpg');";
            //$aux = pg_prepare($connexio, "sql", $query);
            //$aux = pg_execute($connexio, "sql", array(strval($id), $username, $correu, $contrasenya, $adreca, $poblacio, $codipostal));
            $params=array(strval($id), $username, $correu, $contrasenya, $adreca, $poblacio, strval($codipostal));
            $resultat= pg_query_params($connexio,$query,$params);
            $idComanda = pg_fetch_all(pg_query($connexio, "SELECT id_comanda FROM comanda ORDER BY id_comanda DESC LIMIT 1"));
            $idComanda = intval($idComanda[0]["id_comanda"]) + 1;
            $aux = pg_query($connexio, "INSERT INTO comanda(id_comanda, id_usuari, es_carro, data_comanda, preu_total, n_productes) VALUES (" . $idComanda . "," . intval($id) . ", 'true', 0, 0, 0);");
            $returnText = "Registered correctly :)";
        }
        else {
            $returnText = "Womp womp :(";
        }
    }
    else $returnText = "Email already registered sorry :)";
    
?>