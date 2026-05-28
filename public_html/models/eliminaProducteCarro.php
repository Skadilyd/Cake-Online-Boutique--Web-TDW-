<?php
    $idUsuari = $_SESSION[$_COOKIE["PHPSESSID"]];
    if ($idUsuari != "-1") {
        $query1 = "SELECT id_comanda, n_productes, preu_total FROM comanda WHERE id_usuari=" . $idUsuari . " AND es_carro=true;";
        $comanda = pg_fetch_all(pg_query($connexio, $query1))[0];
        $query2 = "SELECT quantitat,preu_element FROM element_comanda WHERE id_producte=$1 AND id_comanda=" . $comanda["id_comanda"] . ";";
        $elementComanda = pg_fetch_all(pg_query_params($connexio, $query2, array($_GET["idproducte"])))[0];
        $query3 = "UPDATE comanda SET preu_total=" . ($comanda["preu_total"] - $elementComanda["preu_element"]) . ", n_productes=" . ($comanda["n_productes"] - $elementComanda["quantitat"]) . " WHERE id_comanda=" . $comanda["id_comanda"] . ";";
        $resultat = pg_query($connexio, $query3);
        $query4 = "DELETE FROM element_comanda WHERE id_producte=$1 AND id_comanda=" . $comanda["id_comanda"] . ";";
        $resultat = pg_query_params($connexio, $query4, array($_GET["idproducte"]));
        $resposta = "ok";
    }
?>