<div style="grid-area:llistaProductes;" class="itemList">
    <?php foreach($productes as $producte){ ?>
        <div class="productItem"> 
            <img id="imatge" src=<?php echo htmlentities($producte[0], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?> width="320px"/>
            <h4 id="titol" style="width:320px;"><?php echo htmlentities($producte[1], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></h4>
            <p id="subtitol" style="width:320px;"><?php echo htmlentities($producte[2], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></p>
            <p id="descripcio" style="width:320px;"><?php echo htmlentities(number_format($producte[3], 2) . "€", ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></p>
        </div> 
    <?php } ?>
</div>