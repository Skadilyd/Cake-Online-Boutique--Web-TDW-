<?php
    $id_usuari = $_SESSION[$_COOKIE["PHPSESSID"]];
    $resultat = "-1";
    if ($id_usuari != "-1") {
        $comandes = pg_fetch_all(pg_query($connexio, "SELECT id_comanda, data_comanda FROM comanda WHERE id_usuari=" . $id_usuari . "AND es_carro='false';"));
        $resultat = array();
        foreach($comandes as $comanda){
            $elementsComanda = pg_fetch_all(pg_query($connexio, "SELECT * FROM element_comanda WHERE id_comanda=" . $comanda["id_comanda"] .  ";"));
            $quantitatTotal = 0;
            $preuTotal = 0;
            foreach ($elementsComanda as $element) {
                $quantitatTotal += intval($element["quantitat"]);
                $preuProducte = pg_fetch_all(pg_query($connexio, "SELECT preu FROM producte WHERE id_producte=" . $element["id_producte"]. ";"))[0]["preu"];
                $preuTotal += floatval($element["quantitat"]) * floatval($preuProducte);
            }
            $resultat[] = array($quantitatTotal, $preuTotal, $comanda["data_comanda"], $comanda["id_comanda"]);
        }
    }
?>