<?php
    function getDescripcio($connexio, $id){
        $consulta = pg_query_params($connexio,"SELECT descripcio FROM Producte WHERE id_producte=$1", array($id));
        $queryArray = pg_fetch_all($consulta);
        return $queryArray[0]["descripcio"];
    }
?>