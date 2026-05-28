<form id="elementDinamic" action="index.php?page=confirmation&type=reg" method="post">
    <label for="nomusuari">Full name:</label><br />
    <input type="text" id="nomusuari" name="nomusuari" pattern="^[a-zA-Z\s]*$" required /><br /> <!-- Nomes pot tenir lletres i espais -->
    <label for="correu">E-mail:</label><br />
    <input type="email" id="correu" name="correu" required /><br />
    <label for="contrasenya">Password:</label><br />
    <input type="password" id="contrasenya" name="contrasenya" required /><br />
    <label for="adreca">Address:</label><br />
    <input type="text" id="adreca" name="adreca" maxlength="30" pattern="^[a-zA-Z\s]*$" required /><br />
    <label for="poblacio">City:</label><br />
    <input type="text" id="poblacio" name="poblacio" maxlength="30" pattern="^[a-zA-Z\s]*$" required /><br />
    <label for="codipostal">Postal code:</label><br />
    <input type="text" id="codipostal" name="codipostal" pattern="^[0-9]{5}$" required /><br /><br />
    <input type="submit" value="Register" />
</form>