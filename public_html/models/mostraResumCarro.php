<?php
    function mostraResumCarro($connexio, $id_usuari) {
        if ($id_usuari != "-1") {
            $comanda = pg_fetch_all(pg_query($connexio, "SELECT id_comanda,preu_total,n_productes FROM comanda WHERE id_usuari=" . $id_usuari . "AND es_carro='true';"))[0];
            $elementsComanda = pg_fetch_all(pg_query($connexio, "SELECT * FROM element_comanda WHERE id_comanda=" . $comanda["id_comanda"] .  "ORDER BY id_element_comanda DESC;"));
            //$resultat = pg_fetch_all(pg_query($connexio, "SELECT preu_total,n_productes FROM comanda WHERE id_comanda=" . $id_comanda . ";"));
            $resultat = array($comanda["n_productes"], $comanda["preu_total"]);
            return $resultat;
        }
        else {
            return "-1";
        }
    }
?>