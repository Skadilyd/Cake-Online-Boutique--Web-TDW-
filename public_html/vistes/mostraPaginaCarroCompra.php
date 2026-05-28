<section id="elementDinamic">
    <h3>Shopping cart ittems</h3>
    <div id="productesCarro" class="itemList">
        <?php if(sizeof($productes) > 0){
            foreach($productes as $producte) { ?>
                <div id="<?php echo htmlentities($producte['id_producte'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" class="itemCarro">
                    <img style="grid-area:imatge" src="<?php echo htmlentities($producte["foto"], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" width="320px"/>
                    <h4 style="grid-area:nom" ><?php echo htmlentities($producte["nom"], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></h4>
                    <h4 id="<?php echo htmlentities($producte['id_producte'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>quantity" style="grid-area:quantitat"><?php echo htmlentities($producte["quantitat"], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>
                    <h4 id="<?php echo htmlentities($producte['id_producte'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>price" style="grid-area:preu" style="width:320px;"><?php echo htmlentities(number_format(floatval($producte["preu"]), 2) . "€", ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></h4>
                    <div id="edit">
                        <button style="height:100px;width:100%;display:none;" onclick="eliminaProducteCarro(<?php echo htmlentities($producte['id_producte'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>);">Delete</button>
                        <input id="<?php echo htmlentities($producte['id_producte'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>value"type="number" value="<?php echo htmlentities($producte['quantitat'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" min="0"/>
                        <button onclick="EditaNombreProductes(<?php echo htmlentities($producte['id_producte'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>);">Edit</button>
                    </div>
                </div>
            <?php } ?>
            <form action="index.php?page=confirmation&type=purchase" method="post">
                <input type="submit" value="Confirm purchase">
            </form>
            <form action="index.php?page=confirmation&type=empty" method="post">
                <input type="submit" value="Cancel purchase">
            </form>
        <?php }
        else { ?>
            <p>No products</p>
        <?php } ?>
    </div>
</section>