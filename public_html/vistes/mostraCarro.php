<?php if ($resultat != "-1") { ?>
  <h4 id="sumariCompra">Purchase summary: </h4>
  <h4 id="productNumber" style="width:320px">Product number: <?php echo htmlentities($resultat[0], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></h4>
  <h4 id="preuTotal" style="width:320px">Total price: <?php echo htmlentities(number_format(floatval($resultat[1]), 2) . "€", ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></h4>
<?php }
else { ?>
  <p>Please login &#128511;</p>
<?php } ?>