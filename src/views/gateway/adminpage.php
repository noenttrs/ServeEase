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
    <div>
        <label for="productDescription"></label>
        <input type="text" name="productDescription" id="productDescription" placeholder="Description du produit">
    </div>
    <div>
        <label for="productPrice"></label>
        <input type="number" name="productPrice" id="productPrice" placeholder="Prix du produit">
    </div>
    <div>
        <label for="productImage"></label>
        <input type="file" accept="image/*" name="productImage" id="productImage" placeholder="Image du produit">
    </div>

    <input type="submit" value="Créer le produit">
</form>

<!-- création d'un menu -->
<form action="/createMenu" method="post">
    <div>
        <label for="menuName"></label>
        <input type="text" name="menuName" id="menuName" placeholder="Nom du menu">
    </div>
    <div>
        <label for="menuDescription"></label>
        <input type="text" name="menuDescription" id="menuDescription" placeholder="Description du menu">
    </div>
    <div>
        <label for="menuPrice"></label>
        <input type="number" name="menuPrice" id="menuPrice" placeholder="Prix du menu">
    </div>
    <div>
        <label for="menuImage"></label>
        <input type="file" accept="image/*" name="menuImage" id="menuImage" placeholder="Image du menu">
    </div>

    <input type="submit" value="Créer le menu">
</form>


<!-- surveillance des commandes -- recherche des commandes -->

<form action="/admin" method="post">
    <div>
        <label for="orderSearch"></label>
        <input type="text" name="orderSearch" id="orderSearch" placeholder="Rechercher une commande">
    </div>

    <input type="submit" value="Rechercher">
</form>


<!-- surveillance des clients -- recherche de clients -->

<form action="/admin" method="post">
    <div>
        <label for="clientSearch"></label>
        <input type="text" name="clientSearch" id="clientSearch" placeholder="Rechercher un client">
    </div>

    <input type="submit" value="Rechercher">
</form>




<!-- pannel cuisine -- redirect to the kitchen's panel -->
<a href="/kitchen">Pannel cuisine</a>



<?php require VIEWS . "base/footer.php"; ?> 