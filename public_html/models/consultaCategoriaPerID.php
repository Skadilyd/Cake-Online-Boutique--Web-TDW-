<?php
    function getCategoriaPerID($connexio, $id){
        $query = pg_prepare($connexio, "sql", "SELECT nom FROM Categoria WHERE id_categoria=$1;");
        $query = pg_execute($connexio, "sql", array($id));
        $queryArray = pg_fetch_all($query);
        return $queryArray[0]["nom"];
    }
?>