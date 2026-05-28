<?php
    function comprovaIniciSessio($connexio, $correu, $contrasenya){
        $query = "SELECT id_usuari,contrasenya FROM usuari WHERE mail=$1";
        $resultat = pg_query_params($connexio, $query, array($correu));
        $id = pg_fetch_all($resultat);
        if(pg_num_rows($resultat) != 0){
            if(password_verify($contrasenya,$id[0]["contrasenya"])){
                return intval($id[0]["id_usuari"]);
            }
            else{
                return -2;
            }
        }
        else{
            return -1;
        }
    }
?>