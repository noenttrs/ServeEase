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
            <form action="/createProduct" class="body__main__createProductAndMenu__createProduct__form" enctype="multipart/form-data" method="post">
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
                    <i class="fa-solid fa-euro-sign"></i>
                    <label for="productPriceId">Prix du produit</label>
                </div>
                <select name="producttype" id="">
                    <option value="" hidden selected disabled>Catégorie du produit</option>
                    <option value="1">Burger</option>
                    <option value="2">Accompagnement</option>
                    <option value="3">Boisson</option>
                    <option value="4">Dessert</option>
                </select>
                <div class="body__main__createProductAndMenu__createProduct__form__productImage">
                    <input type="file" class="filepond" name="productImage" multiple data-allow-reorder="true" data-max-file-size="3MB" data-max-files="5">
                </div>
                <input type="submit" value="Créer le produit" class="body__main__createProductAndMenu__createProduct__form__submit">
            </form>
        </section>

        <section class="body__main__createProductAndMenu__createMenu">
            <h2 class="body__main__createProductAndMenu__createMenu__h2">Créer un menu</h2>
            <form action="/createMenu" class="body__main__createProductAndMenu__createMenu__form" enctype="multipart/form-data" method="post">
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
                    <i class="fa-solid fa-euro-sign"></i>
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
                    acceptedFileTypes: ['image/*']
                })
            FilePond.create(
                document.querySelector('.filepond1'), {
                    acceptedFileTypes: ['image/*']
                })
        </script>
    </section>
    <section class="body__main__findOrderAndClient">
        <section class="body__main__findOrderAndClient__order">
            <h2 class="body__main__findOrderAndClient__order__h2">Recherche d'une commande</h2>
            <form action="/searchCommand" method="post" class="body__main__findOrderAndClient__order__form">
                <div class="body__main__findOrderAndClient__order__form__orderSearch autoInputText">
                    <input type="text" name="orderSearch" id="orderSearchId" placeholder=" ">
                    <button type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    <label for="orderSearchId">Rechercher une commande</label>
                </div>
            </form>
        </section>
        <section class="body__main__findOrderAndClient__client">
            <h2 class="body__main__findOrderAndClient__client__h2">Recherche d'un client</h2>
            <form action="/searchClient" method="post" class="body__main__findOrderAndClient__client__form">
                <div class="body__main__findOrderAndClient__client__form__orderSearch autoInputText">
                    <input type="text" name="clientSearch" id="orderSearchId" placeholder=" " required>
                    <button type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    <label for="orderSearchId">Rechercher un client par email</label>
                </div>
                <small class="error"><?php if(isset($error)) echo $error ?></small>
            </form>
        </section>
    </section>


    <a href="/kitchen" class="body__main__redirectToKitchen">Cliquez ici pour accédez au pannel de cuisine</a>
</main>



<?php require VIEWS . "base/footer.php"; ?>