<?php
    if ($_SESSION[$_COOKIE["PHPSESSID"]] != -1) {
    
        //$idUsuari = $_SESSION[$_COOKIE["cake_idUsuari"]];
        $idUsuari = $_SESSION[$_COOKIE["PHPSESSID"]];
        $idComanda = "SELECT id_comanda, preu_total FROM comanda WHERE id_usuari=" . strval($idUsuari) . " AND es_carro='true';";
        $idComanda = pg_query($connexio, $idComanda);
        $idComanda = pg_fetch_all($idComanda);
        $preuComanda = $idComanda[0]["preu_total"];
        $idComanda = $idComanda[0]["id_comanda"];
        $queryIdElementComanda = "SELECT id_element_comanda FROM element_comanda WHERE id_comanda = " . $idComanda . " AND id_producte= $1;";
        $preuProducte=pg_fetch_all(pg_query_params($connexio, "SELECT preu FROM producte WHERE id_producte=$1", array($_GET["id"])))[0]["preu"];
        $idElementComanda = pg_query_params($connexio, $queryIdElementComanda, array($_GET["id"]));
        $nProductesAAfegir = max(intval($_GET["nProductes"]), 0);
        if (pg_num_rows($idElementComanda) == 0) {
            $idElementComanda = pg_fetch_all(pg_query($connexio, "SELECT id_element_comanda FROM element_comanda ORDER BY id_element_comanda DESC LIMIT 1"));
            $idElementComanda = intval($idElementComanda[0]["id_element_comanda"]) + 1;
            $queryElementComanda = "INSERT INTO element_comanda(id_element_comanda, id_comanda, id_producte, quantitat, preu_element) VALUES (" . $idElementComanda . "," . $idComanda . ", $1, $2, " . $preuProducte . ");";
            $elementComanda = pg_query_params($connexio, $queryElementComanda, array($_GET["id"], $_GET["nProductes"]));
        }
        else {
            $nProductes = intval(pg_fetch_all(pg_query($connexio, "SELECT quantitat FROM element_comanda WHERE id_element_comanda=" . pg_fetch_all($idElementComanda)[0]["id_element_comanda"] . ";"))[0]["quantitat"]);
            $nProductes += $nProductesAAfegir;
            $query = "UPDATE element_comanda SET quantitat=" . $nProductes . ",preu_element=" . ($preuProducte * $nProductes) . " WHERE id_element_comanda=" . pg_fetch_all($idElementComanda)[0]["id_element_comanda"] . ";";
            $ElementComanda = pg_query($connexio, $query);
        }
        $nProductes = pg_fetch_all(pg_query($connexio, "SELECT n_productes FROM comanda WHERE id_usuari=" . strval($idUsuari) . " AND es_carro='true';"))[0]["n_productes"];
        $aux = pg_query($connexio, "UPDATE comanda SET preu_total=" . ($preuComanda + ($preuProducte * $nProductesAAfegir)) . ", n_productes=" . ($nProductes + $nProductesAAfegir) . " WHERE id_usuari=" . strval($idUsuari) . " AND es_carro='true';");
        $resultat = 1;
    }
?>