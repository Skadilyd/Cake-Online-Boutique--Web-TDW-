<?php
    $query1 = "SELECT id_comanda FROM comanda WHERE id_usuari=" . $_SESSION[$_COOKIE["PHPSESSID"]] . " AND es_carro=true;";
    $idComanda = pg_fetch_all(pg_query($connexio, $query1))[0]["id_comanda"];
    $query2 = "SELECT id_producte, quantitat, preu_element FROM element_comanda WHERE id_comanda=" . $idComanda . ";";
    $elementsComanda = pg_fetch_all(pg_query($connexio, $query2));
    $productes = array();
    foreach ($elementsComanda as $element) {
        $query3 = "SELECT id_producte, nom, foto FROM producte WHERE id_producte=" . $element["id_producte"] . ";";
        $producte = pg_fetch_all(pg_query($connexio, $query3))[0];
        $producte["quantitat"] = $element["quantitat"];
        $producte["preu"] = $element["preu_element"];
        array_push($productes, $producte);
    }
?>