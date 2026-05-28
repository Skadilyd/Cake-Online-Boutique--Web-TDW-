<?php
    function getProductes($connexio, $id){
        $productes = pg_prepare($connexio,"sql","SELECT id_producte,foto,nom,preu FROM producte WHERE id_categoria=$1");
        $productes= pg_execute($connexio, "sql", array($id));
        return pg_fetch_all($productes);
    }
?>