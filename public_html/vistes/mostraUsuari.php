<section id=mostraInfoUsuari style="grid-area:elementDinamic;">
    <h4 id= "nom"> Name: </h4>
    <h4 id= "nomresp"> <?php echo htmlentities($usuari['nom'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?> </h4>
    <h4 id= "mail"> Electronic adress: </h4>
    <h4 id= "mailresp"> <?php echo htmlentities($usuari['mail'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?> </h4>
    <h4 id= "direccio"> Adress: </h4>
    <h4 id= "direccioresp"> <?php echo htmlentities($usuari['direccio'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?> </h4>
    <h4 id= "poblacio"> City: </h4>
    <h4 id= "poblacioresp"> <?php echo htmlentities($usuari['poblacio'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?> </h4>
    <h4 id= "codipostal"> Zip code: </h4>
    <h4 id= "codipostalresp"> <?php echo htmlentities($usuari['codipostal'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?> </h4>
    <button type="button">
        <a href="index.php?page=modprofile">Edit profile</a>
    </button>
</section>