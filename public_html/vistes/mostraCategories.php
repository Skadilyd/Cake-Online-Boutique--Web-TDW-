<div id="elementDinamic" style="grid-area: elementDinamic">
    <article id="introWeb"> <!-- Introducció  de la pàgina web -->
        <p>
            Have you ever thought "Man, I wonder what a pinecone would taste like if it were a cake"? Perhaps "What if you could eat a cooking book and see what it tastes like?"? Well, we at Cake(?) are here to answer such deep, transcendental questions! At Cake(?), we sell cakes shaped like regular objects, so realistic it could fool the sharpest of eyes, and at a reasonable price! So what are you waiting for, come and order a cake, and enjoy the best purchase of your life!
        </p>
    </article>

    <section id="seccioCategories"> <!-- llista amb les categories dels articles -->
        <h3>Categories</h3>
        <div class="itemList" id="llistaProductes">
            <?php foreach($categories as $categoria){ ?>
                <button type="button" id=<?php echo htmlentities($categoria["id_categoria"], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?> onclick="productesCategoria(this.id);" >
                    <div class="item" name="item" id=<?php echo htmlentities($$categoria["id_categoria"], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?> > 
                        <img id="imatge" src=<?php echo htmlentities($categoria["foto"], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?> width="320px" />
                        <h4 id="titol"><?php echo htmlentities($categoria["nom"], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?></h4>
                    </div> 
                </button>
            <?php } ?>
        </div>
    </section>
</div>

