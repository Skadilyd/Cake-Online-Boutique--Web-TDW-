
<div id="elementDinamic" style="grid-area:elementDinamic">
    <?php
        if ($resultat != "-1") { ?>
            <?php if(sizeof($resultat) == 0) {?>
                <p>No purchases, stop looking and go get something now &#128511;</p>
            <?php }
            else {
                foreach($resultat as $comanda){ ?>
                    <div class="purchase" id="<?php echo htmlentities($comanda[3], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>">
                        <h4 style="grid-area:date; text-align:left;">Date: <?php echo htmlentities($comanda[2], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></h4>
                        <h4 style="grid-area:product_number text-align:left;">Product number: <?php echo htmlentities($comanda[0], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></h4>
                        <h4 style="grid-area:preu_total text-align:left;">Total price: <?php echo htmlentities(number_format($comanda[1], 2) . "€", ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></h4>
                        <button id="botoMesInformacio<?php echo htmlentities($comanda[3], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" style="grid-area:more_info" onclick="consultaComanda(<?php echo htmlentities($comanda[3], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>)">Details</button>
                    </div>
                <?php }
            }
        }
        else { ?>
            <p>No purchases, stop looking and go get something now &#128511;</p>
        <?php } 
    ?>
</div>
