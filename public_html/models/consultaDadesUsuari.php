<?php
    $query = "SELECT nom, mail, direccio, poblacio, codipostal FROM usuari WHERE id_usuari=" . $_SESSION[$_COOKIE["PHPSESSID"]] . ";";
    $usuari = pg_fetch_all(pg_query($connexio, $query))[0];
?>