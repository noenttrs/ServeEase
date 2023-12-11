<?php

if(!isset($_SESSION["client"]) || $_SESSION['client']["CLIENT_ROLE"] === 0) {
    header("Location: /");
}

$pathCss = "css/main.css";
require VIEWS . "base/header.php";
?>

<!-- création d'un produit -->
<form action="/createProduct" method="post">
    <div>
        <label for="productName"></label>
        <input type="text" name="productName" id="productName" placeholder="Nom du produit">
    </div>
    <label for="productDescription"></label>
    <input type="text" name="productDescription" id="productDescription" placeholder="Description du produit">
    <label for="productPrice"></label>
    <input type="number" name="productPrice" id="productPrice" placeholder="Prix du produit">
    <label for="productStock"></label>
    <input type="number" name="productStock" id="productStock" placeholder="Stock du produit">

    <input type="submit" value="Créer le produit">
</form>

<!-- création d'un menu -->


<!-- surveillance des commandes -->


<!-- surveillance des clients -->


<!-- pannel cuisine -->


<?php require VIEWS . "base/footer.php"; ?> 