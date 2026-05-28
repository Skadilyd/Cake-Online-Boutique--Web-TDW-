<?php
    $query1 = "SELECT id_producte,quantitat,preu_element FROM element_comanda WHERE id_comanda=$1;";
    $resultat = pg_fetch_all(pg_query_params($connexio, $query1, array($_GET["id"])));
    $productes = array();
    foreach($resultat as $element) {
        $query2 = "SELECT nom,foto FROM producte WHERE id_producte=" . $element["id_producte"] . ";";
        //echo "<p>" . $query2 . "</p>";
        $producte = pg_fetch_all(pg_query($connexio, $query2))[0];
        $productes[] = array($producte["foto"], $producte["nom"], $element["quantitat"], $element["preu_element"]);
    }
?>