<?php
    $imatge=pg_fetch_all(pg_query($connexio, "SELECT foto FROM usuari WHERE id_usuari=" . $_SESSION[$_COOKIE["PHPSESSID"]] . ";"))[0]["foto"];
?>