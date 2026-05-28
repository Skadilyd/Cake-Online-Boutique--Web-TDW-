<section> <!-- llista amb les categories dels articles -->
    <h3>Products</h3>
    <div id="llistaProductes" class="itemList">
        <?php if(sizeof($productes) > 0){
            foreach($productes as $producte){ ?>
                <div id=<?php echo htmlentities($producte["id_producte"], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?> onclick="" class="productItem"> 
                    <img id="imatge" src=<?php echo htmlentities($producte["foto"], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?> width="320px"/>
                    <h4 id="titol" style="width:320px;"><?php echo htmlentities($producte["nom"], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></h4>
                    <p id="subtitol" style="width:320px;"><?php echo htmlentities(number_format(floatval($producte["preu"]), 2) . "€", ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></p>
                    <button id="botoMesInformacio<?php echo htmlentities($producte["id_producte"], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" class="botoMesInformacio" onclick="mesInformacioProducte(<?php echo htmlentities($producte['id_producte'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>)">Més informació</button>
                    <div id="<?php echo htmlentities($producte["id_producte"] . 'mesInformacio', ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" style="display:none;"></div>
                </div> 
            <?php } 
        }
        else {
            echo "No products found";
        }?>
    </div>
</section>