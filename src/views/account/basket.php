<?php
$pathCss = "/css/account/basket.css";
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

    <?php 
    foreach($basket as $product) { 
 
         ?>
        <table class="body__main__table">
            <tr class="body__main__table__titleOfProduct">
                <td class="body__main__table__titleOfProduct__imageOfProductTitle">
                    <?php echo $product->getProductImage()?>
                </td>
                <td class="body__main__table__titleOfProduct__nameOfProductTitle">
                    <?php echo $product->getProductName()?>
                </td>
                <td class="body__main__table__titleOfProduct__quantityOfProductTitle">
                    <p>Quantité</p>
                </td>
                <td class="body__main__table__titleOfProduct__priceOfProductTitle">
                    €<?php echo $product->getProductPrice()?> EUR
                </td>
                <td></td>
            </tr>
            <tr class="body__main__product__table__descriptionOfProduct">
                <td class="body__main__product__table__descriptionOfProduct__imageOfProduct">
                    <div class="body__main__product__table__descriptionOfProduct__imageOfProduct__container">
                        <img src="/img/BO_MCFIRST.webp" alt="">
                    </div>
                </td>
                <td class="body__main__product__table__descriptionOfProduct__nameOfProduct">
                    <?php echo $product->getProductDescription()?>
                </td>
                <td class="body__main__product__table__descriptionOfProduct__quantityOfProduct">
                    <div class="body__main__product__table__descriptionOfProduct__quantityOfProduct__container">
                        <i class="fa-solid fa-minus body__main__product__table__descriptionOfProduct__quantityOfProduct__container__minus"></i>
                        <span><?php echo $product->getProductQuantity()?></span>
                        <input type="hidden" value="">
                        <a href="/basket/<?php echo $product->getProductId()?>/addOne"><i class="fa-solid fa-plus body__main__product__table__descriptionOfProduct__quantityOfProduct__container__plus"></i></a>
                    </div>
                </td>
                <td class="body__main__product__table__descriptionOfProduct__priceOfProduct">
                    €<?php echo $product->getProductPrice()?> EUR
                </td>
                <td class="body__main__product__table__descriptionOfProduct__deleteProduct">
                    <a href="/basket?delete=" class="">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </td>
            </tr>
        </table>
    <?php } ?>
    </section>
    <section class="body__main__checkout">
        <div class="body__main__checkout__backToShop">
            <i class="fa-solid fa-arrow-left"></i>
            <a href="">Poursuivre mes achats</a>
        </div>
        <div class="body__main__checkout__stripe">
            <p>Total:<br>€120 EUR</p>
            <form action="" class="body__main__checkout__stripe__form">
                <input type="submit" value="Procéder au paiement">
            </form>
        </div>
    </section>
</main>











<?php require_once VIEWS . "base/Footer.php"; ?>