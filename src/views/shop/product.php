<?php
$pathCss = "css/shop/product.css";
require_once VIEWS . "base/Header.php";
if(!isset($product)){
    header("Location: /404");
    return;
}
?>

<main>
    <section class="body__main__presentation">
        <section class="body__main__presentation__image">
            <div class="swiper ImageSwipper">
                <div class="swiper-wrapper">
                    <img class="swiper-slide" src="/img/<?php echo $product->getProductImage() ?>" alt="">
                </div>
            </div>
        </section>
        <section class="body__main__presentation__content">
            <h1 class="body__main__presentation__content__name"><?php echo $product->getProductName()?></h1>
            <p class="body__main__presentation__content__price">€<?php echo $product->getProductPrice()?> EUR</p>
            <section class="body__main__presentation__content__select">
                <section class="body__main__presentation__content__select__description">
                    <section class="body__main__presentation__content__select__description__placeholder">
                        <div class="body__main__presentation__content__select__description__placeholder__left">
                            <i class="fa-solid fa-align-left"></i>
                            <p>Description du produit</p>
                        </div>
                        <div class="body__main__presentation__content__select__description__placeholder__rigth">
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </section>
                    <section class="body__main__presentation__content__select__description__content">
                        <p>
                            <?php echo $product->getProductDescription()?>
                        </p>
                    </section>
                </section>
                <section class="body__main__presentation__content__select__description">
                    <section class="body__main__presentation__content__select__description__placeholder">
                        <div class="body__main__presentation__content__select__description__placeholder__left">
                            <i class="fa-solid fa-list"></i>
                            <p>Caractéristique du produit</p>
                        </div>
                        <div class="body__main__presentation__content__select__description__placeholder__rigth">
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </section>
                    <section class="body__main__presentation__content__select__description__content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Atque, molestias? Dolores ratione assumenda architecto nam quod atque officia recusandae harum enim, labore maxime magnam dolore in ex totam delectus pariatur.
                            Odit corrupti, nemo explicabo nesciunt dolore tempora optio molestias similique! Atque velit mollitia illum a cumque totam libero error vel, adipisci ad voluptates perspiciatis!
                            Quae numquam nam officiis quas assumenda dicta, ipsum enim aut facilis eos, cupiditate quibusdam cum provident blanditiis, distinctio fuga incidunt necessitatibus veniam illum dolor.
                            Eos excepturi, dignissimos culpa hic sequi quaerat, a delectus illum qui error placeat voluptates consequuntur molestias at eum quas. Esse, hic at.
                        </p>
                    </section>
                </section>
                <section class="body__main__presentation__content__select__description">
                    <section class="body__main__presentation__content__select__description__placeholder">
                        <div class="body__main__presentation__content__select__description__placeholder__left">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            <p>Histoire du produit</p>
                        </div>
                        <div class="body__main__presentation__content__select__description__placeholder__rigth">
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </section>
                    <section class="body__main__presentation__content__select__description__content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Atque, molestias? Dolores ratione assumenda architecto nam quod atque officia recusandae harum enim, labore maxime magnam dolore in ex totam delectus pariatur.
                            Odit corrupti, nemo explicabo nesciunt dolore tempora optio molestias similique! Atque velit mollitia illum a cumque totam libero error vel, adipisci ad voluptates perspiciatis!
                            Quae numquam nam officiis quas assumenda dicta, ipsum enim aut facilis eos, cupiditate quibusdam cum provident blanditiis, distinctio fuga incidunt necessitatibus veniam illum dolor.
                            Eos excepturi, dignissimos culpa hic sequi quaerat, a delectus illum qui error placeat voluptates consequuntur molestias at eum quas. Esse, hic at.
                        </p>
                    </section>
                </section>
            </section>
            <form action="/product" class="body__main__presentation__content__addPanerForm" method="post">
                <div class="body__main__presentation__content__addPanerForm__inputQuantity">
                    <i class="fa-solid fa-minus body__main__presentation__content__addPanerForm__inputQuantity__minus"></i>
                    <span class="body__main__presentation__content__addPanerForm__inputQuantity__placeholder">1</span>
                    <input type="hidden" value="1" name="productQuantity" class="body__main__presentation__content__addPanerForm__inputQuantity__productQuantity">
                    <input type="hidden" value="<?php echo $product -> getProductId() ?>" name="productId" class="body__main__presentation__content__addPanerForm__inputQuantity__productId">
                    <i class="fa-solid fa-plus body__main__presentation__content__addPanerForm__inputQuantity__plus"></i>
                </div>
                <input type="submit" value="Ajouter au panier" class="body__main__presentation__content__addPanerForm__inputSubmit">
            </form>
        </section>
    </section>
    <script src="/js/shop/productSelect.js"></script>
    <script src="/js/shop/productQuantity.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".ImageSwipper", {
            slidesPerView: 1,
            keyboard: {
                enabled: true,
            },
        });
    </script>
</main>

<?php require_once VIEWS . "base/Footer.php" ?>