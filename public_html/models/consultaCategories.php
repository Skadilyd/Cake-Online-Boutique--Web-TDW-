<?php
    function getCategories($connexio){
        $arrayNul = array();
        $query1 = "SELECT id_categoria,nom FROM Categoria ORDER BY id_categoria ASC;";
        $parellesIdNom = pg_query($connexio, $query1) or die("ERROR QUERY SQL");
        $parellesIdNom = pg_fetch_all($parellesIdNom);
        $imatges = $arrayNul;
        foreach($parellesIdNom as $parella){
            $query2 = "SELECT foto FROM Producte WHERE id_categoria=$1 ORDER BY RANDOM() LIMIT 1;";
            $resultat = pg_prepare($connexio, "sql", $query2);
            $resultat = pg_execute($connexio, "sql", array($parella["id_categoria"])) or die("ERROR QUERY SQL IMATGE");
            $imatge = pg_fetch_all($resultat);
            array_push($imatges, $imatge[0]["foto"]);
        }
        $resultatFinal = $arrayNul;
        for($i = 0; $i < count($imatges); $i++){
            $fila = array("id_categoria" => $parellesIdNom[$i]["id_categoria"], "nom" => $parellesIdNom[$i]["nom"], "foto" => $imatges[$i]);
            array_push($resultatFinal, $fila);
        }
        return $resultatFinal;
    }
?>