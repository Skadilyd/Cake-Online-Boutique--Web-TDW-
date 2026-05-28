<?php

if ($_SESSION[$_COOKIE["cake_idUsuari"]] != -1) {
    

    //$idUsuari = $_SESSION[$_COOKIE["cake_idUsuari"]];
    $idUsuari = $_SESSION[$_COOKIE["PHPSESSID"]];
    $comanda= "SELECT id_comanda FROM comanda WHERE id_usuari=" . strval($idUsuari) . " AND es_carro='true';";
    $comanda= pg_fetch_all(pg_query($connexio,  $comanda))[0]["id_comanda"];
    $buidaCarro= "DELETE FROM element_comanda WHERE id_comanda=" . strval($comanda) . ";";
    $buidaCarro = pg_query($connexio, $buidaCarro);
    $aux = pg_query($connexio, "UPDATE comanda SET preu_total=0, n_productes=0 WHERE id_comanda=" . $comanda . ";");

}

?>