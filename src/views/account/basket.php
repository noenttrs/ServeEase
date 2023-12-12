<?php
$pathCss = "css/account/basket.css";
require_once VIEWS . "base/Header.php"; ?>
<?php if (!isset($_SESSION["client"])) {
    header("Location: /");
}
?>

<main>
    <h1 class="body__main__h1">Mon panier</h1>
    <p class="body__main__p">
        Gérez votre panier en ajustant les quantités ou en supprimant les articles que vous ne souhaitez plus conserver.
        Une fois ces modifications effectuées, il vous suffit de cliquer sur "Procéder au paiement" pour procéder au règlement.
    </p>
    <section class="body__main__basket">
        <table class="body__main__table">
            <tr class="body__main__table__titleOfProduct">
                <td class="body__main__table__titleOfProduct__imageOfProductTitle">
                    Image du produit
                </td>
                <td class="body__main__table__titleOfProduct__nameOfProductTitle">
                    Nom du produit
                </td>
                <td class="body__main__table__titleOfProduct__quantityOfProductTitle">
                    <p>Quantité</p>
                </td>
                <td class="body__main__table__titleOfProduct__priceOfProductTitle">
                    Prix
                </td>
                <td></td>
            </tr>
            <tr class="body__main__product__table__descriptionOfProduct">
                <td class="body__main__product__table__descriptionOfProduct__imageOfProduct">
                    <div class="body__main__product__table__descriptionOfProduct__imageOfProduct__container">
                        <img src="img/BO_MCFIRST.webp" alt="">
                    </div>
                </td>
                <td class="body__main__product__table__descriptionOfProduct__nameOfProduct">
                    test
                </td>
                <td class="body__main__product__table__descriptionOfProduct__quantityOfProduct">
                    <div class="body__main__product__table__descriptionOfProduct__quantityOfProduct__container">
                        <i class="fa-solid fa-minus body__main__product__table__descriptionOfProduct__quantityOfProduct__container__minus"></i>
                        <span>1</span>
                        <input type="hidden" value="">
                        <i class="fa-solid fa-plus body__main__product__table__descriptionOfProduct__quantityOfProduct__container__plus"></i>
                    </div>
                </td>
                <td class="body__main__product__table__descriptionOfProduct__priceOfProduct">
                    €120 EUR
                </td>
                <td class="body__main__product__table__descriptionOfProduct__deleteProduct">
                    <a href="/basket?delete=" class="">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </td>
            </tr>
        </table>
    </section>
    <section class="body__main__checkout">
        
    </section>
</main>











<?php require_once VIEWS . "base/Footer.php"; ?>