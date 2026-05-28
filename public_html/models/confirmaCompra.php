<?php
    $idUsuari = $_SESSION[$_COOKIE["PHPSESSID"]];
    $query1 = "UPDATE comanda SET es_carro='false', data_comanda='" . gmdate("Y/m/d H:m:s", time() + 4500) . "' WHERE id_usuari=" . $idUsuari . " AND es_carro='true';";
    $resultat = pg_query($connexio, $query1);
    $query2 = "SELECT id_comanda FROM comanda ORDER BY id_comanda DESC LIMIT 1;";
    $idNovaComanda = intval(pg_fetch_all(pg_query($connexio, $query2))[0]["id_comanda"]) + 1;
    $query3 = "INSERT INTO comanda (id_comanda, id_usuari, es_carro, data_comanda, preu_total, n_productes) VALUES (" . $idNovaComanda . ", " . $idUsuari . ", 'true', 0, 0, 0);";
    $resultat = pg_query($connexio, $query3);
?>