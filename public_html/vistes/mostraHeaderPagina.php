<header id="headerPagina">
    <h1 id="botoHome"> 
        <a href="index.php">
            <img src="img/Logo.jpg" border="1" style="max-width:100px">
        </a>
        <!-- <a href="index.html">LA MILLOR BOTIGA BOTIGUERA DE BOTIGUES</a> -->
    </h1>
    <h1 id="nomPagina">Cake(?)</h1>
    <div id="buscador">
        <input type="text" id="buscadorText" />
        <button onclick="buscaProductesBuscador();">Search</button>
    </div>
    <div id=botoCompte>
        <img src="<?php echo htmlentities($imatge, ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" alt="buttonpng" border="1" width="100px" />
        <div id="menuUsuari" style="background-color:rgb(231, 201, 214); display:none;">
            <ul>
                <?php if($_SESSION[$_COOKIE["PHPSESSID"]] == -1){ ?>
                    <li><a href="index.php?page=register">Register</a></li>
                    <li><a href="index.php?page=login">Login</a></li>
                <?php } else{ ?>
                    <li><a href="index.php?page=profile">Profile</a></li>
                    <li><a href="index.php?page=cart">Shopping cart</a></li>
                    <li><a href="index.php?page=purchases">Purchases</a></li>
                    <li><a href="index.php?page=confirmation&type=logout">Log Out</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <p id="botoCarro" style="display:none;"> carro de la compra (hehe) </p>
</header>