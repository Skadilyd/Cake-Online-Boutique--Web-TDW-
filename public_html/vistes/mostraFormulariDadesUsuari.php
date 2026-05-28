<form id="elementDinamic" action="index.php?page=confirmation&type=moduser" method="post"  enctype="multipart/form-data">
    <label for="nomusuari">Full name:</label><br />
    <input type="text" id="nomusuari" name="nomusuari" value="<?php echo htmlentities($usuari['nom'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" pattern="^[a-zA-Z\s]*$" required /><br /> <!-- Nomes pot tenir lletres i espais -->
    <label for="correu">E-mail:</label><br />
    <input type="email" id="correu" name="correu" value="<?php echo htmlentities($usuari['mail'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" required /><br />
    <label for="contrasenya">Password:</label><br />
    <input type="password" id="contrasenya" name="contrasenya" /><br />
    <label for="adreca">Address:</label><br />
    <input type="text" id="adreca" name="adreca" value="<?php echo htmlentities($usuari['direccio'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" maxlength="30" pattern="^[a-zA-Z\s]*$" required /><br />
    <label for="poblacio">City:</label><br />
    <input type="text" id="poblacio" name="poblacio" value="<?php echo htmlentities($usuari['poblacio'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" maxlength="30" pattern="^[a-zA-Z\s]*$" required /><br />
    <label for="codipostal">Postal code:</label><br />
    <input type="text" id="codipostal" name="codipostal" value="<?php echo htmlentities($usuari['codipostal'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>" pattern="^[0-9]{5}$" required /><br /><br />
    <label for="profile_picture">Profile picture (Must be smaller than 8kB):</label><br />
    <input type="file" name="profile_picture" /><br /><br />
    <input type="submit" value="Update" />
</form>