<?php
    /*
    $text = "'%" . $_GET["text"] . "%'";
    $query = "SELECT id_producte,foto,nom,preu FROM producte WHERE nom ILIKE $1 OR descripcio ILIKE $1;";
    $productes = pg_fetch_all(pg_query_params($connexio, $query, array($text)));
    */
    $query = "SELECT id_producte,foto,nom,preu, descripcio FROM producte;";
    $resultat = pg_fetch_all(pg_query($connexio, $query));
    $productes = array();
    foreach($resultat as $producte) {
        if(str_contains($producte["nom"], $_GET["text"]) || str_contains($producte["descripcio"], $_GET["text"])) {
            $productes[] = $producte;
        }
    }
?>