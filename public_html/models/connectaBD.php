<?php
    function connectaBD(){
        $servidor = "localhost";
        $DBnom = "tdiw-f1";
        $usuari = "tdiw-f1";
        $clau = "yjgEAT4q";
        $port = "5432";
        $connexio = pg_connect("host=$servidor dbname=$DBnom
        user=$usuari password=$clau port=$port") or die("Error connexio DB");
        return($connexio);
    }
?>
