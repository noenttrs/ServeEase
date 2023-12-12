<?php

if (!isset($_SESSION["client"]) || $_SESSION['client']["CLIENT_ROLE"] === 0) {
    header("Location: /");
}

$pathCss = "css/admin/home.css";
require VIEWS . "base/header.php";
?>

<main>
    <section class="body__main__createProductAndMenu">
        <section class="body__main__createProductAndMenu__createProduct">
            <h2 class="body__main__createProductAndMenu__createProduct__h2">Créer un produit</h2>
            <form action="/createProduct" class="body__main__createProductAndMenu__createProduct__form">
                <div class="body__main__createProductAndMenu__createProduct__form__productName autoInputText">
                    <input type="text" name="productName" id="productNameId" placeholder=" " required>
                    <label for="productNameId">Nom du produit</label>
                </div>
                <div class="body__main__createProductAndMenu__createProduct__form__productDescription autoInputTextarea">
                    <textarea name="productDescription" id="productDescriptionId" cols="30" rows="10" placeholder=" " required></textarea>
                    <label for="productDescriptionId">Description du produit</label>
                </div>
                <div class="body__main__createProductAndMenu__createProduct__form__productPrice autoInputText">
                    <input type="number" name="productPrice" id="productPriceId" placeholder=" " required>
                    <label for="productPriceId">Prix du produit</label>
                </div>
                <div class="body__main__createProductAndMenu__createProduct__form__productImage">
                    <input type="file" class="filepond" name="productImage" multiple data-allow-reorder="true" data-max-file-size="3MB" data-max-files="5">
                </div>
                <input type="submit" value="Créer le produit" class="body__main__createProductAndMenu__createProduct__form__submit">
            </form>
        </section>

        <section class="body__main__createProductAndMenu__createMenu">
            <h2 class="body__main__createProductAndMenu__createMenu__h2">Créer un menu</h2>
            <form action="/createProduct" class="body__main__createProductAndMenu__createMenu__form">
                <div class="body__main__createProductAndMenu__createMenu__form__menuName autoInputText">
                    <input type="text" name="menuName" id="menuNameId" placeholder=" " required>
                    <label for="menuNameId">Nom du menu</label>
                </div>
                <div class="body__main__createProductAndMenu__createMenu__form__menuDescription autoInputTextarea">
                <textarea name="menuDescription" id="menuDescriptionId" cols="30" rows="10" placeholder=" " required></textarea>
                    <label for="menuDescriptionId">Description du menu</label>
                </div>
                <div class="body__main__createProductAndMenu__createMenu__form__menuPrice autoInputText">
                    <input type="number" name="menuPrice" id="menuPriceId" placeholder=" " required>
                    <label for="menuPriceId">Prix du menu</label>
                </div>
                <div class="body__main__createProductAndMenu__createMenu__form__menuImage">
                    <input type="file" class="filepond1" name="productImage" multiple data-allow-reorder="true" data-max-file-size="3MB" data-max-files="5">
                </div>
                <input type="submit" value="Créer le menu" class="body__main__createProductAndMenu__createMenu__form__submit">
            </form>
        </section>
        <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>
        <script src="js/function/filepond.js"></script>
        <script>
            FilePond.create(
                document.querySelector('.filepond'), {
                    acceptedFileTypes: ['image/jpeg', 'image/png', 'image/jpg']
                })
            FilePond.create(
                document.querySelector('.filepond1'), {
                    acceptedFileTypes: ['image/jpeg', 'image/png', 'image/jpg']
                })
        </script>
    </section>
</main>

<!-- surveillance des commandes -- recherche des commandes -->

<form action="/searchCommand" method="post">
    <div>
        <label for="orderSearch"></label>
        <input type="text" name="orderSearch" id="orderSearch" placeholder="Rechercher une commande">
    </div>

    <input type="submit" value="Rechercher">
</form>


<!-- surveillance des clients -- recherche de clients -->

<form action="/searchClient" method="post">
    <div>
        <label for="clientSearch"></label>
        <input type="text" name="clientSearch" id="clientSearch" placeholder="Rechercher un client">
    </div>

    <input type="submit" value="Rechercher">
</form>




<!-- pannel cuisine -- redirect to the kitchen's panel -->
<a href="/kitchen">Pannel cuisine</a>



<?php require VIEWS . "base/footer.php"; ?>