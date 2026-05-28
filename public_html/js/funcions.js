"use strict";
function carregaPaginaCategoria(id) {
    location.href = "index.php?page=category&id=" + id;
}

async function mesInformacioProducte(id) {
    document.getElementById(id).removeChild(document.getElementById("botoMesInformacio" + id));
    let promesa = await fetch("controladors/mesInformacioProducte.php?id=" + id);
    let resposta = await promesa.text();
    document.getElementById(id.toString() + "mesInformacio").innerHTML = resposta;
    document.getElementById(id.toString() + "mesInformacio").style.display = "inline";
    document.getElementById(id.toString() + "mesInformacio").style.maxWidth= "320px";
}

async function consultaComanda(id) {
    document.getElementById(id).removeChild(document.getElementById("botoMesInformacio" + id));
    let promesa = await fetch("controladors/productesComanda.php?id=" + id);
    let resposta = await promesa.text();
    document.getElementById(id).innerHTML = document.getElementById(id).innerHTML + resposta;
}

async function productesCategoria(id) {
    let promesa = await fetch("controladors/llistarProductes.php?id=" + id);
    let resposta = await promesa.text();
    document.getElementById("elementDinamic").innerHTML = resposta;
}

async function headerPagina(){
    let promesa = await fetch("controladors/llistarCategories.php?id=" + id);
    let resposta = await promesa.text();
    document.getElementById("elementDinamic").innerHTML = resposta;
}

async function buscaProductes(id){
    let promesa = await fetch ("controladors/llistarProductes.php?id=" + id);
    let resposta = await promesa.text();
    document.getElementById("elementDinamic").innerHTML = resposta;
}

async function eliminaProducteCarro(id){
    let promesa = await fetch("controladors/eliminaProducteCarro.php?idproducte=" + id);
    let resposta = await promesa.text();
    if (resposta == "ok") {
        document.getElementById("productesCarro").removeChild(document.getElementById(id));
        if (document.getElementById("productesCarro").childElementCount == 2) {
            document.getElementById("productesCarro").innerHTML = "<p>No products</p>";
        }
        let promesa2 = await fetch("controladors/carroCompra.php");
        let resposta2 = await promesa2.text();
        document.getElementById("infoCarro").innerHTML = resposta2;
    }
    else {
        alert("Item could not be deleted srry :(");
    }
}

async function EditaNombreProductes(id){
    let newVal = document.getElementById(id + "value").value;
    let controlador = "controladors/editaNombreProducteCarro.php?idproducte=" + id + "&newval=" + newVal;
    if(newVal == "0") {
        controlador = "controladors/eliminaProducteCarro.php?idproducte=" + id;
    }
    let promesa = await fetch(controlador);
    let resposta = await promesa.text();
    if (resposta == "ok") {
        if (document.getElementById(id + "value").value == "0") {
            document.getElementById("productesCarro").removeChild(document.getElementById(id));
            if (document.getElementById("productesCarro").childElementCount == 2) {
                document.getElementById("productesCarro").innerHTML = "<p>No products</p>";
            }
        }
        else {
            let oldQuantity = parseInt(document.getElementById(id + "quantity").innerHTML);
            document.getElementById(id + "quantity").innerHTML = newVal;
            let oldPrice = parseFloat(document.getElementById(id + "price").innerHTML)
            document.getElementById(id + "price").innerHTML = (oldPrice / oldQuantity * newVal).toFixed(2) + "€";
        }
        let promesa2 = await fetch("controladors/carroCompra.php");
        let resposta2 = await promesa2.text();
        document.getElementById("infoCarro").innerHTML = resposta2;
    }
    else {
        alert("Item could not be updated srry :(");
    }
}

async function buscaProductesBuscador() {
    let text = document.getElementById("buscadorText").value;
    let promesa = await fetch("controladors/buscaProductes.php?text=" + text);
    let resposta = await promesa.text();
    document.getElementById("elementDinamic").innerHTML = resposta;
}

async function entraNouUsuari(){
    document.getElementById("confirmacioRegistre").innerHTML = "a";
    var entrada = new FormData();
    entrada.append("nomusuari", document.getElementById("nomusuari").value);
    entrada.append("correu", document.getElementById("correu").value);
    entrada.append("contrasenya", document.getElementById("contrasenya").value);
    entrada.append("adreca", document.getElementById("adreca").value);
    entrada.append("poblacio", document.getElementById("poblacio").value);
    entrada.append("codipostal", document.getElementById("codipostal").value);
    var promesa = await fetch("controladors/entraNouUsuari.php", {method: 'POST', body: entrada});
    var resposta = await promesa.text();
    document.getElementById("confirmacioRegistre").innerHTML = resposta;
}


function mostraMenuUsuari() {
    if (document.getElementById("menuUsuari").style.display == "none") {
        document.getElementById("menuUsuari").style.display = "block";
    }
    else {
        document.getElementById("menuUsuari").style.display = "none";
    }
}

async function comprovaRegistre(){
    var entrada = new FormData();
    entrada.append("nomusuari", document.getElementById("nomusuari").value);
    entrada.append("correu", document.getElementById("correu").value);
    entrada.append("contrasenya", document.getElementById("contrasenya").value);
    entrada.append("adreca", document.getElementById("adreca").value);
    entrada.append("poblacio", document.getElementById("poblacio").value);
    entrada.append("codipostal", document.getElementById("codipostal").value);
    var promesa = await fetch("controladors/entraNouUsuari.php");
    var resposta = await promesa.text();
    alert(resposta);
    return false;
}

async function afegeixCarro(id, nProductes){
    let promesa= await fetch ("controladors/afegeixCarro.php?id=" + id + "&nProductes=" + nProductes);
    let resposta= await promesa.text();
    if (resposta != document.getElementById("infoCarro").innerHTML){
        document.getElementById("infoCarro").innerHTML = resposta;
        alert("Product added successfully :)");
    }
    else {
        alert("Womp womp :(");
    }
}

$(document).ready(function(){
    $("#botoCompte").click(function(){
        mostraMenuUsuari();
    });
});